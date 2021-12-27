<?php

namespace App\Traits;

use App\Model\AttendancePaymentRule as ModeAttendancePaymentRule;
use Illuminate\Support\Facades\Auth;

trait AttendancePaymentRule
{
    public function storeAttenPaymentRuleAns($data)
    {
        $userid = Auth::user()->id;
        $SalaryRule = [];
        $SalaryRule = [
            'rule_name'         => $data['atten_rule'],
            'policy'            => $data['atten_cal'],
            'amount'            => $data['atten_amnt'],
            'is_fixed'          => $data['atten_fixed'],
        ];

        foreach ($SalaryRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(isset($values['rule_name'])){
                ModeAttendancePaymentRule::create([
                    'com_id'        => $data->comp_id,
                    'rule_name'     => $values['rule_name'],
                    'policy'        => $values['policy'],
                    'amount'        => $values['amount'],
                    'is_fixed'      => $values['is_fixed'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }

        }
    }
}
