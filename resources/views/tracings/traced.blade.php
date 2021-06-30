@extends('layouts.app')
 
@section('content')
<div class="container-fluid">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <h1 class="text-center font-weight-bold text-primary">Traced</h1>
    <table class="table table-bordered table-responsive" id="tracings">
    <thead>
        <tr>
            <th>No</th>
            <th>Registered at</th>
            <th>Estimate Visit Date</th>
            <th>Visited at</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Purpose</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($timevisits as $timevisit)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $timevisit->tracing->created_at }}</td>
            <td>{{ $timevisit->tracing->est_date }}</td>
            <td>{{ $timevisit->created_at }}</td>
            <td>{{ $timevisit->tracing->full_name }}</td>
            <td>{{ $timevisit->tracing->email }}</td>
            <td>{{ $timevisit->tracing->phone }}</td>
            <td>{{ $timevisit->tracing->full_address }}</td>
            <td>
                @foreach($timevisit->tracing->purpose as $value)
                    {{$value}},
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  
</div>   



@endsection
@section('scripts')
<script>
$(document).ready(function() {
        $('#tracings').DataTable({
            order: [[0, 'desc']],
            dom: 'Bfrtip',
            buttons: [{
                responsive: true,
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]
        });
    });
    </script>
    @endsection