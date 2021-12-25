<?php

namespace App\Traits;

use App\Model\SalaryHead as ModelSalaryHead;
use Illuminate\Support\Facades\Auth;

trait SalaryHead
{
    public function storeSalaryHeadAns($data)
    {
        // return $data;
        $userid = Auth::user()->id;
        $e_head = [];
        $d_head = [];
        $SalaryHead = [];
        foreach($data['e_head'] as $earninghead){
            $e_head[] = 'E';
        }
        foreach($data['d_head'] as $deducthead){
            $d_head[] = 'D';
        }
        $SalaryHead = [
            'head_name'         => array_merge($data['e_head'],$data['d_head']),
            'head_type'         => array_merge($e_head,$d_head)
        ];
        foreach ($SalaryHead as $id => $rules) {
            foreach ($rules as $k => $v) {
                $roundingPolicy[$k][$id] = $v;
            }
        }
        foreach ($roundingPolicy as $key => $values) {
            ModelSalaryHead::create([
                'com_id'        => $data->comp_id,
                'salary_head'   => $values['head_name'],
                'head_type'     => $values['head_type'],
                'remarks'       => $data->head_remarks,
                'added_by'      => $userid,
                'updated_by'    => null
            ]);
        }
    }
}
