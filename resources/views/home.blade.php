@extends('layouts.app')
@section('content')
@if (Auth::user()->for_client == 1)
    @include('questionnaire.home')
@elseif (Auth::user()->for_client == 0)
    @include('adminpanel.dashboard')
@endif
@endsection
