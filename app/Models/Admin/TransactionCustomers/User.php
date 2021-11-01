<?php

namespace App\Models\Admin\TransactionCustomers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;

    protected $table = 'users';

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
