<?php

namespace App\Exports;

use App\Models\Admin\TransactionCustomers\Card;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CardsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Card::join('accounts', 'accounts.card_id', '=', 'cards.id')
            ->select('cards.*', 'accounts.code as account_number')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Account Number',
            'Code',
            'PIN',
            'Period',
            "Created",
            "Updated"
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->account_number,
            $user->code,
            $user->PIN,
            $user->period,
            $user->created_at->format('H:i  d/m/Y'),
            $user->updated_at->format('H:i  d/m/Y'),
        ];
    }
}
