@extends('layouts.app')
@section('content')
<div class="container">
    <div style="position: fixed; top: 0; right: 0" class="m-4">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('refused'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endif
    </div>

    <div class="row my-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-primary" href="{{ route('appointments.create') }}">ADD</a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-lg-12">
            <table class="table table-sm table-borderless table-striped table-responsive text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>NO</th>
                        <th>TRANSACTION</th>
                        <th>OFFICE</th>
                        <th>PROPOSED DATE</th>
                        <th>APPOINTED DATE</th>
                        <th>PROPOSED TIME</th>
                        <th>APPOINTED TIME</th>
                        <th>STATUS</th>
                        <th>QR</th>
                    </tr>                </thead>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $appointment->transaction->name }}</td>
                    <td>{{ $appointment->transaction->office->name }}</td>
                    <td>{{ $appointment->proposed_date }}</td>
                    <td>
                        @if($appointment->appointed_date == null)
                        <span class="font-weight-bold text-danger">FOR APPROVAL</span>
                        @else
                        <span class="font-weight-bold text-success">{{ $appointment->appointed_date }}</span>
                        @endif
                    </td>
                    <td>{{ $appointment->proposed_time }}</td>
                    <td>
                        @if($appointment->appointed_time == null)
                        <span class="font-weight-bold text-danger">FOR APPROVAL</span>
                        @else
                        <span class="font-weight-bold text-success">{{ $appointment->appointed_time }}</span>
                        @endif
                    </td>
                    <td>
                        @if($appointment->status == 0)
                        <span class="badge badge-danger">FOR APPROVAL</span>
                        @elseif($appointment->status == 1)
                        <span class="badge badge-success">APPROVED</span>
                        @endif
                    </td>
                    <td>
                    <a class="btn btn-primary btn-sm btn-block" href="{{ route('qrcode',$appointment->id) }}">QR</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $appointments->links() !!}
        </div>
    </div>
</div>
@endsection