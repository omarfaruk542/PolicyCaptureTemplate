<header id="header" class="sticky-top">
    <div class="nav-bar custom-nav-bar">
        <div class="d-flex justify-content-between nav-inner">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/KormeeLeft.gif') }}" alt="'Logo'" class="logo" />
                <img src="{{ asset('assets/img/KormeeTop.gif') }}" alt="'Logo'" class="logo" />
            </a>
            <div class="users mt-3 mr-2">
                <span class="text-white mr-2"> {{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="btn btn-sm btn-danger">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>
 <!-- Notification -->
 @if (session('status'))
 <div class="toast message" style="position: absolute; top: 60px; right: 0; z-index: 1070; width:300px;"
     data-delay="5000">
     <div class="toast-header bg-success">
         <strong class="mr-auto">Success</strong>
         <small>Just Now</small>
         <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="toast-body">
         <div>
             <i class="fas fa-check-square mr-2 text-success"></i>
             <span>{{ session('status') }}</span>
         </div>
     </div>
 </div>
@endif
<!-- Notification -->
<section id="content">
    <div class="container container-sm">
        <div class="row mt-4">
            <div class="col col-10 col-md-12 mx-auto">
                @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col col-10 col-md-12 mx-auto">
                <div class="card card-outline card-warning my-2">
                    <div class="card-header py-1">
                        <div class="card-title">
                            <h3 class="float-left">Questionnaire</h3>
                        </div>
                        <span class="float-right mr-3 display-5 date">Date : {{ date('m-d-Y') }}</span>
                    </div>
                    <form role="form" action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- Company Info --}}
                            <div class="form-group clearfix px-2">
                                <div class="row mb-2">
                                    <label for="inputCompany" class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" list="companyName" id="inputCompany"
                                            placeholder="Type Company Name" name="companyName" value=" {{ $users->projectInfo ? $users->projectInfo->name : null}}" readonly>
                                            <input type="hidden" name="comp_id" value="{{ $users->projectInfo ? $users->projectInfo->id : null }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="inputAddress" class="col-sm-2 col-form-label">Company
                                        Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAddress" rows="1" name="companyaddress"
                                            placeholder="Type Company Address" value=" {{ $users->projectInfo ? $users->projectInfo->address : null }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- Company Info End --}}
                            {{-- Question : 01 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('pims_upload') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Employee Master Data</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions01">01. Do you want to upload Employee Master Data from
                                            Excel
                                            template? </label>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn1 btn-yes" type="radio" id="radioPrimary1" name="pims_upload"
                                                value="yes">
                                            <label for="radioPrimary1">Yes, I want to upload</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn2 btn-no" type="radio" id="radioPrimary2" name="pims_upload"
                                                value="no">
                                            <label for="radioPrimary2">No, I will do manually</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <a href="https://drive.google.com/file/d/0BzFSMadq2ktcUG9SWDgzdWNWVjg/view?usp=sharing"
                                                target="_blank" id="downloadLink">
                                                Download Employee Master Data Upload Template
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 01 End --}}
                            {{-- Question : 02 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('device_log') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Attendance Log Data integration with KORMEE</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions02">02. Do you want to integrate the Attendance Log
                                            Data with
                                            KORMEE System?</label>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary3" name="device_log"
                                                value="yes">
                                            <label for="radioPrimary3">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary4" name="device_log"
                                                value="no">
                                            <label for="radioPrimary4">No</label>
                                        </div>
                                        <div class="custom-file mt-2 showDetails" style="display: none;">
                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        accept=".rar,.zip,.txt,.xls,.mdb,.dat" name="device_log_file" value="{{ old('device_log_file') }}">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="col col-md-6">
                                                    <div id="uploaderror" class="text-danger fade show d-none" role="alert">
                                                        <strong>Error!</strong> File too Big, please select a file less than 5MB.
                                                    </div>
                                                    <div id="uploadsuccss" class="text-success fade show d-none" role="alert"></div>
                                                </div>
                                            </div>
                                            <div class="text-info">Please upload Attendance Device output file
                                                format like
                                                SQL Database, text, mdb, dat, excel etc. (Max file size-5MB)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 02 End --}}
                            {{-- Question : 03 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('shiftname.*') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Shift Plan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions03">03. Please provide your Shift information</label>
                                        <a href="javascript:void(0)" class="cursor-pointer btn-modal float-right"
                                                data-toggle="modal" data-target="#shiftplanmodel">For example, Click here</a>

                                        <div class="showDetails">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center"
                                                    style="font-size: 14px;">
                                                    <thead>
                                                        <tr>
                                                            <th class="py-1">Shift Name</th>
                                                            <th class="py-1">In Time</th>
                                                            <th class="py-1">Out Time</th>
                                                            <th class="py-1">Working Hour</th>
                                                            <th class="py-1">Late Grace Time</th>
                                                            <th class="py-1">Early Out Margin</th>
                                                            <th class="py-1">Lunch Out</th>
                                                            <th class="py-1">Lunch In</th>
                                                            <th class="py-1">Nomal OT Hour</th>
                                                            <th class="py-1">EOT Hour</th>
                                                            <th class="py-1">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="shift-plan-body">
                                                        <tr>
                                                            <td class="py-0 px-0" style="width: 15%;">
                                                                <input type="text" class="w-100 border-0"
                                                                    name="shiftname[]" value="">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="time" class="w-100 border-0"
                                                                    name="intime[]" value="">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="time" class="w-100 border-0"
                                                                    name="outtime[]" value="">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 5%;">
                                                                <input type="number" class="w-100 border-0"
                                                                    name="whour[]" value="" step="any">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="time" class="w-100 border-0"
                                                                    name="lgrace[]" value="" >
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="time" class="w-100 border-0"
                                                                    name="eograce[]" value="">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="time" class="w-100 border-0"
                                                                    name="lout[]" value="">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="time" class="w-100 border-0"
                                                                    name="lin[]" value="">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="text" class="w-100 border-0"
                                                                    name="not[]" value="" step="any">
                                                            </td>
                                                            <td class="py-0 px-0" style="width: 10%;">
                                                                <input type="text" class="w-100 border-0"
                                                                    name="eot[]" value="" step="any">
                                                            </td>
                                                            <td class="py-0 px-0 w-auto">
                                                                <i class="far fa-trash-alt text-danger delete"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-shift">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 03 End --}}
                            {{-- Question : 04 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('shift_roster') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Shift Roster</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions04">04. Do you have shift rostering?</label>
                                        <a href="javascript:void(0)" class="cursor-pointer btn-modal float-right"
                                        data-toggle="modal" data-target="#shiftrostermodal">For example, Click here</a>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary7" name="shift_roster"
                                                value="yes">
                                            <label for="radioPrimary7">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary8" name="shift_roster"
                                                value="no">
                                            <label for="radioPrimary8">No</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Shift Rule Name</th>
                                                        <th class="py-1">Shift Plan</th>
                                                        <th class="py-1">Change after (Days)</th>
                                                        <th class="py-1">Sequence No</th>
                                                        <th class="py-1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="shift-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" style="width: 20%;">
                                                            <input type="text" class="w-100 border-0"
                                                                name="rulename[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-auto">
                                                            <input type="text" class="w-100 border-0"
                                                                name="shiftplan[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0" name="roster_days[]">
                                                        </td>
                                                        <td class="py-0 px-0" width="120px">
                                                            <input type="number" class="w-100 border-0 text-center" name="roster_seq[]">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 10%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 04 End --}}
                            {{-- Question : 05 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('ot_round') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Over Time Rounding</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions05">05. Any Over Time Rounding policy?</label>
                                        <a href="javascript:void(0)" class="cursor-pointer btn-modal float-right show-minutemodal"
                                        data-toggle="modal" data-target="#minuteOTRoundnmodel" style="display: none;">For example, Click here</a>
                                        <a href="javascript:void(0)" class="cursor-pointer btn-modal float-right show-categorymodal"
                                        data-toggle="modal" data-target="#categoryOTRoundnmodel" style="display: none;">For example, Click here</a>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary9" name="ot_round"
                                                value="minute_wise">
                                            <label for="radioPrimary9">Minute wise</label>
                                        </div>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary10" name="ot_round"
                                                value="category_wise">
                                            <label for="radioPrimary10">Category Wise</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary11" name="ot_round"
                                                value="no">
                                            <label for="radioPrimary11">N/A</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-ot-round">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 05 End --}}
                            {{-- Question : 06 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('ot_rate') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Over Time Rate</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions06">06. Do you have multiple overtime Rate policy?</label>
                                        <a href="javascript:void(0)" class="cursor-pointer btn-modal float-right show-minutemodal"
                                        data-toggle="modal" data-target="#overTimeRatenmodel">For example, Click here</a>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary12" name="ot_rate"
                                                value="yes">
                                            <label for="radioPrimary12">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary13" name="ot_rate"
                                                value="no">
                                            <label for="radioPrimary13">No</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Over Time Rule Name</th>
                                                        <th class="py-1">Formula</th>
                                                        <th class="py-1">Remarks</th>
                                                        <th class="py-1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ot-rate-body">
                                                    <tr>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="ot_rule[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="ot_formula[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="ot_remarks[]">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 10%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-ot-rate">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 06 End --}}

                            {{-- Question : 07 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('lv_cal_rule.*') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Leave Calendar</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions07">07. What type of Leave Calender do you use?</label>
                                        {{-- <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary13" name="r7"
                                                value="yes">
                                            <label for="radioPrimary13">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary14" name="r7"
                                                value="no">
                                            <label for="radioPrimary14">No</label>
                                        </div> --}}
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Calendar Type</th>
                                                        <th class="py-1">From Date</th>
                                                        <th class="py-1">To Date</th>
                                                        <th class="py-1">Remarks</th>
                                                        <th class="py-1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="lv-calender-body">
                                                    <tr>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="lv_cal_rule[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="date" class="w-100 border-0"
                                                                name="lv_from[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="date" class="w-100 border-0"
                                                                name="lv_to[]">
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="lv_remarks[]">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 10%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-lv-calender">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 07 End --}}

                            {{-- Question : 08 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1 @error('lv_allocation') text-white bg-danger @enderror" data-card-widget="collapse">
                                    <h3 class="card-title">Leave Type & Allocation</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions08">08. Do you maintain multiple Leave types &
                                            allocation?</label>
                                            <a href="javascript:void(0)" class="cursor-pointer btn-modal float-right show-minutemodal"
                                        data-toggle="modal" data-target="#leaveallocationmodel">For example, Click here</a>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary15" name="lv_allocation"
                                                value="yes">
                                            <label for="radioPrimary15">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary16" name="lv_allocation"
                                                value="no">
                                            <label for="radioPrimary16">No</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <div class="form-group row">
                                                <label for="lv_type" class="col-sm-2">Select Leave Type :</label>
                                                <select name="lv_type" id="lv_type" class="custom-select custom-select-sm col-sm-3 mr-4">
                                                    <option value="0" selected disabled>Select Leave Type</option>
                                                    <option value="cl">Casual Leave</option>
                                                    <option value="sl">Sick Leave</option>
                                                    <option value="el">Earn Leave</option>
                                                    <option value="lwp">Leave Without Pay</option>
                                                    <option value="spl">Special Leave</option>
                                                </select>
                                                <button class="btn btn-sm btn-info add-lv-policy col-sm-1">Add <i
                                                    class="fas fa-plus"></i></button>
                                            </div>
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Leave Type</th>
                                                        <th class="py-1">Allocation (Days)</th>
                                                        <th class="py-1">Credit/ Allocation</th>
                                                        <th class="py-1">Allocation From</th>
                                                        <th class="py-1">Calendar Type</th>
                                                        <th class="py-1">Proportionate Calculation</th>
                                                        <th class="py-1">Consecutive Limit (Days)</th>
                                                        <th class="py-1">Carry Forward</th>
                                                        <th class="py-1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="lv-policy-body"></tbody>
                                            </table>
                                            <span style="font-size: 9px;" class="bg-success p-1"><strong>Legend :</strong>
                                                BOY = Leave credit start from begin of the year,
                                                EOY = Leave credit start after end of the year,
                                                DOJ = Leave allocation start from date of joining,
                                                DOC = Leave allocation start from date of confirmation,
                                                CC  = Company Calendar (LV-LV-LV),
                                                EC  = Employee Calendar (LV-W-LV)
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 08 End --}}
                            {{-- Question : 09 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Leave Encashment</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions09">09. Do you have Leave Encashment policy?</label>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary17" name="lv_encash"
                                                value="yes">
                                            <label for="radioPrimary17">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary18" name="lv_encash"
                                                value="no">
                                            <label for="radioPrimary18">No</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Leave Type</th>
                                                        <th class="py-1">Allowable Encashment Days</th>
                                                        <th class="py-1">Formula</th>
                                                        <th class="py-1">Remarks</th>
                                                        <th class="py-1">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="encash-policy-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <select name="encash_rule[]" id="lv_type" class="custom-select custom-select-sm border-0"
                                                            style="height: 25px;">
                                                                <option value="0" selected disabled>Select Leave Type</option>
                                                                <option value="cl">Casual Leave</option>
                                                                <option value="sl">Sick Leave</option>
                                                                <option value="el">Earn Leave</option>
                                                                <option value="lwp">Leave Without Pay</option>
                                                                <option value="spl">Special Leave</option>
                                                            </select>
                                                            {{-- <input type="text" class="w-100 border-0"
                                                                name="encash_rule[]" style="height: 24px;"> --}}
                                                        </td>
                                                        <td class="py-0 px-0" width="20%">
                                                            <div class="d-flex">
                                                                <input type="number" class="w-100 border-0"
                                                                    name="encash_days[]" style="height: 24px; padding: 0 5px;" placeholder="Encash days">
                                                                <select class="custom-select custom-select-sm border-0" name="is_fixed[]"
                                                                    style="height: 25px; width: 100px;">
                                                                    <option selected disabled>select Item</option>
                                                                    <option value="fixed">Fixed</option>
                                                                    <option value="%">%</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="25%">
                                                            <input type="text" class="w-100 border-0" name="encash_formula[]"
                                                                style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="30%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="encash_remarks[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-en-policy">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 09 End --}}
                            {{-- Question : 10 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Maternity Leave</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions10">10. Do you have maternity leave policy?</label>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary19" name="r10"
                                                value="yes">
                                            <label for="radioPrimary19">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary20" name="r10"
                                                value="no">
                                            <label for="radioPrimary20">No</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Allocation Days</th>
                                                        <th class="py-1">Before EDD</th>
                                                        <th class="py-1">After EDD</th>
                                                        <th class="py-1">Depends on</th>
                                                        <th class="py-1">Calendar Type</th>
                                                        <th class="py-1">First Payment</th>
                                                        <th class="py-1">Last Payment</th>
                                                        <th class="py-1">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="mlv-policy-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="mlvrule[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="15%">
                                                            <div class="d-flex">
                                                                <input type="text" class="w-100 border-1"
                                                                    name="mlvdays[]" style="height: 24px;">

                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="number" class="w-100 border-0"
                                                                name="bedd[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="number" class="w-100 border-0"
                                                                name="aedd[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="20%">
                                                            <div class="custom-control custom-radio d-inline mr-2">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="dependson" id="depends1" value="doj">
                                                                <label title="Date of Joining" for="depends1"
                                                                    class="custom-control-label"
                                                                    style="font-size: 14px; cursor: pointer;">DOJ</label>
                                                            </div>
                                                            <div class="custom-control custom-radio d-inline">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="dependson" id="depends2" value="doj">
                                                                <label title="Date of confirmation" for="depends2"
                                                                    class="custom-control-label"
                                                                    style="font-size: 14px; cursor: pointer;">DOC</label>
                                                            </div>
                                                            <div class="d-inline ml-2">
                                                                <input type="text" class="w-25 border-1"
                                                                    name="mlvdaysafter[]" placeholder="Days after"
                                                                    style="height: 24px;">
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <div class="custom-control custom-radio d-inline mr-2">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="mlvcaltype" id="mlvrcaltype1" value="cc">
                                                                <label title="Company Calendar" for="mlvrcaltype1"
                                                                    class="custom-control-label"
                                                                    style="font-size: 14px; cursor: pointer;">CC</label>
                                                            </div>
                                                            <div class="custom-control custom-radio d-inline">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="mlvcaltype" id="mlvrcaltype2" value="ec">
                                                                <label title="Employee Calendar" for="mlvrcaltype2"
                                                                    class="custom-control-label"
                                                                    style="font-size: 14px; cursor: pointer;">EC</label>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="text" class="w-100 border-0" name="fpay[]"
                                                                style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="text" class="w-100 border-0" name="lpay[]"
                                                                style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-mlv-policy">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 10 End --}}
                            {{-- Question : 11 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Salary Process Period</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions11">11. What is the Salary Cycle Period?</label>

                                        <div class="icheck-primary d-inline ml-2">
                                            <input class="btn4 btn-no" type="radio" id="radioPrimary22" name="r11"
                                                value="calendermonth">
                                            <label for="radioPrimary22">Calendar Month</label>
                                        </div>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn3 btn-yes" type="radio" id="radioPrimary21" name="r11"
                                                value="crossmonth">
                                            <label for="radioPrimary21">Cross Month</label>
                                        </div>

                                        <div class="mt-2 showDetails" style="display: none;">
                                            <table class="table table-bordered text-center w-50"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">From Date</th>
                                                        <th class="py-1">To Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="cross-month-date range">
                                                    <tr>
                                                        <td class="py-0 px-0">
                                                            <input type="date" class="w-100 border-0"
                                                                name="fromdate" style="height: 25px;">
                                                        </td>
                                                        <td class="py-0 px-0">
                                                            <input type="date" class="w-100 border-0" name="todate"
                                                                style="height: 25px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 11 End --}}
                            {{-- Question : 12 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Salary Structure</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions12">12. What is the Salary Structure?</label>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Salary Head</th>
                                                        <th class="py-1">Calculation</th>
                                                        <th class="py-1">Fixed</th>
                                                        <th class="py-1">Rounding</th>
                                                        <th class="py-1">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="salary-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="salaryrule[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="25%">
                                                            <div class="d-flex">
                                                                <select class="custom-select custom-select-sm"
                                                                    style="height: 25px;">
                                                                    <option selected>Select Salary Head</option>
                                                                    <option value="1">GROSS</option>
                                                                    <option value="2" selected>BASIC</option>
                                                                    <option value="3">HOUSE RENT</option>
                                                                    <option value="4">MEDICAL</option>
                                                                    <option value="5">FOOD ALLOWANCE</option>
                                                                    <option value="6">CONVEYANCE ALLOWANCE</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="30%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="salaryCalc[]" style="height: 24px;"
                                                                placeholder="(GROSS-(MEDICAL+CONVEYANCE+FOOD))/1.5"
                                                                >
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <div class="custom-control custom-checkbox d-inline">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="salaryfixed" name="isfixed" value="isfixed">
                                                                <label for="salaryfixed"
                                                                    class="custom-control-label"
                                                                    title="Is Fixed Salary"
                                                                    style="cursor: pointer;"></label>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="number" class="w-100 border-0"
                                                                name="rounding[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-salary-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 12 End --}}
                            {{-- Question : 13 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Salary Heads</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions13">13. How many Salary Heads do you have?</label>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Earnings Heads</th>
                                                        <th class="py-1">Deduction Heads</th>
                                                        <th class="py-1">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="salary-heads-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="38%">
                                                            <select class="select2 custom-select custom-select-sm"
                                                                multiple="multiple"
                                                                data-placeholder="Select Earnings Heads"
                                                                style="width: 100%; height: 25px;">
                                                                <option>GROSS</option>
                                                                <option>BASIC</option>
                                                                <option>HOUSE RENT</option>
                                                                <option>MEDICAL</option>
                                                                <option>CONVEYANCE</option>
                                                                <option>FOOD ALLOWANCE</option>
                                                                <option>ATTENDANCE BONUS</option>
                                                                <option>HOLIDAY ALLOWANCE</option>
                                                                <option>OTHERS ALLOWANCE</option>
                                                            </select>
                                                        </td>
                                                        <td class="py-0 px-0" width="38%">
                                                            <select class="select2 custom-select custom-select-sm"
                                                                multiple="multiple"
                                                                data-placeholder="Select Deduction Heads"
                                                                style="width: 100%; height: 25px;">
                                                                <option>ABSENTEEISM</option>
                                                                <option>INCOME TAX</option>
                                                                <option>ADVANCE</option>
                                                                <option>SUBSIDY</option>
                                                                <option>STAMP</option>
                                                                <option>OTHERS DEDUCTION</option>
                                                            </select>
                                                        </td>
                                                        <td class="py-0 px-0" width="auto">
                                                            <input type="text" class="w-100 border-0"
                                                            name="rmrks" style="height: 24px;"
                                                            placeholder="Please enter here for more Salary Heads"
                                                            >
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 13 End --}}
                            {{-- Question : 14 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Attendance Bonus</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions14">14. What is the Attendance Bonus Calculation Policy? </label>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Condition</th>
                                                        <th class="py-1">Amount</th>
                                                        <th class="py-1">Fixed</th>
                                                        <th class="py-1">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="atten-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="attenrule[]" style="height: 24px;"
                                                                placeholder="Rule-01 (Helper)"
                                                                >
                                                        </td>
                                                        <td class="py-0 px-0" width="35%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="attencal[]" style="height: 24px;"
                                                                placeholder="Absent=0; Late = 0; Leave = 0"
                                                                >
                                                        </td>
                                                        <td class="py-0 px-0" width="30%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="attenamnt[]" style="height: 24px;"
                                                                placeholder="400/-"
                                                                >
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <div class="custom-control custom-checkbox d-inline">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="attenfixed" name="attenfixed"
                                                                    value="isfixed">
                                                                <label for="attenfixed" class="custom-control-label"
                                                                    title="Is Fixed Salary"
                                                                    style="cursor: pointer;"></label>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-attenbonus-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 14 End --}}
                            {{-- Question : 15 --}}
                            {{-- <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Over Time Amount</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions15">15. What is the Over Time Amount Calculation Policy?</label>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Calculation</th>
                                                        <th class="py-1">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="OTAmnt-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="attenrule[]" style="height: 24px;"
                                                                placeholder="Rule-01"
                                                                >
                                                        </td>
                                                        <td class="py-0 px-0" width="75%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="attencal[]" style="height: 24px;"
                                                                placeholder="BASIC/208 * 2"
                                                                >
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-otAmnt-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- Question : 15 End --}}
                            {{-- Question : 16 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Others Allowance</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions16">16. Do you have any Additional Allowances?
                                        </label>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn1 btn-yes" type="radio" id="radioPrimary1" name="r1"
                                                value="yes">
                                            <label for="radioPrimary1">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn2 btn-no" type="radio" id="radioPrimary2" name="r1"
                                                value="no">
                                            <label for="radioPrimary2">No</label>
                                        </div>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Condition</th>
                                                        <th class="py-1">Day Status</th>
                                                        <th class="py-1">Shift Type</th>
                                                        <th class="py-1">Amount</th>
                                                        <th class="py-1">Fixed</th>
                                                        <th class="py-1">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="otherallow-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="otherrule[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="auto">
                                                            <div class="d-inline ml-2">
                                                                <select name="category" id="cat" class="custom-select custom-select-sm w-25">
                                                                    <option value="0" selected>Select Punch Type</option>
                                                                    <option value="1">Out Time</option>
                                                                    <option value="2">In Time</option>
                                                                </select>

                                                                    <input type="time" class="w-25 border-1"
                                                                    name="mlvdaysafter[]" placeholder="OutTime"
                                                                    style="height: 24px;">
                                                            </div>
                                                            <div class="custom-control custom-radio d-inline mr-2">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="dependson" id="depends1" value="doj">
                                                                <label title="Date of Joining" for="depends1"
                                                                    class="custom-control-label"
                                                                    style="font-size: 14px; cursor: pointer;">Daily</label>
                                                            </div>
                                                            <div class="custom-control custom-radio d-inline">
                                                                <input type="radio" class="custom-control-input"
                                                                    name="dependson" id="depends2" value="doj">
                                                                <label title="Date of confirmation" for="depends2"
                                                                    class="custom-control-label"
                                                                    style="font-size: 14px; cursor: pointer;">Monthly</label>
                                                            </div>


                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="otherruleamnt[]" style="height: 24px;">
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <div class="custom-control custom-checkbox d-inline">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="otherrulefixed" name="otherrulefixed"
                                                                    value="isfixed">
                                                                <label for="otherrulefixed"
                                                                    class="custom-control-label"
                                                                    title="Is Fixed Salary"
                                                                    style="cursor: pointer;"></label>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-otherallow-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 16 End --}}
                            {{-- Question : 17 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Salary Deduction</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions06">17. What is the Salary Deduction
                                            Policy?</label>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Condition</th>
                                                        <th class="py-1">Calculation</th>
                                                        <th class="py-1">Fixed</th>
                                                        <th class="py-1">Remarks</th>
                                                        <th class="py-1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="salary-deduct-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <div class="d-flex">
                                                                <select class="custom-select custom-select-sm"
                                                                    style="height: 25px;">
                                                                    <option selected>Select Rule Name</option>
                                                                    <option value="1" selected>Absenteeism</option>
                                                                    <option value="2">Late In</option>
                                                                    <option value="3">Early Out</option>
                                                                    <option value="4">No Pay</option>
                                                                    <option value="5">Advance</option>
                                                                    <option value="6">Adjustment</option>
                                                                    <option value="6">Others</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0" width="40%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="deduct_con[]" placeholder="Absent > 0">
                                                        </td>
                                                        <td class="py-0 px-0" width="40%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="deduct_cal[]" placeholder="BASIC / 30 * Absent Days">
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <div class="custom-control custom-checkbox d-inline">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="salde" name="salde" value="salde">
                                                                <label for="salde" class="custom-control-label"
                                                                    title="Is Taxable"
                                                                    style="cursor: pointer;"></label>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="salde_remarks[]">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-deduct-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 17 End --}}
                            {{-- Question : 18 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Income Tax</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions06">18. Do you follow the Bangladesh Income Tax Ordinance?</label>
                                        <div class="icheck-primary d-inline ml-3 mr-2">
                                            <input class="btn1 btn-yes" type="radio" id="tax_policy_yes" name="tax_policy"
                                                value="yes">
                                            <label for="tax_policy_yes">Yes</label>
                                        </div>
                                        <div class="icheck-primary d-inline">
                                            <input class="btn2 btn-no" type="radio" id="tax_policy_no" name="tax_policy"
                                                value="no">
                                            <label for="tax_policy_no">No</label>
                                        </div>
                                        <div class="mt-2 showDetails" style="display: none;">
                                            <div class="col mb-1">
                                                <input type="file" class="custom-file-input" id="ordinanceCustomFile"
                                                    accept=".rar,.zip,.xls,.pdf" name="it_ordinance">
                                                <label class="custom-file-label" for="ordinanceCustomFile">Upload Income Tax Ordinance</label>
                                            </div>
                                            <div class="col">
                                                <input type="file" class="custom-file-input" id="itCalculationFile"
                                                    accept=".xls" name="it_policy">
                                                <label class="custom-file-label" for="itCalculationFile">Upload Sample Income Tax Calculation</label>
                                            </div>
                                        </div>

                                </div>
                            </div>
                            </div>
                            {{-- Question : 18 End --}}
                            {{-- Question : 19 --}}
                            <div class="card" style="box-shadow: none; border: 1px solid rgba(0, 0, 0, 0.15);">
                                <div class="card-header py-1" data-card-widget="collapse">
                                    <h3 class="card-title">Festival Bonus</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="form-group clearfix mb-0">
                                        <label for="questions06">19. What is the Festival Bonus calculation
                                            policy?</label>
                                        <div class="mt-2 showDetails">
                                            <table class="table table-bordered text-center"
                                                style="font-size: 14px;">
                                                <thead>
                                                    <tr>
                                                        <th class="py-1">Rule Name</th>
                                                        <th class="py-1">Calculation</th>
                                                        <th class="py-1">Fixed</th>
                                                        <th class="py-1">Remarks</th>
                                                        <th class="py-1">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tax-rule-body">
                                                    <tr>
                                                        <td class="py-0 px-0" width="20%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="tax_rule[]">
                                                        </td>
                                                        <td class="py-0 px-0" width="40%">
                                                            <input type="text" class="w-100 border-0"
                                                                name="tax_cal[]">
                                                        </td>
                                                        <td class="py-0 px-0" width="10%">
                                                            <div class="custom-control custom-checkbox d-inline">
                                                                <input class="custom-control-input" type="checkbox"
                                                                    id="taxfixed" name="taxfixed" value="taxfixed">
                                                                <label for="taxfixed" class="custom-control-label"
                                                                    title="Is Taxable"
                                                                    style="cursor: pointer;"></label>
                                                            </div>
                                                        </td>
                                                        <td class="py-0 px-0 w-25">
                                                            <input type="text" class="w-100 border-0"
                                                                name="tax_remarks[]">
                                                        </td>
                                                        <td class="py-0 px-0" style="width: 5%;">
                                                            <i class="far fa-trash-alt text-danger delete"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: -10px;">
                                                <button class="btn btn-sm btn-info add-tax-rule">Add <i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Question : 19 End --}}
                        </div>
                        <div class="card-footer">
                            <div class="bnt-group mx-4">
                                <button type="submit" class="btn btn-info float-right ml-3">Submit Policy</button>
                                <button type="button" class="btn btn-default float-right" onclick="location.reload();">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</section>
{{-- Example Model --}}
@include('modal.shiftplan')
@include('modal.shiftrule')
@include('modal.MinuteWiseOTRound')
@include('modal.CategoryWiseOTRound')
@include('modal.OTRateModal')
@include('modal.leaveAllocation')

{{-- Scroll to Top Button --}}
<div class="float-right">
    <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
        <i class="fa fa-chevron-up"></i>
    </button>
</div>
