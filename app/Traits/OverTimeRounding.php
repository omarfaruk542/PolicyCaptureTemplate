<?php

namespace App\Traits;

use App\Model\OverTimeRounding as ModelOverTimeRounding;
use Illuminate\Support\Facades\Auth;

trait OverTimeRounding
{
    public function storeOTRoundingAns($data)
    {
        $userid = Auth::user()->id;
        $rounding_type = $data['ot_round'];
        $OTRoundingRule = [];
        $OTRoundingRule = [
            'rule_name'     => $data['roundingtype'],
            'min_minutes'   => $data['min'],
            'max_minutes'   => $data['max'],
            'ot_minutes'    => $data['otmin'],
        ];

        foreach($OTRoundingRule as $id=>$rules){
            foreach($rules as $k=>$v){
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach($roundingPolicy as $key=>$values){
            ModelOverTimeRounding::create([
                'com_id'        => $data->comp_id,
                'rounding_type' => $rounding_type,
                'rule_name'     => $values['rule_name'],
                'min_minutes'   => $values['min_minutes'],
                'max_minutes'   => $values['max_minutes'],
                'ot_minutes'    => $values['ot_minutes'],
                'added_by'      => $userid,
                'updated_by'    => null
                ]);
        }

    }
}
