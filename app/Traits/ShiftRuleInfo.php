<?php

namespace App\Traits;

use App\Model\ShiftRule;
use Illuminate\Support\Facades\Auth;

trait ShiftRuleInfo
{
    public function storeShiftRuleAns($data)
    {
        $userid = Auth::user()->id;
        $shiftRule = [];
        $shiftRule = [
            'rulename'      => $data['rulename'],
            'shiftplan'     => $data['shiftplan'],
            'roster_days'   => $data['roster_days'],
            'roster_seq'    => $data['roster_seq'],
        ];

        foreach($shiftRule as $id=>$shifts){
            foreach($shifts as $k=>$v){
                $shift[$k][$id] = $v;
            }
        }

        foreach($shift as $key=>$values){
            ShiftRule::create([
                'com_id'        => $data->comp_id,
                'rule_name'     => $values['rulename'],
                'shift_name'    => $values['shiftplan'],
                'change_after'  => $values['roster_days'],
                'change_seq'    => $values['roster_seq'],
                'added_by'      => $userid,
                'updated_by'    => null
                ]);
        }

    }
}
