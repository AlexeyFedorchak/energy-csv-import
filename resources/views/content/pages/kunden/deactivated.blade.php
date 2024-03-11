@extends('layouts.layoutMaster')

@section('title', 'Deaktivierte Mitarbeiter')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@section('content')
<h5 class="card-title">Deaktivierte Team Members bei {{ $teamName }}:</h5>

<div class="text-end mb-3">
    @if (auth()->user()->teamadmin == 1)
    <a href="{{ route('team.create') }}" class="btn btn-primary">Neue Member hinzufügen</a>
    @endif
</div>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Erstellt</th>
            <!-- Add other user data columns as needed -->
            @if (auth()->user()->teamadmin == 1)
                <th>Aktion</th>
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
                    <!-- Add other user data columns as needed -->
                    @if (auth()->user()->teamadmin == 1)
                    <td>
    <a href="{{ route('team.edit', ['user' => $user->id]) }}" class="btn btn-primary">Edit</a>
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
