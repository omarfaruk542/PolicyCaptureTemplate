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
use App\Traits\ShiftInformation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class QuestionnaireController extends Controller
{
    use DeviceIntegration,PersonalInformation,ShiftInformation;

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

        $validated  = $request->validate([
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
        ],
        [
            'pims_upload.required' => 'Questions-01: Answer is required',
            'device_log.required' => 'Questions-02: Answer is required',
            'shiftname.*.required' =>'Questions-03: Shift name field is required',
            'intime.*.required' =>'Questions-03: In time field is required',
            'outtime.*.required' =>'Questions-03: Out time field is required',
            'whour.*.required' =>'Questions-03: Working hour field is required',
            'lgrace.*.required' =>'Questions-03: Late grace time field is required',
            'eograce.*.required' =>'Questions-03: Early out grace time field is required',
            'lout.*.required' =>'Questions-03: Lunch out time field is required',
            'lin.*.required' =>'Questions-03: Lunch in time field is required',
            'not.*.required' =>'Questions-03: Normal OT field is required',
            'eot.*.required' =>'Questions-03: Extra OT field is required',
        ]);

        $fileName=null;
        $filePath = 'storage/app/public/'.Str::slug($request->companyName);
        $comid = $request->comp_id;
        $this->storePIMSAns($request);
        $this->storeDeviceAns($request);
        $this->storeShiftPlanAns($request);

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
