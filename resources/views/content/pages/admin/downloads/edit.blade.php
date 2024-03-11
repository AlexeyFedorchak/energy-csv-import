@extends('layouts.layoutMaster')

@section('title', 'Edit Download')

@section('content')
<div class="container">
    <h1>Download Bearbeiten</h1>
    <form action="{{ route('admin.downloads.update', ['id' => $download->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="heading">Überschrift</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{ $download->heading }}" required>
        </div>
        <div class="form-group">
            <label for="explanation">Grund</label>
            <textarea class="form-control" id="explanation" name="explanation" rows="4" required>{{ $download->explanation }}</textarea>
        </div>
        <!-- Add fields for file uploads if needed -->
        <!-- Example: <input type="file" name="files[]" multiple> -->
        <button type="submit" class="btn btn-primary">Änderung speichern</button>
    </form>
</div>
@endsection
