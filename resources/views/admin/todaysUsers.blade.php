@extends('layouts/layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Users Registered Today</h1>

<!-- Include DataTables CSS and JavaScript via CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>

<!-- Add a unique id to the table -->
<table class="table" id="users-datatable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registration Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td><a href="{{ route('admin.editUser', ['id' => $userIds[$loop->index]]) }}" class="btn btn-primary">Edit User</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#users-datatable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search
            "ordering": true, // Enable sorting
            "info": true, // Show table information
        });
    });
</script>

@endsection
