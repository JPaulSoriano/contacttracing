@extends('layouts.app')
 
@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   


    <div class="row justify-content-center">
       <div class="col-md-6 my-3">
       <a href="{{ route('registered') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Total Registrations</h3><h1 class="font-weight-bold text-info">{{$tracings}}</h1></a>
       </div>
       <div class="col-md-6 my-3">
       <a href="{{ route('registeredtoday') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Registered Today</h3><h1 class="font-weight-bold text-info">{{$tracingstoday}}</h1></a>
       </div>
       <div class="col-md-6 my-3">
       <a href="{{ route('traced') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Total Tracings</h3><h1 class="font-weight-bold text-info">{{$timevisits}}</h1></a>
       </div>
       <div class="col-md-6 my-3">
       <a href="{{ route('tracedtoday') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h3>Traced Today</h3><h1 class="font-weight-bold text-info">{{$timevisitstoday}}</h1></a>
       </div>
       <div class="col-md-6 my-3">
       <a href="{{ route('estdate') }}" type="button" class="btn btn-lg btn-block btn-dark p-5"><h3>Possible Visitors Today</h3><h1 class="font-weight-bold text-info">{{$estdate}}</h1></a>
       </div>
    </div>


</div>
@endsection
