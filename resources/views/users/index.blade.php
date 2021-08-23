@extends('layouts.app')
@section('content')
<div class="container">
    @if ($message = Session::get('Success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="row my-3">
        <div class="col-lg-12">
            <a class="btn btn-sm btn-primary" href="{{ route('users.create') }}">ADD</a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-lg-12">
            <table class="table table-borderless table-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>NO</th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>OFFICE</th>
                        <th width="280px">ACTION</th>
                    </tr>                </thead>
                @foreach ($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ optional($user->office)->name }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $users->links() !!}
        </div>
    </div>
</div>
@endsection