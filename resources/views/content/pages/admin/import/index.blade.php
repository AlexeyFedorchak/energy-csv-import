@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>CSV Importieren</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.import.upload') }}"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv_name">CSV Datei:</label>
            <input type="file" name="csv_name" class="form-control" accept=".csv" required>
        </div>
        <br>
        <div class="form-group">
          <label for="csv_name">Period:</label>
          <input type="date" name="period" class="form-control" value="{{ now()->format('Y-m-d') }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">CSV Hinzufügen</button>
    </form>
</div>
@endsection
