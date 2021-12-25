<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalaryRule extends Model
{
    protected $fillable = [
        'com_id',
        'rule_name',
        'salary_head',
        'formula',
        'is_fixed',
        'rounding',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
