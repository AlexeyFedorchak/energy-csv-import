@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Neues Team hinzufügen</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.teams.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Team Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="teamid">Team ID</label>
            <input type="text" class="form-control" id="teamid" name="teamid" value="{{ old('teamid') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Team Hinzufügen</button>
    </form>
</div>
@endsection