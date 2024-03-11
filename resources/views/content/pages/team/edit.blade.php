@extends('layouts.layoutMaster')



@section('title', 'Teammitglied bearbeiten')



@section('content')

    <h5 class="card-title">Teammitglied bearbeiten</h5>



    <form method="POST" action="{{ route('team.update', $user->id) }}">

        @csrf

        @method('PUT')



        {{-- <div class="mb-3">

            <label for="partnerid" class="form-label">Partner ID</label>

            <input type="text" class="form-control" id="partnerid" name="partnerid" value="{{ old('partnerid', $user->partnerid) }}" required>

        </div> --}}



        <div class="mb-3">

            <label for="username" class="form-label">Benutzername</label>

            <input type="text" class="form-control" id="username" name="name" value="{{ old('name', $user->name) }}" required>

        </div>



        <div class="mb-3">

            <label for="email" class="form-label">Email</label>

            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>

        </div>



        <div class="mb-3">

            <label for="password" class="form-label">Passwort</label>

            <input type="password" class="form-control" id="password" name="password">

        </div>



        <div class="mb-3">

            <label for="admin" class="form-label">Admin</label>

            <select class="form-select" id="admin" name="admin" required>

                <option value="1" {{ old('admin', $user->teamadmin == 1 ? 'selected' : '') }}>Yes</option>

                <option value="0" {{ old('admin', $user->teamadmin == 0 ? 'selected' : '') }}>No</option>

            </select>

        </div>



        <button type="submit" class="btn btn-primary">Update</button>

    </form>

@endsection

