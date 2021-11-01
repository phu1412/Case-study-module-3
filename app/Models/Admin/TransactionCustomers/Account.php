<?php

namespace App\Models\Admin\TransactionCustomers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Account extends Model
{
    use HasFactory;
    
    use Notifiable,
        SoftDeletes;

    protected $table = 'accounts';

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transactionFrom()
    {
        return $this->hasMany(Transaction::class, 'from_id', 'id');
    }

    public function transactionTo()
    {
        return $this->hasMany(Transaction::class, 'to_id', 'id');
    }
}
