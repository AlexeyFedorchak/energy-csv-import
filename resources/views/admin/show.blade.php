@extends('layouts/layoutMaster')

@section('title', 'Website Details')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
<div>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Zurück</a>
</div>

<h1>Website Details</h1>

<h2>{{ $website->name }}</h2>

<h3>Website Status</h3>

<form action="{{ route('admin.websites.update', $website->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="form-group">
    <label for="active">Status:</label>
    <select name="active" id="active" class="form-control" required>
        <option value="1" {{ $website->active == 1 ? 'selected' : '' }}>Aktiv</option>
        <option value="0" {{ $website->active == 0 ? 'selected' : '' }}>Wartend</option>
        <option value="2" {{ $website->active == 2 ? 'selected' : '' }}>Abgelehnt</option>
    </select>
</div>

    <button type="submit" class="btn btn-primary">Status speichern</button>
</form>

<h3>Kommentar hinzufügen</h3>

<form action="{{ route('admin.comment.store', $website->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <textarea name="comment" class="form-control" rows="3" placeholder="Enter your comment" required></textarea>
    </div>

    <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">

    <button type="submit" class="btn btn-primary">Speichern</button>
</form>

<h3>Comments</h3>

@forelse($website->comments as $comment)
<div class="card mb-3">
    <div class="card-body">
        <p class="card-text">{{ $comment->comment }}</p>
        <h6 class="card-subtitle mb-2 text-muted">Commenter: {{ $comment->user_name }} | Created at: {{ $comment->created_at }}</h6>
    </div>
</div>
@empty
<p>No comments available.</p>
@endforelse
@endsection
