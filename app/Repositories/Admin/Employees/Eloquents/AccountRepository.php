<?php

namespace App\Repositories\Admin\Employees\Eloquents;

use App\Models\Admin\Employees\Account;
use App\Repositories\Admin\Employees\Interfaces\AccountInterface;
use Illuminate\Support\Facades\Hash;

class AccountRepository implements AccountInterface
{
    public function all()
    {
        $items = Account::all();
        return $items;
    }
    public function find($id)
    {
        $item = Account::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new Account();
        $item->name = $request->input('name');
        $item->email = $request->input('email');
        $item->role = $request->input('role');
        $item->password = Hash::make($request->input('password'));

        $file = $request->image;
        if (!$request->hasFile('image')) {
            $item->image = $file;
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() + 2;
            $newFileName = "$fileName.$fileExtension";
            $request->file('image')->move(public_path('images'), $newFileName);
            $item->image = $newFileName;
        }

        $item->save();
        return $item;
    }
    public function update($request, $id)
    {
        $item = Account::find($id);
        $item->name = $request->input('name');
        $item->email = $request->input('email');
        $item->role = $request->input('role');
        if ($item->password) {
            $item->password = Hash::make($request->input('password'));
        }

        $file = $request->image;
        if (!$request->hasFile('image')) {
            $item->image = $file;
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() + 2;
            $newFileName = "$fileName.$fileExtension";
            $request->file('image')->move(public_path('images'), $newFileName);
            $item->image = $newFileName;
        }

        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Account::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.employees.accounts.list');
        }
        $items = Account::where('email', 'LIKE', '%' . $keyword . '%')->orwhere('name', 'LIKE', '%' . $keyword . '%')->get();
        return $items;
    }
}
