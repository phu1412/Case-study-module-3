<?php

namespace App\Repositories\Admin\TransactionCustomers\Eloquents;


use App\Models\Admin\TransactionCustomers\Customer;
use App\Repositories\Admin\TransactionCustomers\Interfaces\CustomerInterface;


class CustomerRepository implements CustomerInterface
{
    public function all()
    {
        $items = Customer::all();
        return $items;
    }
    public function find($id)
    {
        $item = Customer::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new Customer();
        $item->customer_name = $request->input('customer_name');
        $item->user_id = $request->input('user_id');
        $item->email = $request->input('email');
        $item->phone = $request->input('phone');
        $item->birthday = $request->input('birthday');
        $item->address = $request->input('address');
        $item->gender = $request->input('gender');
        $item->job = $request->input('job');
        $item->citizen_identification = $request->input('citizen_identification');

        $file_BCI = $request->images_BCI;
        if (!$request->hasFile('images_BCI')) {
            $item->image = $file_BCI;
        } else {
            $fileExtension = $file_BCI->getClientOriginalExtension();
            $fileName_BCI = time() + 1;
            $newFileName_BCI = "$fileName_BCI.$fileExtension";
            $request->file('images_BCI')->move(public_path('images'), $newFileName_BCI);
            $item->images_BCI = $newFileName_BCI;
        }

        $file_ACI = $request->images_ACI;
        if (!$request->hasFile('images_ACI')) {
            $item->image = $file_ACI;
        } else {
            $fileExtension = $file_ACI->getClientOriginalExtension();
            $fileName_ACI = time() + 2;
            $newFileName_ACI = "$fileName_ACI.$fileExtension";
            $request->file('images_ACI')->move(public_path('images'), $newFileName_ACI);
            $item->images_ACI = $newFileName_ACI;
        }

        $item->save();
        return $item;
    }
    public function update($request, $id)
    {
        $item = Customer::find($id);
        $item->customer_name = $request->input('customer_name');
        $item->user_id = $request->input('user_id');
        $item->email = $request->input('email');
        $item->phone = $request->input('phone');
        $item->birthday = $request->input('birthday');
        $item->address = $request->input('address');
        $item->gender = $request->input('gender');
        $item->job = $request->input('job');
        $item->citizen_identification = $request->input('citizen_identification');

        $file_BCI = $request->images_BCI;
        if (!$request->hasFile('images_BCI')) {
            $item->image = $file_BCI;
        } else {
            $fileExtension = $file_BCI->getClientOriginalExtension();
            $fileName_BCI = time() + 1;
            $newFileName_BCI = "$fileName_BCI.$fileExtension";
            $request->file('images_BCI')->move(public_path('images'), $newFileName_BCI);
            $item->images_BCI = $newFileName_BCI;
        }

        $file_ACI = $request->images_ACI;
        if (!$request->hasFile('images_ACI')) {
            $item->image = $file_ACI;
        } else {
            $fileExtension = $file_ACI->getClientOriginalExtension();
            $fileName_ACI = time() + 2;
            $newFileName_ACI = "$fileName_ACI.$fileExtension";
            $request->file('images_ACI')->move(public_path('images'), $newFileName_ACI);
            $item->images_ACI = $newFileName_ACI;
        }
        
        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Customer::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.transaction-customers.customers.list');
        }
        $items = Customer::where('customer_name', 'LIKE', '%' . $keyword . '%')->orwhere('email', 'LIKE', '%' . $keyword . '%')->orwhere('phone', 'LIKE', '%' . $keyword . '%')->orwhere('created_at', 'LIKE', '%' . $keyword . '%')->get();
        return $items;
    }
}
