@extends('layouts.layoutMaster')

@section('title', 'Downloads')

@section('content')
<div class="container">
    <h1>Downloads</h1>
    <div class="row">
        @foreach($downloads as $download)
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="card-title">{{ $download->heading }}</h2>
                                <p class="card-text">{{ $download->explanation }}</p>
                            </div>
                        </div>
                        <ul class="list-group">
                            @foreach($download->file_paths as $filePath)
                                @php
                                    $originalFileName = pathinfo($filePath, PATHINFO_FILENAME);
                                    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                    $fullFilePath = storage_path('app/public/' . $filePath);
                                @endphp
                                <li class="list-group-item">
                                    <a href="{{ route('download', ['file' => $filePath]) }}" download="{{ $originalFileName }}.{{ $fileExtension }}">
                                        {{ $originalFileName }}.{{ $fileExtension }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
