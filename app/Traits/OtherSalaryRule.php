<?php

namespace App\Traits;

use App\Model\OtherSalaryRule as ModelOtherSalaryRule;
use Illuminate\Support\Facades\Auth;

trait OtherSalaryRule
{
    public function storeOtherSalaryRuleAns($data)
    {
        // return $data;
        $userid = Auth::user()->id;
        $SalaryRule = [];
        $SalaryRule = [
            'rule_name'         => $data['other_rule'],
            'formula'           => $data['other_condition'],
            'day_status'        => $data['day_status'],
            'amount'            => $data['other_rule_amnt'],
            'remarks'           => $data['other_rule_remarks']
        ];

        foreach ($SalaryRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(isset($values['rule_name'])){
                ModelOtherSalaryRule::create([
                    'com_id'        => $data->comp_id,
                    'has_policy'    => $data->other_salary = 'yes' ? 1 : 0,
                    'rule_name'     => $values['rule_name'],
                    'condition'     => $values['formula'],
                    'day_status'    => $values['day_status'],
                    'amount'        => $values['amount'],
                    'remarks'       => $values['remarks'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }
        }
    }
}
