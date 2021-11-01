<?php

namespace App\Repositories\Admin\Employees\Eloquents;

use App\Models\Admin\Employees\Position;
use App\Repositories\Admin\Employees\Interfaces\PositionInterface;
use Illuminate\Support\Facades\Hash;

class PositionRepository implements PositionInterface
{
    public function all()
    {
        $items = Position::all();
        return $items;
    }
    public function find($id)
    {
        $item = Position::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new Position();
        $item->position = $request->input('position');
        $item->branch = $request->input('branch');
        $item->basic_salary = $request->input('basic_salary');

        $item->save();
        return $item;
    }
    public function update($request, $id)
    {
        $item = Position::find($id);
        $item->position = $request->input('position');
        $item->branch = $request->input('branch');
        $item->basic_salary = $request->input('basic_salary');

        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Position::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.employees.positions.list');
        }
        $items = Position::where('position', 'LIKE', '%' . $keyword . '%')
            ->orwhere('branch', 'LIKE', '%' . $keyword . '%')
            ->get();
        return $items;
    }
}
