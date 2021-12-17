<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OverTimeRounding extends Model
{
    protected $fillable = ['com_id','rounding_type','rule_name','min_minutes','max_minutes','ot_minutes','added_by','updated_by'];
}
