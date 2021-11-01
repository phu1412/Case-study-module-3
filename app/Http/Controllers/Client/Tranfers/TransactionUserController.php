<?php

namespace App\Http\Controllers\Client\Tranfers;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\TransactionCustomers\Eloquents\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionUserController extends Controller
{
    private $transactionRepository;
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        $accounts = Auth::user()->customer->account;
        $param = [
            'accounts' => $accounts
        ];
        return view('client.tranfers.transaction-user.list', $param);
    }

    public function show($id)
    {
        $transactions = $this->transactionRepository->searchTransactions($id);

        $items = [];
        foreach ($transactions as $key => $transaction) {
            $item = [];
            if ($transaction->from_id == $id) {
                $item['from_account'] = '<span class = "text-warning">Your Account</span>';
            } else {
                $item['from_account'] =  ($transaction->fromAccount) ? $transaction->fromAccount->code : '';
            }

            if ($transaction->to_id == $id) {
                $item['to_account'] = '<span class = "text-warning">Your Account</span>';
            } else {
                $item['to_account'] =   ($transaction->toAccount) ? $transaction->toAccount->code : '';
            }

            $item['transaction_amount'] =  number_format($transaction->transaction_amount) . ' VND';
            $item['transaction_fee'] =   number_format($transaction->transaction_fee) . ' VND';
            if ($transaction->from_id == $id) {
                $item['amount_balance'] =  number_format($transaction->amounts_of_from) . ' VND';
            } else if ($transaction->to_id == $id) {
                $item['amount_balance'] =   number_format($transaction->amounts_of_to) . ' VND';
            }
            $item['code'] =   $transaction->code;
            $item['content'] =   $transaction->content;
            $item['created_at'] =   $transaction->created_at->format('H:i  d-m-Y');

            $items[$key] = $item;
        }

        return response()->json(['success' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
