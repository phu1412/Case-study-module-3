<?php

namespace App\Exports;

use App\Models\Admin\TransactionCustomers\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Admin\TransactionCustomers\Account;

class CustomersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Customer::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone',
            'Birthday',
            'Address',
            'Citizen Identification',
            'Gender',
            'Job',
            "Created",
            "Updated"
        ];
    }

    public function map($customers): array
    {
        return [
            $customers->id,
            $customers->customer_name,
            $customers->email,
            $customers->phone,
            $customers->birthday,
            $customers->address,
            $customers->citizen_identification,
            $customers->gender,
            $customers->job,
            $customers->created_at->format('H:i  d/m/Y'),
            $customers->updated_at->format('H:i  d/m/Y'),
        ];
    }

    
}
