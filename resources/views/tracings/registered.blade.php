@extends('layouts.app')
 
@section('content')
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered table-responsive" id="tracings">
    <thead>
        <tr>
            <th>No</th>
            <th>Registered at</th>
            <th>Estimate Visit Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Purpose</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($tracings as $tracing)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tracing->created_at }}</td>
            <td>{{ $tracing->est_date }}</td>
            <td>{{ $tracing->full_name }}</td>
            <td>{{ $tracing->email }}</td>
            <td>{{ $tracing->phone }}</td>
            <td>{{ $tracing->full_address }}</td>
            <td>
                @foreach($tracing->purpose as $value)
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