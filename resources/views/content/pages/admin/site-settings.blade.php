@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')


@section('content')
    <div class="container">
        <h1>Site Settings</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.site-settings.update') }}">
            @csrf
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" name="site_name" class="form-control" value="{{ $siteSettings->site_name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Site Name</button>
        </form>
    </div>
@endsection
