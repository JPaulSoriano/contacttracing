@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-0 bg-primary text-white">Appointment Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>OFFICE:</label>
                                    <span class="font-weight-bold">{{ $appointment->transaction->office->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>NAME:</label>
                                    <span class="font-weight-bold">{{ $appointment->full_name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>TRANSACITON:</label>
                                    <span class="font-weight-bold">{{ $appointment->transaction->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>APPOINTED DATE:</label>
                                    <span class="font-weight-bold">{{ $appointment->appointed_date }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>APPOINTED TIME:</label>
                                    <span class="font-weight-bold">{{ $appointment->appointed_time }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12 my-2">
                                @if($appointment->status == 0)
                                <span class="bg-danger rounded h3 text-white p-2"><i class="bi bi-x"></i> FOR APPROVAL</span>
                                @elseif($appointment->status == 1)
                                <span class="bg-success h3 text-white p-2"><i class="bi bi-check-all"></i> APPROVED</span>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
