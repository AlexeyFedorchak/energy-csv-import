@extends('layouts.layoutMaster')
@section('title', 'PDF Signature')
@section('content')
  <div id="wrapper_pdf_signature">
    <form method="post" action="{{ route('vertraege.send-signed-link') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="vertraege_id" value="{{ $vertraege->id }}" />
      <input type="hidden" name="mode" value="2" />
      <div class="row">
        <button class="btn btn-success">Signaturlink senden </button>
      </div>
      <input type="file" name="vertraege_unsigned_pdf"  />
    </form>
    <div class="frame">
      <iframe id="pdf" style="width: 100%;"></iframe>
    </div>
    <h4 class="mt-2">Unterschrift</h4>
    <div id="signature-pad" class="signature-pad mt-2">
      <canvas></canvas>
    </div>
    <form id="frm_save_pdf" method="post" action="{{ route('vertraege.save-signed-pdf') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="vertraege_id" value="{{ $vertraege->id }}" />
      <div class="actions">
        <div class="d-flex gap-2">
          <button id="btn_clear" type="button" class="btn btn-primary">Löschen</button>
          <button id="btn_undo" type="button" class="btn btn-primary">Zurück</button>
        </div>
        <div class="d-flex gap-2">
          <button id="btn_save_png" type="submit" class="btn btn-success">Speichern</button>
        </div>
      </div>
      <input type="file" name="vertraege_signed_pdf"  />
    </form>
  </div>
@endsection
@section('page-style')
  <link href="{{ asset(mix('assets/css/pages/vertraege/signature_pad.css')) }}" rel="stylesheet" />
@endsection
@section('page-script')
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="https://unpkg.com/downloadjs@1.4.7"></script>
  <script src="{{ asset(mix('assets/js/pages/vertraege.js')) }}"></script>
  <script>
    var vertraege = {{ Illuminate\Support\Js::from($vertraege) }};
    var pdfUrl = '{{ Storage::disk('public')->url($vertraege->unsigned_pdf_path) }}';
  </script>
@endsection
