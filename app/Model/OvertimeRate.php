<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OvertimeRate extends Model
{
    protected $table = 'over_time_rates';
    protected $fillable = ['has_policy','com_id','rule_name','formula','remarks','added_by','updated_by'];
}
