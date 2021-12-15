<?php

namespace App\Traits;

use App\Model\ShiftPlan;
use Illuminate\Support\Facades\Auth;

trait ShiftInformation
{
    public function storeShiftPlanAns($data)
    {
        $shiftPlans = [];
        $shiftPlans = [
            'shiftname'  => $data['shiftname'],
            'intime'     => $data['intime'],
            'outtime'    => $data['outtime'],
            'whour'      => $data['whour'],
            'lgrace'     => $data['lgrace'],
            'eograce'    => $data['eograce'],
            'lout'       => $data['lout'],
            'lin'        => $data['lin'],
            'not'        => $data['not'],
            'eot'        => $data['eot'],
        ];

        foreach($shiftPlans as $id=>$shifts){
            foreach($shifts as $k=>$v){
                $shift[$k][$id] = $v;
            }
        }

        foreach($shift as $key=>$values){
            ShiftPlan::create([
                'com_id'     => $data->comp_id,
                'shiftname'  => $values['shiftname'],
                'intime'     => $values['intime'],
                'outtime'    => $values['outtime'],
                'whour'      => $values['whour'],
                'lgrace'     => $values['lgrace'],
                'eograce'    => $values['eograce'],
                'lout'       => $values['lout'],
                'lin'        => $values['lin'],
                'not'        => $values['not'],
                'eot'        => $values['eot'],
                'added_by'   => Auth::user()->id,
                'updated_by' => null
                ]);
        }

    }
}
