@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <a href="{{ route('tracings.index') }}" type="button" class="btn btn-lg btn-block btn-primary p-5"><h1 class="font-weight-bold">Reports</h1></a>
        </div>
    </div>
</div>

@endsection
