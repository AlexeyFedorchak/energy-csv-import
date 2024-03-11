@extends('layouts.layoutMaster')



@section('title', 'User List')

<!-- Include jQuery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- Include DataTables.js -->

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



<!-- Include DataTables CSS -->

<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')

<div class="container">
  @if ($message = Session::get('success'))

  <div class="alert alert-success">
    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button> -->
    <p>{{$message}}</p>
  </div>

  @endif

  <div class="d-flex justify-content-between align-items-center">

    <h1>Mitarbeiter Liste</h1>

    <div class="btn-group">

      <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary m-1">Zurück zum Admin Panel</a>

      <a href="{{ route('admin.users.create') }}" class="btn btn-primary m-1">Erstellen</a>

    </div>

  </div>

  <table id="userTable" class="display">

    <thead>

      <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Email</th>
        <th>Rolle</th>

        <th>Aktionen</th> <!-- Add a new column for actions -->

      </tr>

    </thead>

    <tbody>

      @foreach ($users as $user)

      <tr>

        <td>{{ $user->id }}</td>

        <td>{{ $user->name }}</td>

        <td>{{ $user->email }}</td>

        @if ($user->role == 0)
        <td>{{ 'Worker' }}</td>
        @elseif ($user->role == 2)
        <td>{{ 'Team Admin' }}</td>
        @else
        <td>{{ 'Admin' }}</td>
        @endif

        <td>

          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>

        </td>

      </tr>

      @endforeach

    </tbody>

  </table>

</div>



<script>
  $(document).ready(function () {

    $('#userTable').DataTable();

  });

</script>

@endsection
