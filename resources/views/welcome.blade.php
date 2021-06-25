@extends('layouts.app')

@section('content')
<div class="container">
<div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="jumbotron">
            <img src="{{ asset('images/logo.png') }}" class="img-responsive center-block d-block mx-auto my-3" style="height: 150px">
            <h1 class="text-primary font-weight-bold text-center">Contact Tracing</h1>
            <hr class="my-4">
            <a href="{{ route('tracings.create') }}" type="button" class="btn btn-lg btn-block btn-primary">Continue</a>
            </div>
        </div>
    </div>
</div>
@endsection
