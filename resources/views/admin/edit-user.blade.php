@extends('layouts.layoutMaster')



@section('title', 'Edit User')



@section('content')

    <h1>User bearbeiten</h1>

    <form action="{{ route('admin.updateUser', ['id' => $user->id]) }}" method="POST">

        @csrf

        @method('PUT')



        <div class="form-group">

            <label for="name">Name:</label>

            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>

        </div>



        <div class="form-group">

            <label for="email">Email:</label>

            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>

        </div>



        <div class="form-group">

            <label for="admin">Admin:</label>

            <select name="admin" id="admin" class="form-control" required>

                <option value="1" {{ $user->admin == 1 ? 'selected' : '' }}>Yes</option>

                <option value="0" {{ $user->admin == 0 ? 'selected' : '' }}>No</option>

            </select>

        </div>



        <button type="submit" class="btn btn-primary">Änderungen speichern</button>

    </form>





    <h2>Websites von dem User</h2>

    <table class="table">

        <thead>

            <tr>

                <th>Name</th>

                <th>URL</th>

                <th>Kategorie</th>

                <th>Bearbeiten</th> <!-- Add a new table header for the Edit button -->

            </tr>

        </thead>

        <tbody>

            @foreach ($websites as $website)

                <tr>

                    <td>{{ $website->name }}</td>

                    <td>{{ $website->url }}</td>

                    <td>{{ $website->category }}</td>

                    <td>

                        <a href="{{ route('admin.editWebsite', ['id' => $website->id]) }}" class="btn btn-sm btn-primary">Bearbeiten</a>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

@endsection

