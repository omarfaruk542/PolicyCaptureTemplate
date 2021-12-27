<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttendancePaymentRule extends Model
{
    protected $fillable = [
        'com_id',
        'rule_name',
        'policy',
        'amount',
        'is_fixed',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
