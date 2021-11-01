<?php

namespace App\Repositories\Admin\TransactionCustomers\Eloquents;

use App\Models\Admin\TransactionCustomers\User;
use App\Repositories\Admin\TransactionCustomers\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
    public function all()
    {
        $items = User::all();
        return $items;
    }
    public function find($id)
    {
        $item = User::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new User();
        $item->user_name = $request->input('user_name');
        $item->email = $request->input('email');
        $item->password = Hash::make($request->input('password'));

        $item->save();
        return $item;
    }
    public function update($request, $id)
    {
        $item = User::find($id);
        $item->user_name = $request->input('user_name');
        $item->email = $request->input('email');
        $item->password = Hash::make($request->input('password'));

        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.transaction-customers.users.list');
        }
        $items = User::where('user_name', 'LIKE', '%' . $keyword . '%')->orwhere('email', 'LIKE', '%' . $keyword . '%')->orwhere('created_at', 'LIKE', '%' . $keyword . '%')->get();
        return $items;
    }
}
