<?php

namespace App\Exports;

use App\Models\Admin\TransactionCustomers\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaction::with('fromAccount', 'toAccount')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'From Account',
            'To Account',
            'Transaction Amounts',
            'Fee',
            'Content',
            'Code',
            "Created",
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->fromAccount != null ? $transaction->fromAccount->code : '',
            $transaction->toAccount != null ? $transaction->toAccount->code : '',
            $transaction->transaction_amount,
            $transaction->transaction_fee,
            $transaction->content,
            $transaction->code,
            $transaction->created_at->format('H:i  d/m/Y'),
        ];
    }

    
}
