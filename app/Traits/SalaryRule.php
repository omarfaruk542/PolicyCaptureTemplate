<?php

namespace App\Traits;

use App\Model\SalaryRule as ModelSalaryRule;
use Illuminate\Support\Facades\Auth;

trait SalaryRule
{
    public function storeSalaryRuleAns($data)
    {
        // return $data;
        $userid = Auth::user()->id;
        $SalaryRule = [];
        $SalaryRule = [
            'rule_name'         => $data['salary_rule'],
            'salary_head'       => $data['salary_head'],
            'formula'           => $data['salary_calc'],
            'is_fixed'          => $data['is_fixed'],
            'rounding'          => $data['rounding']
        ];

        foreach ($SalaryRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(isset($values['rule_name'])){
                ModelSalaryRule::create([
                    'com_id'        => $data->comp_id,
                    'rule_name'     => $values['rule_name'],
                    'salary_head'   => $values['salary_head'],
                    'formula'       => $values['formula'],
                    'is_fixed'      => $values['is_fixed'],
                    'rounding'      => $values['rounding'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }
        }
    }
}
