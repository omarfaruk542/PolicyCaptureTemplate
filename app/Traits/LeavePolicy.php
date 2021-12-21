<?php

namespace App\Traits;

use App\Model\LeavePolicy as ModelLeavePolicy;
use Illuminate\Support\Facades\Auth;

trait LeavePolicy
{
    public function storeLVPolicyAns($data)
    {
        // return $data;

        $userid                  = Auth::user()->id;
        $lv_allocation           = $data->lv_allocation ? ($data->lv_allocation == 'yes' ? 1 : 0) : null;
        $lv_name                 = $data->lv_name;
        $allleave                = $data->lv_short_name;
        $lv_days                 = $data->lv_days;
        $daysafter               = $data->daysafter;
        $lv_limit                = $data->lv_limit;
        $lv_cfw                  = $data->lv_cfw;


        $lv_credit      = [];
        $lv_cal_basis   = [];
        $lv_cal_type    = [];
        $lv_prorate_cal = [];
        foreach($allleave as $leave){
            $lv_credit[]        = $data['lv_credit_'.$leave];
            $lv_cal_basis[]     = $data['calbasis_'.$leave];
            $lv_cal_type[]      = $data['caltype_'.$leave];
            $lv_prorate_cal[]   = $data['prodata_'.$leave] ? 1 : 0;
        }

        $leavepolicy = [
            // 'lv_alloc'          => $lv_allocation,
            'lv_name'           => $lv_name,
            'lv_short_name'     => $allleave,
            'lv_days'           => $lv_days,
            'alloc_days_after'  => $daysafter,
            'lv_limit'          => $lv_limit,
            'lv_cfw'            => $lv_cfw,
            'lv_credit'         => $lv_credit,
            'cal_basic'         => $lv_cal_basis,
            'cal_type'          => $lv_cal_type,
            'prorate_cal'       => $lv_prorate_cal
        ];

        // return $leavepolicy;
        foreach ($leavepolicy as $id => $rules) {
            foreach ($rules as $k => $v) {
                $LeavePolicies[$k][$id] = $v;
            }
        }
        foreach ($LeavePolicies as $key => $values) {
            ModelLeavePolicy::create([
                'com_id'            => $data->comp_id,
                'has_policy'        => $lv_allocation,
                'name'              => $values['lv_name'],
                'short_name'        => $values['lv_short_name'],
                'alloc_days'        => $values['lv_days'],
                'days_after'        => $values['alloc_days_after'],
                'credit_type'       => $values['lv_credit'],
                'calc_basis'        => $values['cal_basic'],
                'calc_type'         => $values['cal_type'],
                'is_prorate'        => $values['prorate_cal'],
                'conse_limit'       => $values['lv_limit'],
                'carry_forward'     => $values['lv_cfw'],
                'remarks'           => null,
                'added_by'          => $userid,
                'updated_by'        => null
            ]);
        }
    }
}
