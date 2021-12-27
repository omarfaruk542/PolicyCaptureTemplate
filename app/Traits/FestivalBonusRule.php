<?php

namespace App\Traits;

use App\Model\FestivalBonusRule as ModelFestivalBonusRule;
use Illuminate\Support\Facades\Auth;

trait FestivalBonusRule
{
    public function storeFestivalBonusRuleAns($data)
    {
        // return $data;
        $userid = Auth::user()->id;
        $SalaryRule = [];
        $SalaryRule = [
            'rule_name'         => $data['bonus_rule'],
            'calculation'       => $data['bonus_cal'],
            'amount'            => $data['bonus_amout'],
            'is_fixed'          => $data['bonus_fixed'],
            'remarks'           => $data['bonus_remarks']
        ];

        foreach ($SalaryRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(isset($values['rule_name'])){
                ModelFestivalBonusRule::create([
                    'com_id'        => $data->comp_id,
                    'rule_name'     => $values['rule_name'],
                    'condition'     => $values['calculation'],
                    'amount'        => $values['amount'],
                    'is_fixed'      => $values['is_fixed'],
                    'remarks'       => $values['remarks'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }
        }
    }
}
