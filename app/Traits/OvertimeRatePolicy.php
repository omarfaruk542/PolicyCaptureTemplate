<?php

namespace App\Traits;

use App\Model\OvertimeRate;
use Illuminate\Support\Facades\Auth;

trait OvertimeRatePolicy
{
    public function storeOTRateAns($data)
    {
        $userid = Auth::user()->id;
        $otRate = $data['ot_rate'] ? ($data['ot_rate'] == 'yes' ? 1 : 0) : null;
        $OTRateRule = [];
        $OTRateRule = [
            'rule_name'     => $data['ot_rule'],
            'formula'       => $data['ot_formula'],
            'remarks'       => $data['ot_remarks']
        ];

        foreach ($OTRateRule as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            if(!is_null($values['rule_name']) && !is_null($values['formula'])){
                OvertimeRate::create([
                    'com_id'        => $data->comp_id,
                    'has_policy'    => $otRate,
                    'rule_name'     => $values['rule_name'],
                    'formula'       => $values['formula'],
                    'remarks'       => $values['remarks'],
                    'added_by'      => $userid,
                    'updated_by'    => null
                ]);
            }

        }
    }
}
