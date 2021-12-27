<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FestivalBonusRule extends Model
{
    protected $fillable = [
        'com_id',
        'rule_name',
        'condition',
        'amount',
        'is_fixed',
        'remarks',
        'added_by',
        'updated_by'
    ];
}
