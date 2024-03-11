@extends('layouts.layoutMaster')

@section('title', 'Teammitglied hinzufügen')

@section('content')
<h5 class="card-title">Neues Teammitglied</h5>

<form method="POST" action="{{ route('team.store') }}">
    @csrf

   

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Passwort</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="mb-3">
        <label for="admin" class="form-label">Admin</label>
        <select class="form-select" id="admin" name="admin">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
</form>

@endsection
