@extends('layouts/layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<h1>All Users</h1>

<!-- Include DataTables CSS and JavaScript via CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>

<!-- Add a unique id to the table -->
<table id="users-table" class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Rolle</th>
            <th>Registriert als</th>
            <th>Aktion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <a href="{{ route('admin.editUser', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil"></i> Bearbeiten
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search
            "ordering": true, // Enable sorting
            "info": true, // Show table information
        });
    });
</script>

@endsection
