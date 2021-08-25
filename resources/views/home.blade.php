@extends('layouts.app')

@section('content')

<div class="container">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center h1">{{ $message }}</p>
    </div>
@endif

@if(Auth::user()->office_id != 0)


    <div class="row justify-content-center">
        <div class="col-lg-4">
            <a class="btn btn-sm btn-block btn-primary p-5 my-3" href="{{ route('approved') }}">Approved </br> {{$approvecount}}</a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-sm btn-block btn-primary p-5 my-3" href="{{ route('unapproved') }}">Unapproved </br> {{$unapprovecount}}</a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-sm btn-block btn-primary p-5 my-3" href="{{ route('staffindex') }}">All Appointments </br> {{$all}}</a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-sm btn-block btn-primary p-5 my-3" href="{{ route('tomorrow') }}">Proposed to go tomorrow </br> {{$tomorrow}}</a>
        </div>
        <div class="col-lg-4">
            <a class="btn btn-sm btn-block btn-primary p-5 my-3" href="{{ route('today') }}">Proposed to go today </br> {{$today}}</a>
        </div>
    </div>

@else
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="jumbotron ">
            <h2>WELCOME!</h2>
            <p >{{ Auth::user()->full_name }}</p>
            <a href="{{ route('appointments.index') }}" type="button" class="btn btn-lg btn-primary">Online Appointment</a>
            </div>
        </div>
    </div>
    
@endif


@endsection
