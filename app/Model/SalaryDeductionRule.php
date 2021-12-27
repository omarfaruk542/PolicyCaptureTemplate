<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalaryDeductionRule extends Model
{
    protected $fillable = [
        'com_id',
        'rule_name',
        'condition',
        'calculation',
        'is_fixed',
        'remarks',
        'added_by',
        'updated_by'

    ];
}
