<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'com_id',
        'added_by',
        'updated_by'
    ];
    public function company(){
        return $this->hasOne(CompanyInfo::class,'id','com_id');
    }
    public function pims(){
        return $this->hasMany(PersonalInfo::class,'com_id','com_id');
    }
    public function device(){
        return $this->hasMany(DeviceIntegration::class,'com_id','com_id');
    }
    public function shiftplan(){
        return $this->hasMany(ShiftPlan::class,'com_id','com_id');
    }
    public function shiftrule(){
        return $this->hasMany(ShiftRule::class,'com_id','com_id');
    }
    public function otround(){
        return $this->hasMany(OverTimeRounding::class,'com_id','com_id');
    }
    public function otrate(){
        return $this->hasMany(OvertimeRate::class,'com_id','com_id');
    }
    public function lvcalendar(){
        return $this->hasMany(LeaveCalender::class,'com_id','com_id');
    }
    public function lvpolicy(){
        return $this->hasMany(LeavePolicy::class,'com_id','com_id');
    }
    public function lvencash(){
        return $this->hasMany(LeaveEncashment::class,'com_id','com_id');
    }
    public function mlvpolicy(){
        return $this->hasMany(MaternityLeavePolicy::class,'com_id','com_id');
    }
    public function salaryperiod(){
        return $this->hasMany(SalaryProcessPeriod::class,'com_id','com_id');
    }
    public function salaryrule(){
        return $this->hasMany(SalaryRule::class,'com_id','com_id');
    }
    public function salaryhead(){
        return $this->hasMany(SalaryHead::class,'com_id','com_id');
    }
    public function attenpayment(){
        return $this->hasMany(AttendancePaymentRule::class,'com_id','com_id');
    }
    public function othersalary(){
        return $this->hasMany(OtherSalaryRule::class,'com_id','com_id');
    }
    public function salarydeduction(){
        return $this->hasMany(SalaryDeductionRule::class,'com_id','com_id');
    }
    public function bonus(){
        return $this->hasMany(FestivalBonusRule::class,'com_id','com_id');
    }
}
