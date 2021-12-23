<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaternityLeavePolicy extends Model
{
    protected $fillable = [
        'com_id',
        'has_policy',
        'rule_name',
        'alloc_days',
        'before_edd',
        'after_edd',
        'depends_on',
        'alloc_after',
        'cal_type',
        'first_pay',
        'last_pay',
        'benefits_no',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
