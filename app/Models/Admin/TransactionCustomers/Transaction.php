<?php

namespace App\Models\Admin\TransactionCustomers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory;
    use Notifiable,
    SoftDeletes;
    
    protected $table = 'transactions';

    public function fromAccount()
    {
        return $this->belongsTo(Account::class, 'from_id', 'id');
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'to_id', 'id');
    }
}
