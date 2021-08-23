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


<form action="{{ route('users.store') }}" method="POST">
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
                                        <label>Select Office</label>
                                        <select class="form-control" name="office_id">
                                        @foreach ($offices as $office)
                                        <option value="{{ $office->id }}"><div class="font-weight-bold">{{ $office->name }}</option>
                                        @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input type="password" name="confirm-password" class="form-control">
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