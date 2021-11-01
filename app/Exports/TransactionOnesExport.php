<?php

namespace App\Exports;

use App\Models\Admin\TransactionCustomers\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionOnesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
        return $this;
    }

    public function collection()
    {
        return Transaction::where('from_id', $this->id)->orwhere('to_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'From Account',
            'To Account',
            'Transaction Amounts',
            'Fee',
            'Account Balance',
            'Content',
            'Code',
            "Created",
        ];
    }

    public function map($transaction): array
    {
        if ($transaction->from_id == $this->id) {
            $account_balance =  $transaction->amounts_of_from;
            $amounts = '- ' . $transaction->transaction_amount;
            $fee = '- ' . $transaction->transaction_fee;
            $account_from = 'Owner';
        } else {
            $account_from = $transaction->fromAccount ?  $transaction->fromAccount->code : '';
        }

        if ($transaction->to_id == $this->id) {
            $account_balance =  $transaction->amounts_of_to;
            $amounts = '+ ' . $transaction->transaction_amount;
            $fee = '';
            $account_to =  'Owner';
        } else {
            $account_to =  $transaction->toAccount ?  $transaction->toAccount->code : '';
        }


        return  [
            $transaction->id,
            $account_from,
            $account_to,
            $amounts,
            $fee,

            $account_balance,

            $transaction->content,
            $transaction->code,
            $transaction->created_at->format('H:i  d/m/Y')
        ];
    }
}
