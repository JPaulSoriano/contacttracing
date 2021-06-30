@extends('layouts.app')
 
@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <div class="row justify-content-center">
        <div class="col-md-4">

        <a href="{{ route('registered') }}" type="button" class="btn btn-lg btn-block btn-primary p-5 my-3">Registered</a>
        <a href="{{ route('traced') }}" type="button" class="btn btn-lg btn-block btn-primary p-5 my-3">Traced</a>


        </div>
    </div>
</div>
@endsection
