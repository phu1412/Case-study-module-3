<?php

namespace App\Repositories\Admin\Employees\Eloquents;

use App\Models\Admin\Employees\EmployeesInfo;
use App\Repositories\Admin\Employees\Interfaces\EmployeesInfoInterface;
use Illuminate\Support\Facades\Hash;

class EmployeesInfoRepository implements EmployeesInfoInterface
{
    public function all()
    {
        $items = EmployeesInfo::all();
        return $items;
    }
    public function find($id)
    {
        $item = EmployeesInfo::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new EmployeesInfo();
        $item->name = $request->input('name');
        $item->personal_email = $request->input('personal_email');
        $item->phone = $request->input('phone');
        $item->birthday = $request->input('birthday');
        $item->address = $request->input('address');
        $item->citizen_identification = $request->input('citizen_identification');
        $item->gender = $request->input('gender');
        $item->join_company_date = $request->input('join_company_date');
        $item->position_id = $request->input('position_id');

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
        $item = EmployeesInfo::find($id);
        $item->name = $request->input('name');
        $item->personal_email = $request->input('personal_email');
        $item->phone = $request->input('phone');
        $item->birthday = $request->input('birthday');
        $item->address = $request->input('address');
        $item->citizen_identification = $request->input('citizen_identification');
        $item->gender = $request->input('gender');
        $item->join_company_date = $request->input('join_company_date');
        $item->position_id = $request->input('position_id');

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
        $item = EmployeesInfo::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.employees.employees_info.list');
        }
        $items = EmployeesInfo::where('personnal_email', 'LIKE', '%' . $keyword . '%')
            ->orwhere('name', 'LIKE', '%' . $keyword . '%')
            ->orwhere('phone', 'LIKE', '%' . $keyword . '%')
            ->get();
        return $items;
    }
}
