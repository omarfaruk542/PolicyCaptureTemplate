<?php

namespace App\Traits;

use App\Model\MaternityLeavePolicy as ModelMaternityLeavePolicy;
use Illuminate\Support\Facades\Auth;

trait MaternityLeavePolicy
{
    public function storeMLVPolicyAns($data)
    {
        $userid = Auth::user()->id;
        $has_policy = $data->mlv = 'yes' ? 1 : 0;
        $MLVRule = [];
        $MLVRule = [
            'rule_name'         => $data['mlv_rule'],
            'mlv_days'          => $data['mlv_days'],
            'b_edd'             => $data['bedd'],
            'a_edd'             => $data['aedd'],
            'depends_on'        => $data['dependson'],
            'alloc_days_after'  => $data['mlvdaysafter'],
            'cal_type'          => $data['mlvcaltype'],
            'first_pay'         => $data['fpay'],
            'last_pay'          => $data['lpay'],
            'benefits_no'       => $data['benefits_no']
        ];

        foreach ($MLVRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(isset($values['rule_name'])){
                ModelMaternityLeavePolicy::create([
                    'com_id'        => $data->comp_id,
                    'has_policy'    => $has_policy,
                    'rule_name'     => $values['rule_name'],
                    'alloc_days'    => $values['mlv_days'],
                    'before_edd'    => $values['b_edd'],
                    'after_edd'     => $values['a_edd'],
                    'depends_on'    => $values['depends_on'],
                    'alloc_after'   => $values['alloc_days_after'],
                    'cal_type'      => $values['cal_type'],
                    'first_pay'     => $values['first_pay'],
                    'last_pay'      => $values['last_pay'],
                    'benefits_no'   => $values['benefits_no'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }
        }
    }
}
