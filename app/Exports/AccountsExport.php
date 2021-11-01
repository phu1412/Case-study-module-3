<?php

namespace App\Exports;

use App\Models\Admin\TransactionCustomers\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AccountsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Account::leftJoin('customers', 'accounts.customer_id', '=', 'customers.id')
            ->leftJoin('cards', 'accounts.card_id', '=', 'cards.id')
            ->select([
                'accounts.id',
                'customers.customer_name',
                'cards.code as card_code',
                'accounts.code',
                'accounts.amounts',
                'accounts.created_at',
                'accounts.updated_at'
            ])
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Customer Name',
            'Card Code',
            'Account Number',
            'Amounts',
            "Created",
            "Updated"
        ];
    }

    public function map($account): array
    {
        return [
            $account->id,
            $account->customer_name,
            $account->card_code,
            $account->code,
            $account->amounts,
            $account->created_at->format('H:i  d/m/Y'),
            $account->updated_at->format('H:i  d/m/Y'),
        ];
    }
}
