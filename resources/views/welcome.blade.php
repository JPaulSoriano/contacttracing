@extends('layouts.app')

@section('content')

<div class="container">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="text-center h1">{{ $message }}</p>
    </div>
@endif
<div class="display-1">UNDER MAINTENANCE</div>
<div class="display-4">WAIT FOR THE ANNOUNCEMENT ON THE CDD PAGE</div>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 text-center">
            <div class="jumbotron ">
            <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px">
            <h1 class="text-primary font-weight-bold text-center">Colegio de Dagupan</h1>
            <h3 class="text-primary font-weight-bold text-center">Online Appointment</h3>
            </div>
        </div>
    </div>


</div>
@endsection
