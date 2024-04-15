@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>CSV Hinzufügen</h1>

    <div class="alert alert-{{ $alertType }}">
        {{ $alertMessage }}
    </div>

    <form method="GET" action="{{ route('admin.import') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Zurück</button>
    </form>
</div>
@endsection
