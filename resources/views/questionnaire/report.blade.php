@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table-sm caption-top table-bordered" id="report" style="font-size: 12px;">
            <caption class="text-center">
                <h3>{{ $data->company->name }}</h3>
                <h6>{{ $data->company->address }}</h6>
            </caption>
            <thead class="text-center">
                <tr>
                    <th style="width: 5%;">SL # No</th>
                    <th style="width: 15%">Policy Type</th>
                    <th style="width: 10%">Policy Name</th>
                    <th style="width: 50%">Descriptions</th>
                    <th style="width: 20%">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 2;
                @endphp
                <tr>
                    <td class="text-center">1</td>
                    <td>Personal Information Management</td>
                    <td>PIMS</td>
                    <td>{{ $data->pims[0]->is_upload == 1 ? $data->company->name . ' will upload PIMS using the provided excel template' : $data->company->name . ' will update PIMS manually' }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" rowspan="3">2</td>
                    <td rowspan="3">Attendance Management</td>
                    <td>Device Log</td>
                    <td>
                        @if ($data->device[0]->file_name)
                            A device log file has been uploaded to the following link <strong>
                                {{ $data->device[0]->file_path . '/' . $data->device[0]->file_name }} </strong>
                        @else
                            Nothing device information to integrate
                        @endif
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center"></td> --}}
                    {{-- <td>Attendance Management</td> --}}
                    <td>Shift Plan</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Shift Type</th>
                                    <th class="p-0">In Time</th>
                                    <th class="p-0">Out Time</th>
                                    <th class="p-0">Working Hour</th>
                                    <th class="p-0">Late Grace Time</th>
                                    <th class="p-0">NOT Limit</th>
                                    <th class="p-0">EOT Limit</th>
                                    <th class="p-0">Break Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->shiftplan as $shiftplan)
                                    <tr>
                                        <td class="p-0">{{ $shiftplan->shiftname }}</td>
                                        <td class="p-0">{{ $shiftplan->intime }}</td>
                                        <td class="p-0">{{ $shiftplan->outtime }}</td>
                                        <td class="p-0">{{ $shiftplan->whour }}</td>
                                        <td class="p-0">{{ $shiftplan->lgrace }}</td>
                                        <td class="p-0">{{ $shiftplan->not }}</td>
                                        <td class="p-0">{{ $shiftplan->eot }}</td>
                                        <td class="p-0">{{ $shiftplan->lout }}-{{ $shiftplan->lin }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center"></td> --}}
                    {{-- <td>Attendance Management</td> --}}
                    <td>Shift Rule</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Shift Plan</th>
                                    <th class="p-0">Roster Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->shiftrule as $shiftrule)
                                    <tr>
                                        <td class="p-0">{{ $shiftrule->rule_name }}</td>
                                        <td class="p-0">{{ $shiftrule->shift_name }}</td>
                                        <td class="p-0">{{ $shiftrule->change_after }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" rowspan="2">3</td>
                    <td rowspan="2">Overtime Management</td>
                    <td>Overtime Rounding</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0"><b>Rounding Type :
                                    {{ ucwords(str_replace('_', ' ', $data->otround[0]->rounding_type)) }}</b></caption>
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Minimum Minutes</th>
                                    <th class="p-0">Maximum Minutes</th>
                                    <th class="p-0">OT Minutes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->otround as $otround)
                                    <tr>
                                        <td class="p-0">{{ $otround->rule_name }}</td>
                                        <td class="p-0">{{ $otround->min_minutes }}</td>
                                        <td class="p-0">{{ $otround->max_minutes }}</td>
                                        <td class="p-0">{{ $otround->ot_minutes }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center"></td> --}}
                    {{-- <td>Attendance Management</td> --}}
                    <td>Over Time Rate</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0">
                                <b>{{ $data->otrate[0]->has_policy == 0 ? 'No Overtime Rate Policy available' : '' }}</b>
                            </caption>
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Formula</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->otrate as $otrate)
                                    <tr>
                                        <td class="p-0">{{ $otrate->rule_name }}</td>
                                        <td class="p-0">{{ $otrate->formula }}</td>
                                        <td class="p-0">{{ $otrate->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" rowspan="4">4</td>
                    <td rowspan="4">Leave Management</td>
                    <td>Leave Calendar</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Calendar Type</th>
                                    <th class="p-0">From Date</th>
                                    <th class="p-0">To Date</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->lvcalendar as $lvcalendar)
                                    <tr>
                                        <td class="p-0">{{ $lvcalendar->rule_name }}</td>
                                        <td class="p-0">{{ $lvcalendar->from_date }}</td>
                                        <td class="p-0">{{ $lvcalendar->to_date }}</td>
                                        <td class="p-0">{{ $lvcalendar->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center"></td> --}}
                    {{-- <td>Attendance Management</td> --}}
                    <td>Leave Allocation</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0">
                                <b>{{ $data->lvpolicy[0]->has_policy == 0 ? 'No Leave Policy available' : '' }}</b>
                            </caption>
                            <thead>
                                <tr>
                                    <th class="p-0">Leave Type</th>
                                    <th class="p-0">Days</th>
                                    <th class="p-0">Credit</th>
                                    <th class="p-0">Start From</th>
                                    <th class="p-0">Calendar Type</th>
                                    <th class="p-0">Is Prorate </th>
                                    <th class="p-0">Limit</th>
                                    <th class="p-0">CF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->lvpolicy as $lvpolicy)
                                    <tr>
                                        <td class="p-0">{{ $lvpolicy->name }}</td>
                                        <td class="p-0">{{ $lvpolicy->alloc_days }}</td>
                                        <td class="p-0">{{ $lvpolicy->credit_type }}</td>
                                        <td class="p-0">{{ $lvpolicy->calc_basis }}</td>
                                        <td class="p-0">{{ $lvpolicy->calc_type }}</td>
                                        <td class="p-0">{{ $lvpolicy->is_prorate == 1 ? 'Yes' : 'No' }}</td>
                                        <td class="p-0">{{ $lvpolicy->conse_limit }}</td>
                                        <td class="p-0">{{ $lvpolicy->carry_forward }}</td>
                                        <td class="p-0">{{ $lvpolicy->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center"></td> --}}
                    {{-- <td>Attendance Management</td> --}}
                    <td>Leave Encashment</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0">
                                <b>{{ $data->lvencash[0]->has_policy == 0 ? 'No Leave Encashment Policy available' : '' }}</b>
                            </caption>
                            <thead>
                                <tr>
                                    <th class="p-0">Leave Type</th>
                                    <th class="p-0">Allowable Encash Days</th>
                                    <th class="p-0">Calculation</th>
                                    <th class="p-0">Disbursement Month</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->lvencash as $lvencash)
                                    <tr>
                                        <td class="p-0">{{ strtoupper($lvencash->lv_name) }}</td>
                                        <td class="p-0">{{ $lvencash->encash_days }}
                                            ({{ $lvencash->criteria }})</td>
                                        <td class="p-0">{{ $lvencash->calculation }}</td>
                                        <td class="p-0">{{ date('F', strtotime($lvencash->disburse_date)) }}
                                        </td>
                                        <td class="p-0">{{ $lvencash->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center"></td> --}}
                    {{-- <td>Attendance Management</td> --}}
                    <td>Maternity Leave</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0">
                                <b>{{ $data->lvencash[0]->has_policy == 0 ? 'No Leave Encashment Policy available' : '' }}</b>
                            </caption>
                            <thead>
                                <tr>
                                    <th class="p-0">Leave Type</th>
                                    <th class="p-0">Allowable Encash Days</th>
                                    <th class="p-0">Calculation</th>
                                    <th class="p-0">Disbursement Month</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->lvencash as $lvencash)
                                    <tr>
                                        <td class="p-0">{{ strtoupper($lvencash->lv_name) }}</td>
                                        <td class="p-0">{{ $lvencash->encash_days }}
                                            ({{ $lvencash->criteria }})</td>
                                        <td class="p-0">{{ $lvencash->calculation }}</td>
                                        <td class="p-0">{{ date('F', strtotime($lvencash->disburse_date)) }}
                                        </td>
                                        <td class="p-0">{{ $lvencash->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" rowspan="7">5</td>
                    <td rowspan="7">Payroll Management</td>
                    <td>Salary Process Period</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0">
                                <b>{{ $data->salaryperiod[0]->process_type == 'calendarmonth' ? 'Process Period : Calendar Month' : '' }}</b>
                            </caption>
                            <thead>
                                <tr>
                                    <th class="p-0">From Date</th>
                                    <th class="p-0">To Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->salaryperiod as $salaryperiod)
                                    <tr>
                                        <td class="p-0">
                                            {{ $salaryperiod->from_date ? $salaryperiod->from_date : 'First day of Month' }}
                                        </td>
                                        <td class="p-0">
                                            {{ $salaryperiod->to_date ? $salaryperiod->to_date : 'Last day of Month' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                <tr>
                    {{-- <td class="text-center" rowspan="4">4</td> --}}
                    {{-- <td rowspan="4">Payroll Management</td> --}}
                    <td>Salary Structure</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Head Name</th>
                                    <th class="p-0">Calculation</th>
                                    <th class="p-0">Is Fixed</th>
                                    <th class="p-0">Rounding</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->salaryrule as $salaryrule)
                                    <tr>
                                        <td class="p-0">{{ $salaryrule->rule_name }}</td>
                                        <td class="p-0">{{ $salaryrule->salary_head }}</td>
                                        <td class="p-0">{{ $salaryrule->formula }}</td>
                                        <td class="p-0">{{ $salaryrule->is_fixed ? 'Yes' : 'No' }}</td>
                                        <td class="p-0">{{ $salaryrule->rounding }}</td>
                                        <td class="p-0">{{ $salaryrule->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center" rowspan="4">4</td> --}}
                    {{-- <td rowspan="4">Payroll Management</td> --}}
                    <td>Salary Head</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Head Name</th>
                                    <th class="p-0">Head Type</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->salaryhead as $salaryhead)
                                    <tr>
                                        <td class="p-0">{{ $salaryhead->salary_head }}</td>
                                        <td class="p-0">{{ $salaryhead->head_type }}</td>
                                        <td class="p-0">{{ $salaryhead->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center" rowspan="4">4</td> --}}
                    {{-- <td rowspan="4">Payroll Management</td> --}}
                    <td>Attendance Payment</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Condition</th>
                                    <th class="p-0">Amount</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->attenpayment as $attenpayment)
                                    <tr>
                                        <td class="p-0">{{ $attenpayment->rule_name }}</td>
                                        <td class="p-0">{{ $attenpayment->policy }}</td>
                                        <td class="p-0">{{ $attenpayment->amount }}</td>
                                        <td class="p-0">{{ $attenpayment->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center" rowspan="4">4</td> --}}
                    {{-- <td rowspan="4">Payroll Management</td> --}}
                    <td>Other Allowance</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <caption class="p-0">
                                <b>{{ $data->othersalary[0]->has_policy == 0 ? 'No other allowance policy available' : '' }}</b>
                            </caption>
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Condition</th>
                                    <th class="p-0">Day Status</th>
                                    <th class="p-0">Amount</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->othersalary as $othersalary)
                                    <tr>
                                        <td class="p-0">{{ $othersalary->rule_name }}</td>
                                        <td class="p-0">{{ $othersalary->condition }}</td>
                                        <td class="p-0">{{ $othersalary->day_status }}</td>
                                        <td class="p-0">{{ $othersalary->amount }}</td>
                                        <td class="p-0">{{ $othersalary->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    {{-- <td class="text-center" rowspan="4">4</td> --}}
                    {{-- <td rowspan="4">Payroll Management</td> --}}
                    <td>Salary Deduction Policy</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Condition</th>
                                    <th class="p-0">Amount</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->salarydeduction as $salarydeduction)
                                    <tr>
                                        <td class="p-0">{{ $salarydeduction->rule_name }}</td>
                                        <td class="p-0">{{ $salarydeduction->condition }}</td>
                                        <td class="p-0">{{ $salarydeduction->calculation }}</td>
                                        <td class="p-0">{{ $salarydeduction->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center" rowspan="1">6</td>
                    <td rowspan="1">Bonus Management</td>
                    <td>Festival Bonus</td>
                    <td>
                        <table class="table-sm text-center w-100">
                            <thead>
                                <tr>
                                    <th class="p-0">Rule Name</th>
                                    <th class="p-0">Calculation</th>
                                    <th class="p-0">Amount</th>
                                    <th class="p-0">Is Fixed</th>
                                    <th class="p-0">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->bonus as $bonus)
                                    <tr>
                                        <td class="p-0">
                                            {{ $bonus->rule_name }}
                                        </td>
                                        <td class="p-0">
                                            {{ $bonus->condition}}
                                        </td>
                                        <td class="p-0">
                                            {{ $bonus->calculation}}
                                        </td>
                                        <td class="p-0">
                                            {{ $bonus->is_fixed ? 'Yes' : 'No'}}
                                        </td>
                                        <td class="p-0">
                                            {{ $bonus->remarks}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>




                    @php
                        $id++;
                    @endphp

            </tbody>
        </table>


    </div>
@endsection
