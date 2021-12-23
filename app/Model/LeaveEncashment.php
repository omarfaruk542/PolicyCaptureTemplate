<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveEncashment extends Model
{
    protected $fillable = ['com_id','has_policy','lv_name','encash_days','criteria','calculation','disburse_date','remarks','added_by','updated_by'];
}
