@extends('layouts.layoutMaster')
@section('title', 'Admin Dashboard')
@section('content')
<?php
$jsencodefield=json_encode($fields);
?>
  <div id="wrapper_validate_pdf">
    <h5 class="card-title">PDF Felder validieren</h5>
    <input type="hidden" id="hid_fields" value="{{ @$jsencodefield }}">
    <form action={{ route('admin.tarife.validate-pdf') }} method="post" enctype="application/x-www-form-urlencoded" onsubmit="validatePdfFields()">
      @csrf
      <input type="hidden" id="pdf_url" name="pdf_url" value={{ Storage::disk('public')->url($path) }} />
      <input type="hidden" id="tarife_id" name="tarife_id" value={{ $tarifeId }}>
      <table class="table table-bordered table-hover mt-3" id="tbl_pdf_fields">
        <thead>
        <tr>
          <th class="d-flex align-items-center gap-2"><input type="checkbox" id="chk_all" /><div class="th-inner">Alle</div></th>
          <th><div class="th-inner">Typ</div></th>
          <th><div class="th-inner">Name</div></th>
          <th><div class="th-inner">Feld</div></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <div>
        <button class="btn btn-success">Speichern</button>
      </div>
    </form>
  </div>
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{ asset(mix('assets/vendor/libs/bootstrap-table/bootstrap-table.js')) }}"></script>
  <script src="https://panel.energy-group.at/assets/js/pages/admin/tarife.js"></script>
  
@endsection
@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/bootstrap-table/bootstrap-table.css')) }}" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
@endsection
