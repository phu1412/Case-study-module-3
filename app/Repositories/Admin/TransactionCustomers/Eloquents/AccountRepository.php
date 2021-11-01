<?php

namespace App\Repositories\Admin\TransactionCustomers\Eloquents;

use App\Models\Admin\TransactionCustomers\Account;
use App\Repositories\Admin\TransactionCustomers\Interfaces\AccountInterface;


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
        $item->customer_id = $request->input('customer_id');
        $item->card_id = $request->input('card_id');
        $item->code = $request->input('code');
        $item->type_of_account = $request->input('type_of_account');
        $item->brand_account = $request->input('brand_account');
        $item->amounts = $request->input('amounts');
        $item->place_of_creation = $request->input('place_of_creation');
        $item->save();
        return $item;
    }
    public function update($request, $id)
    {
        $item = Account::find($id);
        $item->customer_id = $request->input('customer_id');
        $item->card_id = $request->input('card_id');
        $item->code = $request->input('code');
        $item->type_of_account = $request->input('type_of_account');
        $item->brand_account = $request->input('brand_account');
        $item->amounts = $request->input('amounts');
        $item->place_of_creation = $request->input('place_of_creation');
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
            return redirect()->route('admin.transaction-customers.accounts.list');
        }
        $items = Account::where('code', 'LIKE', '%' . $keyword . '%')->orwhere('created_at', 'LIKE', '%' . $keyword . '%')->get();
        return $items;
    }

    public function searchCode($request)
    {
        $items = Account::where('code', 'LIKE', '%' . $request . '%')->first();
        return $items;
    }
}
