<?php

namespace App\Http\Controllers;

use App\Model\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyInfoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectList = CompanyInfo::orderBy('id','DESC')->get();
        $totalProjects = count($projectList);
        if ($request->ajax()) {
            return response()->json($projectList);
        } else {
            return view('adminpanel.company_list',compact('projectList','totalProjects'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectList = CompanyInfo::all();
        $totalProjects = count($projectList);
        return view('adminpanel.create_company',compact('totalProjects'));
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
        $validatedData = $request->validate([
            'project_name'      => 'required|unique:company_infos,name',
            'project_address'   => 'required',
            'po_date'           => 'required|date'
        ],
        [
            'project_name.required'     => 'The project name field is required',
            'project_name.unique'       => 'The project name already exists',
            'project_address.required'  => 'The project address field is required',
            'po_date.required'          => 'Work order date field is required'
        ]);


        $companyInfo            = new CompanyInfo;
        $companyInfo->name      = $request->project_name;
        $companyInfo->address   = $request->project_address;
        $companyInfo->po_date   = $request->po_date;
        $companyInfo->is_active = isset($request->is_active) ? 1 : 0;

        if($companyInfo->save()){
           Session::flash('status','Record Saved Successfully');
        } else {
            Session::flash('error', $validatedData);
        }
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyInfo $companyInfo)
    {
        //
    }
}
