<?php

namespace App\Repositories\Admin\TransactionCustomers\Eloquents;

use App\Models\Admin\TransactionCustomers\Account;
use App\Models\Admin\TransactionCustomers\Transaction;
use App\Repositories\Admin\TransactionCustomers\Interfaces\TransactionInterface;

class TransactionRepository implements TransactionInterface
{
    public function all()
    {
        $items = Transaction::with('fromAccount', 'toAccount')->get();
        return $items;
    }
    public function find($id)
    {
        $item = Transaction::find($id);
        return $item;
    }
    public function store($request)
    {
        $item = new Transaction();
        $item->from_id = $request->input('from_id');
        $item->to_id = $request->input('to_id');
        $item->transaction_amount = $request->input('transaction_amount');
        $item->transaction_fee = $request->input('transaction_fee');
        $item->content = $request->input('content');
        $item->code = $this->generateUUID(10);

        //trừ tk chuyển tiền 
        if (isset($item->from_id)) {
            $fromAccount = Account::find($item->from_id);
            $fromAccount->amounts = $fromAccount->amounts - $item->transaction_amount - $item->transaction_fee;
            $fromAccount->save();
            $item->amounts_of_from = $fromAccount->amounts;
        }

        //Cộng tk nhận tiền
        if (isset($item->to_id)) {
            $toAccount = Account::find($item->to_id);
            $toAccount->amounts = $toAccount->amounts + $item->transaction_amount;
            $toAccount->save();
            $item->amounts_of_to = $toAccount->amounts;
        }

        $item->save();

        return $item;
    }
    public function update($request, $id)
    {
        $item = Transaction::find($id);

        $old_transaction_amount = $item->transaction_amount;
        $old_transaction_fee = $item->transaction_fee;

        $item->from_id = $request->input('from_id');
        $item->to_id = $request->input('to_id');
        $item->transaction_amount = $request->input('transaction_amount');
        $item->transaction_fee = $request->input('transaction_fee');
        $item->content = $request->input('content');

        if (isset($item->from_id)) {
            $fromAccount = Account::find($item->from_id);
            $fromAccount->amounts = $fromAccount->amounts + $old_transaction_amount + $old_transaction_fee - $item->transaction_amount - $item->transaction_fee;
            $fromAccount->save();
            $item->amounts_of_from = $fromAccount->amounts;
        }

        if (isset($item->to_id)) {
            $toAccount = Account::find($item->to_id);
            $toAccount->amounts = $toAccount->amounts - $old_transaction_amount + $item->transaction_amount ;
            $toAccount->save();
            $item->amounts_of_to = $toAccount->amounts;
        }


        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Transaction::find($id);
        $item->delete();
        return $item;
    }
    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.transaction-customers.transactions.list');
        }
        $items = Transaction::join('accounts', function ($join) {
            $join->on('accounts.id', '=', 'transactions.from_id')
                ->orOn('accounts.id', '=', 'transactions.to_id');
        })
            ->where('accounts.code', 'LIKE', '%' . $keyword . '%')
            ->orwhere('transactions.code', 'LIKE', '%' . $keyword . '%')
            ->orwhere('accounts.created_at', 'LIKE', '%' . $keyword . '%')
            ->get();
        return $items;
    }

    public function generateUUID($length)
    {
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        return $random;
    }

    public function searchTransactions($id)
    {
        $items = Transaction::where('from_id', $id)->orWhere('to_id', $id)
            ->orderby('created_at', 'DESC')
            ->get();
        return $items;
    }
}
