<?php
namespace App\Traits;

use App\Model\SalaryProcessPeriod as ModelSalaryProcessPeriod;
use Illuminate\Support\Facades\Auth;

trait SalaryProcessPeriod {


    public function storeSPPeriodAns($data){

        $userid = Auth::user()->id;
        ModelSalaryProcessPeriod::create([
            'com_id'        => $data->comp_id,
            'process_type'  => $data->process_period,
            'from_date'     => $data->salary_from_date,
            'to_date'       => $data->salary_to_date,
            'added_by'      => $userid,
            'updated_by'    => null
        ]);

    }

}
