<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OtherSalaryRule extends Model
{
    protected $fillable = [
        'com_id',
        'has_policy',
        'rule_name',
        'condition',
        'day_status',
        'amount',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
