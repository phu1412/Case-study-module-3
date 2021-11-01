<?php

namespace App\Models\Admin\Employees;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Employees\Position;

class EmployeesInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees_info';

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
