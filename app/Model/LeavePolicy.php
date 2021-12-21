<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeavePolicy extends Model
{
    protected $fillable = [
        'com_id',
        'has_policy',
        'name',
        'short_name',
        'alloc_days',
        'days_after',
        'credit_type',
        'calc_basis',
        'calc_type',
        'is_prorate',
        'conse_limit',
        'carry_forward',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
