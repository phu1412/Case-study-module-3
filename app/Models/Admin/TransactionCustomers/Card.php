<?php

namespace App\Models\Admin\TransactionCustomers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Card extends Model
{
    use HasFactory;
    use Notifiable,
    SoftDeletes;

    protected $table = 'cards';

    public function account(){
        return $this->hasOne(Account::class);
    }
}
