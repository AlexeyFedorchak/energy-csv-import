@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>CSV Hinzufügen</h1>
    @if($updateResult >= 0)
        <div class="alert alert-success">
            Datei wurde hinzugefügt!!!
        </div>
    @else 
        <div class="alert alert-danger">
            Datei Ungültig!!!
        </div>
    @endif
    <form method="GET" action="{{ route('admin.import') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Zurück</button>
    </form>
</div>
@endsection
