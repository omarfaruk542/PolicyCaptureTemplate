<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveCalender extends Model
{
    protected $fillable = ['com_id','rule_name','from_date','to_date','remarks','added_by','updated_by'];
}
