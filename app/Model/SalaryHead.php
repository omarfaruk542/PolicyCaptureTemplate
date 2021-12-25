<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalaryHead extends Model
{
    protected $fillable = [
        'com_id',
        'salary_head',
        'head_type',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
