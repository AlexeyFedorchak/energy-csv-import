@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
  <div id="wrapper_create_tarife" class="container">
    <h2>Neuen Tarif Hinzufügen</h2>
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <form method="POST" action="{{ route('admin.tarife.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="tarife">Tarif Name</label>
        <input type="text" class="form-control" id="tarife" name="tarife" value="{{ old('tarife') }}" required>
      </div>
      <div class="form-group">
        <label for="firma">Firma</label>
        <input type="text" class="form-control" id="firma" name="firma" value="{{ old('firma') }}" required>
      </div>
      <div class="form-group">
        <label for="preis">Preis</label>
        <input type="text" class="form-control" id="preis" name="preis" value="{{ old('preis') }}" required>
      </div>
      <div class="form-group">
        <label for="grundpreis">Grundpreis</label>
        <input type="text" class="form-control" id="grundpreis" name="grundpreis" value="{{ old('grundpreis') }}" required>
      </div>
      <div class="form-group">
        <label for="type">Typ</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required>
      </div>
      <div class="form-group">
        <label for="prov">Provision</label>
        <input type="text" class="form-control" id="prov" name="prov" value="{{ old('prov') }}" required>
      </div>
      <div class="form-group">
        <label for="prov">Energietyp</label>
        {{-- <input type="text" class="form-control" id="prov" name="prov" value="{{ old('prov') }}" required> --}}
        <select class="form-control" id="contract_type" name="contract_type">
          <option>-----Auswählen-----</option>
          <option value="strom">Strom</option>
          <option value="gas">Gas</option>
        </select>
      </div>
      <div class="form-group">
        <label for="lieferanten_id">Lieferanten</label>
        <select class="form-control" id="lieferanten_id" name="lieferanten_id">
          <option>-----lieferanten-----</option>
          @foreach($lieferantens as $lieferanten)
          <option value="{{$lieferanten->id}}">{{$lieferanten->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="contract_pdf">Vertrags PDF</label>
        <div class="d-flex gap-1">
          <div>
            <input type="file" class="form-control" id="contract_pdf" name="contract_pdf" required>
          </div>
          <button id="btn_delete_pdf_file" type="button" class="btn btn-danger d-none">Datei entfernen</button>
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-primary">Tarif Hinzufügen</button>
      </div>
    </form>
  </div>
  <script type="text/javascript">
    function addCommas(number)
    {
       let num=number.value;
       let result= num.replace(/\D/g, "").replace(/\B(?=(\d{2})+(?!\d)\.?)/g, ",");
       $('.commavalue').val(result);
    }
  </script>
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="{{ asset(mix('assets/js/pages/admin/tarife.js')) }}"></script>
@endsection
