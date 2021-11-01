<?php

namespace App\Exports;

use App\Models\Admin\TransactionCustomers\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            "Created",
            "Updated"
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->user_name,
            $user->email,
            $user->created_at->format('H:i  d/m/Y'),
            $user->updated_at->format('H:i  d/m/Y'),
        ];
    }
}
