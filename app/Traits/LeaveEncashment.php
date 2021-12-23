<?php

namespace App\Traits;

use App\Model\LeaveEncashment as ModelLeaveEncashment;
use Illuminate\Support\Facades\Auth;

trait LeaveEncashment
{
    public function storeLVEncashmentAns($data)
    {

        $userid = Auth::user()->id;
        $has_policy = $data->lv_encash = "yes" ? 1 : 0;
        $EncashPolicy = [];
        $EncashPolicy = [
            'lv_name'       => $data['encash_lv_name'],
            'encash_day'    => $data['encash_days'],
            'criteria'      => $data['en_criteria'],
            'calculation'   => $data['encash_formula'],
            'disburse_date' => $data['pdd'],
            'remarks'       => $data['encash_remarks']
        ];

        foreach ($EncashPolicy as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }

        foreach ($roundingPolicy as $key => $values) {
            ModelLeaveEncashment::create([
                'com_id'        => $data->comp_id,
                'has_policy'    => $has_policy,
                'lv_name'       => $values['lv_name'],
                'encash_days'   => $values['encash_day'],
                'criteria'      => $values['criteria'],
                'calculation'   => $values['calculation'],
                'disburse_date' => $values['disburse_date'],
                'remarks'       => $values['remarks'],
                'added_by'      => $userid,
                'updated_by'    => null
            ]);
        }
    }
}
