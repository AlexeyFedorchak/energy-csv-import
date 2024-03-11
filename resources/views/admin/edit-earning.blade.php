@extends('layouts.layoutMaster')

@section('title', 'Edit Earning')

@section('content')
    <h1>Einnahmen Bearbeiten</h1>

    <form action="{{ route('admin.updateEarnings', ['id' => $earning->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $earning->date }}" required>
        </div>

        <div class="form-group">
            <label for="amount">Earnings:</label>
            <input type="number" name="amount" id="amount" step="0.01" min="0" class="form-control" value="{{ $earning->earning }}" required>
        </div>

        <div class="form-group">
            <label for="views">Views:</label>
            <input type="number" name="views" id="views" min="0" class="form-control" value="{{ $earning->views }}" required>
        </div>

        <div class="form-group">
            <label for="cpm">CPM:</label>
            <input type="number" name="cpm" id="cpm" step="0.01" min="0" class="form-control" value="{{ $earning->cpm }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Änderungen speichern</button>
    </form>
@endsection
