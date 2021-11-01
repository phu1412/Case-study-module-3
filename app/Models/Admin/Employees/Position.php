<?php

namespace App\Models\Admin\Employees;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Employees\EmployeesInfo;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'position';

    public function employeesInfo()
    {
        return $this->hasOne(EmployeesInfo::class);
    }
}
