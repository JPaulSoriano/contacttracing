@extends('layouts.app')

@section('content')

<div class="container">
    <div style="position: fixed; top: 0; right: 0" class="m-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


<form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Transactions</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>NAME:</label>
                                <span class="font-weight-bold">{{ $appointment->user->full_name }}</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>TRANSACITON:</label>
                                <span class="font-weight-bold">{{ $appointment->transaction->name }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>REQUESTED DATE:</label>
                                <span class="font-weight-bold">{{ $appointment->proposed_date }}</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>REQUESTED TIME:</label>
                                <span class="font-weight-bold">{{ $appointment->proposed_time }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>APPOINT DATE:</label>
                                <input type="date" name="appointed_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>APPOINT TIME:</label>
                                <input type="time" name="appointed_time" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
