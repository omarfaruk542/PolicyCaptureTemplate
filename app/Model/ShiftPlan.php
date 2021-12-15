<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShiftPlan extends Model
{
    protected $fillable = [
        'com_id','shiftname', 'intime', 'outtime','whour','lgrace','eograce','lout','lin','not','eot'
    ];
}
