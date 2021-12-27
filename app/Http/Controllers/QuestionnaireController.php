<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Model\Questionnaire;
use Illuminate\Http\Request;
use App\Model\QDeviceLogUpload;
use Illuminate\Validation\Rule;
use App\Traits\DeviceIntegration;
use App\Traits\PersonalInformation;
use App\Http\Controllers\Controller;
use App\Traits\AttendancePaymentRule;
use App\Traits\FestivalBonusRule;
use App\Traits\LeaveCalendar;
use App\Traits\LeaveEncashment;
use App\Traits\LeavePolicy;
use App\Traits\MaternityLeavePolicy;
use App\Traits\OtherSalaryRule;
use App\Traits\OvertimeRatePolicy;
use App\Traits\OverTimeRounding;
use App\Traits\SalaryDeductionRule;
use App\Traits\SalaryHead;
use App\Traits\SalaryProcessPeriod;
use App\Traits\SalaryRule;
use App\Traits\ShiftInformation;
use App\Traits\ShiftRuleInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class QuestionnaireController extends Controller
{
    use DeviceIntegration,
        PersonalInformation,
        ShiftInformation,
        ShiftRuleInfo,
        OverTimeRounding,
        OvertimeRatePolicy,
        LeaveCalendar,
        LeavePolicy,
        LeaveEncashment,
        MaternityLeavePolicy,
        SalaryProcessPeriod,
        SalaryRule,
        SalaryHead,
        AttendancePaymentRule,
        OtherSalaryRule,
        SalaryDeductionRule,
        FestivalBonusRule;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('questionnaire.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // return $this->storeAttenPaymentRuleAns($request);

        $validated  = $request->validate(
            [
                'pims_upload'   => 'required',
                'device_log'    => 'required',
                'shiftname.*'   => 'required',
                'intime.*'      => 'required',
                'outtime.*'     => 'required',
                'whour.*'       => 'required',
                'lgrace.*'      => 'required',
                'eograce.*'     => 'required',
                'lout.*'        => 'required',
                'lin.*'         => 'required',
                'not.*'         => 'required',
                'eot.*'         => 'required',
                'shift_roster'  => 'required',
                'ot_round'      => 'required',
                'ot_rate'       => 'required',
                'lv_cal_rule.*' => 'required',
                'lv_from.*'     => 'required',
                'lv_to.*'       => 'required',
                'lv_allocation' => 'required',
                'lv_encash'     => 'required',
                'mlv'           => 'required',
                'process_period' => 'required',
                'salary_rule.*' => 'required',
                'salary_head.*' => 'required',
                'salary_calc.*' => 'required',
                'is_fixed.*'    => 'required',
                'rounding.*'    => 'required',
                'e_head'        => 'required',
                'd_head'        => 'required',
                'atten_rule.*'  => 'required',
                'atten_cal.*'   => 'required',
                'atten_amnt.*'  => 'required',
                'other_salary'  => 'required',
                'deduction_rule.*' => 'required',
                'deduct_con.*'  => 'required',
                'deduct_cal.*'  => 'required',
                'bonus_rule.*'  => 'required',
                'bonus_cal.*'   => 'required',
                'bonus_amout.*' => 'required'

            ],
            [
                'pims_upload.required'          => 'Questions-01: Answer is required',
                'device_log.required'           => 'Questions-02: Answer is required',
                'shiftname.*.required'          => 'Questions-03: Shift name field is required',
                'intime.*.required'             => 'Questions-03: In time field is required',
                'outtime.*.required'            => 'Questions-03: Out time field is required',
                'whour.*.required'              => 'Questions-03: Working hour field is required',
                'lgrace.*.required'             => 'Questions-03: Late grace time field is required',
                'eograce.*.required'            => 'Questions-03: Early out grace time field is required',
                'lout.*.required'               => 'Questions-03: Lunch out time field is required',
                'lin.*.required'                => 'Questions-03: Lunch in time field is required',
                'not.*.required'                => 'Questions-03: Normal OT field is required',
                'eot.*.required'                => 'Questions-03: Extra OT field is required',
                'shift_roster.required'         => 'Questions-04: Answer is required',
                'ot_round.required'             => 'Questions-05: Answer is required',
                'ot_rate.required'              => 'Questions-06: Answer is required',
                'lv_cal_rule.*.required'        => 'Questions-07: Leave calendar rule is required',
                'lv_from.*.required'            => 'Questions-07: From date is required',
                'lv_to.*.required'              => 'Questions-07: Todate is required',
                'lv_allocation.required'        => 'Questions-08: Answer is required',
                'lv_encash.required'            => 'Questions-09: Answer is required',
                'mlv.required'                  => 'Questions-10: Answer is required',
                'process_period.required'       => 'Questions-11: Answer is required',
                'salary_rule.*.required'        => 'Questions-12: Salary rule name field is required',
                'salary_head.*.required'        => 'Questions-12: Salary head field is required',
                'salary_calc.*.required'        => 'Questions-12: Salary formula field is required',
                'is_fixed.*.required'           => 'Questions-12: Salary head fixed field is required',
                'rounding.*.required'           => 'Questions-12: Salary rounding field is required',
                'e_head.required'               => 'Questions-13: Earnings head field is required',
                'd_head.required'               => 'Questions-13: Deduction head field is required',
                'atten_rule.*.required'         => 'Questions-14: Rule name field is required',
                'atten_cal.*.required'          => 'Questions-14: Condition field is required',
                'atten_amnt.*.required'         => 'Questions-14: Amount field is required',
                'other_salary.required'         => 'Questions-15: Answer is required',
                'deduction_rule.*.required'     => 'Questions-16: Deduction Rule name field is required',
                'deduct_con.*.required'         => 'Questions-16: Deduction condition field is required',
                'deduct_cal.*.required'         => 'Questions-16: Deduction calculation field is required',
                'bonus_rule.*.required'         => 'Questions-18: Bonus rule field is required',
                'bonus_cal.*.required'          => 'Questions-18: Bonus calculation field is required',
                'bonus_amout.*.required'        => 'Questions-18: Bonus amount field is required',
            ]
        );

        $fileName       = null;
        $filePath       = 'storage/app/public/' . Str::slug($request->companyName);
        $comid          = $request->comp_id;
        $pims           = $this->storePIMSAns($request); // 1
        $device         = $this->storeDeviceAns($request); // 2
        $shift          = $this->storeShiftPlanAns($request); // 3
        $shiftRule      = $this->storeShiftRuleAns($request); // 4
        $OTRonding      = $this->storeOTRoundingAns($request); // 5
        $OTRate         = $this->storeOTRateAns($request); // 6
        $LVCal          = $this->storeLVCalendarAns($request); // 7
        $LVPolicy       = $this->storeLVPolicyAns($request); // 8
        $LVEncash       = $this->storeLVEncashmentAns($request); // 9
        $MLV            = $this->storeMLVPolicyAns($request); // 10
        $SalaryPP       = $this->storeSPPeriodAns($request); // 11
        $SalaryRule     = $this->storeSalaryRuleAns($request); // 12
        $SalaryHead     = $this->storeSalaryHeadAns($request); // 13
        $AttenPay       = $this->storeAttenPaymentRuleAns($request); // 14
        $OtherRule      = $this->storeOtherSalaryRuleAns($request); // 15
        $SalaryDeduct   = $this->storeSalaryDeductionRuleAns($request); // 16
        $FestivaBonus   = $this->storeFestivalBonusRuleAns($request); // 18

        // if ($pims && $device && $shift && $shiftRule && $OTRonding && $OTRate && $LVCal && $LVPolicy && $LVEncash && $MLV && $SalaryPP && $SalaryRule && $SalaryHead && $AttenPay && $OtherRule && $SalaryDeduct && $FestivaBonus) {
            Questionnaire::create([
                'com_id'    =>  $comid,
                'added_by'  => Auth::user()->id
            ]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
