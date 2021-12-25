<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalaryProcessPeriod extends Model
{
    protected $fillable = [
        'com_id',
        'process_type',
        'from_date',
        'to_date',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
