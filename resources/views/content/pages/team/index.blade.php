@extends('layouts.layoutMaster')



@section('title', 'Team')



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



@section('content')

<h5 class="card-title">Team Members bei {{ $teamName }}:</h5>
@if ($message = Session::get('success'))

<div class="alert alert-success">
    
    <p>{{$message}}</p>
</div>

@endif


<div class="text-end mb-3">

    @if (auth()->user()->role == 2)

    <a href="{{ route('team.create') }}" class="btn btn-primary">Neue Member hinzufügen</a>

    <a href="{{ route('team.deactivated') }}" class="btn btn-danger">Deaktivierte Member</a>

    @endif

</div>



<table id="userTable" class="display">

    <thead>

        <tr>

            <th>Name</th>

            <th>Email</th>

            <th>Erstellt</th>
            <th>Role</th>

            <!-- Add other user data columns as needed -->

            @if (auth()->user()->role == 2)

                <th>Actions</th>

            @endif

        </tr>

    </thead>

    <tbody>

        @foreach ($users as $user)

            @if ($user->teamid == auth()->user()->teamid)

                <tr>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>{{ $user->created_at }}</td>
                    
                     @if ($user->role == 0)
                    <td>{{ 'Worker' }}</td>
                    @else ($user->role == 2)
                    <td>{{ 'Team Admin' }}</td>
                    @endif


                    <!-- Add other user data columns as needed -->

                    @if (auth()->user()->role == 2)

                    <td>

    <a href="{{ route('team.edit', $user->id) }}" class="btn btn-primary">Edit</a>

    <a href="{{ route('team.deactivate', ['user' => $user->id]) }}" class="btn btn-danger">Deactivate</a>

</td>

                    @endif

                </tr>

            @endif

        @endforeach

    </tbody>

</table>



<script>

    $(document).ready(function() {

        $('#userTable').DataTable();

    });

</script>



@endsection

