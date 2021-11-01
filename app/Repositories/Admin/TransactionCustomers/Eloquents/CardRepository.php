<?php

namespace App\Repositories\Admin\TransactionCustomers\Eloquents;

use App\Models\Admin\TransactionCustomers\Card;
use App\Repositories\Admin\TransactionCustomers\Interfaces\CardInterface;


class CardRepository implements CardInterface
{
    public function all()
    {
        $items = Card::all();
        return $items;
    }
    public function find($id)
    {
        $item = Card::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new Card();
        $item->code = $request->input('code');
        $item->PIN = $request->input('PIN');
        $item->period = $request->input('period');

        $item->save();
        return $item;
    }
    public function update($request, $id)
    {
        $item = Card::find($id);
        $item->code = $request->input('code');
        $item->PIN = $request->input('PIN');
        $item->period = $request->input('period');

        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Card::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.transaction-customers.cards.list');
        }
        $items = Card::where('code', 'LIKE', '%' . $keyword . '%')->orwhere('created_at', 'LIKE', '%' . $keyword . '%')->get();
        return $items;
    }
}
