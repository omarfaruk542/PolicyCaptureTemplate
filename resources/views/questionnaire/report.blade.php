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
                <td>{{ $data->pims[0]->is_upload == 1 ? $data->company->name.' will upload PIMS using the provided excel template' : $data->company->name. ' will update PIMS manually' }}</td>
                <td></td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>Attendance Management</td>
                <td>Device Log</td>
                <td>
                    @if ($data->device[0]->file_name)
                    A device log file has been uploaded to the following link <strong> {{ $data->device[0]->file_path.'/'.$data->device[0]->file_name }} </strong>
                    @else
                        Nothing device information to integrate
                    @endif
                </td>
                <td></td>
            </tr>
            @foreach ($data as $policy)


                @php
                    $id++;
                @endphp
            @endforeach
        </tbody>
    </table>


</div>
@endsection
