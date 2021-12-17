<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShiftRule extends Model
{
    protected $fillable = [
        'com_id','rule_name', 'shift_name', 'change_after','change_seq','added_by','updated_by'
    ];
}
