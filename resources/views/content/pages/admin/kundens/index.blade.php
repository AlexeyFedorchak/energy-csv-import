@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#teams-table').DataTable(); // Replace 'teams-table' with the ID of your table
    });
</script>
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Teams Liste</h2>
        <div class="btn-group">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Zurück zum Admin Panel</a>
            <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">Erstellen</a>
        </div>
    </div>
    <table id="teams-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Team ID</th>
                <th>Teamadmin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->teamid }}</td>
                <td>
                    @if(isset($teamAdmins[$team->id]) && !$teamAdmins[$team->id]->isEmpty())
                        @foreach($teamAdmins[$team->id] as $admin)
                            {{ $admin->name }},
                        @endforeach
                    @else
                        Kein Admin zugewiesen
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection