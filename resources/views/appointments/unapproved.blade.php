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
            <table class="table table-sm table-borderless table-striped table-responsive text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>TRANSACTION</th>
                        <th>OFFICE</th>
                        <th>PROPOSED DATE</th>
                        <th>APPOINTED DATE</th>
                        <th>PROPOSED TIME</th>
                        <th>APPOINTED TIME</th>
                        <th>STATUS</th>
                        <th colspan="2">ACTION</th>
                    </tr>                </thead>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ optional($appointment->user)->full_name }}</td>
                    <td>{{ $appointment->transaction->name }}</td>
                    <td>{{ $appointment->transaction->office->name }}</td>
                    <td>{{ $appointment->proposed_date }}</td>
                    <td>
                        @if($appointment->appointed_date == null)
                        <span class="font-weight-bold text-danger">SET DATE</span>
                        @else
                        <span class="font-weight-bold text-success">{{ $appointment->appointed_date }}</span>
                        @endif
                    </td>
                    <td>{{ $appointment->proposed_time }}</td>
                    <td>
                        @if($appointment->appointed_time == null)
                        <span class="font-weight-bold text-danger">SET TIME</span>
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
                        @if($appointment->status == 1)
                        <form action="{{ route('refuse', $appointment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-block">Refuse</button>
                        </form>
                        @else
                        <a href="{{ route('approve', $appointment) }}"
                            class="btn btn-sm btn-success btn-block">Approve</a>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-block btn-sm" href="{{ route('appointments.edit', $appointment) }}">SCHED</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $appointments->links() !!}
        </div>
    </div>
</div>
@endsection