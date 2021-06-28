@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <a href="{{ route('tracings.index') }}" type="button" class="btn btn-lg btn-block btn-primary">Reports</a>

        </div>
    </div>
</div>
@endsection
