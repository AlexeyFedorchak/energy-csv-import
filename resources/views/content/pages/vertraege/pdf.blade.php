@extends('layouts.layoutMaster')
@section('title', 'PDF Signature')
@section('content')
  <div id="wrapper_pdf_render">
    <form method="post" action="{{ route('vertraege.send-signed-link') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="vertraege_id" value="{{ $vertraege->id }}" />
      <input type="hidden" name="mode" value="1" />
      <div class="row">
        <button class="btn btn-success">Signaturlink senden </button>
      </div>
      <input type="file" name="vertraege_unsigned_pdf"  />
    </form>
    <div class="frame">
      <iframe id="pdf" style="width: 100%;"></iframe>
    </div>
  </div>
@endsection
@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('assets/css/pages/vertraege/pdf_render.css')) }}">
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="https://unpkg.com/downloadjs@1.4.7"></script>
  
  <script>
    var tarife = {{ Illuminate\Support\Js::from($tarife) }};
    var kunden = {{ Illuminate\Support\Js::from($kunden) }};
    var vertraege = {{ Illuminate\Support\Js::from($vertraege) }};
    var pdfUrl = '{{ Storage::disk('public')->url(@$tarife->pdf_path) }}';
  </script>
  <script src="{{ asset(mix('assets/js/pages/vertraege.js')) }}"></script>
@endsection
