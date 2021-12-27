<?php

namespace App\Traits;

use App\Model\SalaryDeductionRule as ModelSalaryDeductionRule;
use Illuminate\Support\Facades\Auth;

trait SalaryDeductionRule
{
    public function storeSalaryDeductionRuleAns($data)
    {
        // return $data;
        $userid = Auth::user()->id;
        $SalaryRule = [];
        $SalaryRule = [
            'rule_name'         => $data['deduction_rule'],
            'condition'         => $data['deduct_con'],
            'calculation'       => $data['deduct_cal'],
            'is_fixed'          => $data['sal_ded_fix'],
            'remarks'           => $data['salde_remarks']
        ];

        foreach ($SalaryRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(isset($values['rule_name'])){
                ModelSalaryDeductionRule::create([
                    'com_id'        => $data->comp_id,
                    'rule_name'     => $values['rule_name'],
                    'condition'     => $values['condition'],
                    'calculation'   => $values['calculation'],
                    'is_fixed'      => $values['is_fixed'],
                    'remarks'       => $values['remarks'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }
        }
    }
}
