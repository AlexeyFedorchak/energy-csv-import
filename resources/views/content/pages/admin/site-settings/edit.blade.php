@extends('layouts.layoutMaster')



@section('title', 'Edit User')



@section('content')


<div class="container">

    <h1>User Bearbeiten</h1>



    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="form-group">

            <label for="name">Name:</label>

            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">

        </div><br>

        <div class="form-group">

            <label for="email">Email:</label>

            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">

        </div><br>

        <!-- Add more fields as needed -->



        <button type="submit" class="btn btn-primary mr-2">Speichern</button>

    </form>

</div>

@endsection