@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <p class="text-center text-primary font-weight-bold">
            PRESENT THIS QR CODE TO THE GUARD BEFORE ENTERING THE CAMPUS
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row d-flex-justify-content-center">
                        <div class="col-lg-12 h4 font-weight-bold text-center my-3 text-uppercase">
                            {{$tracing->last_name}}, {{$tracing->first_name}} {{$tracing->middle_name}}
                        </div>
                        <div class="col-lg-12 my-3 text-center">
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)
                             ->merge(public_path('images/logo.png'), 0.3, true)->errorCorrection('H')
                             ->color(0, 28, 64)
                             ->margin(3)
	                         ->generate(url('/tracings')."/".$tracing->id)); !!} ">
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <p class="text-center text-primary font-weight-bold">
            SCREENSHOT YOUR QR CODE<br>
            OR</br>
            QR CODE SENT TO YOUR EMAIL. PLEASE PRESENT THE QR CODE TO THE SCHOOL GUARD BEFORE ENTERING THE SCHOOL CAMPUS. STAY SAFE ALWAY
            </p>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <p class="text-center text-primary text-lead">
            Note: If GMAIL APP is blocking the QR Code for security reasons please try other EMAIL APP like Stock Android Email or Stock iOS Email App.
            </p>
        </div>
    </div>
</div>
@endsection
