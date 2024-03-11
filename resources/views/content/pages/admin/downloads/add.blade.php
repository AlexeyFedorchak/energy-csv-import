@extends('layouts.layoutMaster')

@section('content')
<div class="container">
    <h1>Download Hinzufügen</h1>
    <form method="POST" action="{{ route('admin.downloads.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="heading">Überschrift:</label>
            <input type="text" id="heading" name="heading" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="explanation">Grund:</label>
            <textarea id="explanation" name="explanation" class="form-control" required></textarea>
        </div>
        <div class="form-group">
        <label for="files">Files:</label>
        <input type="file" id="files" name="files[]" class="form-control-file" multiple required>
    </div>
        <button type="submit" class="btn btn-primary">Hinzufügen</button>
    </form>
</div>
@endsection
