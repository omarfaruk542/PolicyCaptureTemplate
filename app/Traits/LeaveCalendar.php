<?php

namespace App\Traits;

use App\Model\LeaveCalender;
use Illuminate\Support\Facades\Auth;

trait LeaveCalendar
{
    public function storeLVCalendarAns($data)
    {
        $userid = Auth::user()->id;
        $OTRateRule = [];
        $OTRateRule = [
            'rule_name'     => $data['lv_cal_rule'],
            'from_date'     => $data['lv_from'],
            'to_date'       => $data['lv_to'],
            'remarks'       => $data['lv_remarks']
        ];

        foreach ($OTRateRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            LeaveCalender::create([
                'com_id'        => $data->comp_id,
                'rule_name'     => $values['rule_name'],
                'from_date'     => $values['from_date'],
                'to_date'       => $values['to_date'],
                'remarks'       => $values['remarks'],
                'added_by'      => $userid,
                'updated_by'    => null
            ]);
        }
    }
}
