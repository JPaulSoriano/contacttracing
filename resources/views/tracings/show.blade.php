@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                <div class="card-header border-0 bg-primary"><div class="text-white mb-0 text-uppercase h2 font-weight-bold text-center">{{$tracing->full_name}}</div></div>
                <div class="card-body text-primary">
                    <div class="text-primary">Age: {{$tracing->age}}</div>
                    <div class="text-primary">Email: {{$tracing->email}}</div>
                    <div class="text-primary">Phone: {{$tracing->phone}}</div>
                    <div class="text-primary">Address: {{$tracing->street}} {{$tracing->city}} {{$tracing->province}}</div>
                    <div class="text-primary">Course: {{$tracing->course}}</div>
                    <div class="text-primary">Type: {{$tracing->stud_type}}</div>
                    <div class="text-primary">Registered at: {{$tracing->created_at}}</div>
                    <div class="text-primary">Estimated Arrival: {{$tracing->est_date}}</div>
                    <div class="text-primary">Arrive at: {{ $tracing->timevisit->last()->created_at }}</div>
                    <div class="text-primary">Purpose:
                        @foreach($tracing->purpose as $value)
                        {{$value}},
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
