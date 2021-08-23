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


<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Transactions</div>
                <div class="card-body">
                    <p>Note: One Office Only Per Visit</p>
                    <div class="row my-3">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                        <label>Select Transaction</label>
                                        <select class="form-control" name="transaction_id">
                                        @foreach ($transactions as $transaction)
                                        <option value="{{ $transaction->id }}"><div class="font-weight-bold">{{ $transaction->office->name }}</div> | {{ $transaction->name }}</option>
                                        @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>PROPOSED DATE:</label>
                                <input type="date" name="proposed_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>PROPOSED TIME:</label>
                                <input type="time" name="proposed_time" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 my-3 text-center">
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </div>
</form>
</div>
@endsection