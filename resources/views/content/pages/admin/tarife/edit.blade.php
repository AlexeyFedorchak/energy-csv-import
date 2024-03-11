@extends('layouts.layoutMaster')

@section('title', 'Edit Team Member')

@section('content')
  <div id="wrapper_update_tarife">
    <h5 class="card-title">Tarif Bearbeiten</h5>
    <form method="POST" action="{{ route('admin.tarife.update', $tarifeData->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="tarife">Tarif Name</label>
        <input type="text" class="form-control" id="tarife" name="tarife" value="{{ old('tarife', $tarifeData->tarife)}}" required>
      </div>
      <div class="form-group">
        <label for="firma">Firma</label>
        <input type="text" class="form-control" id="firma" name="firma" value="{{ old('firma', $tarifeData->firma)}}" required>
      </div>

      <?php
$nombre_format_francais = number_format($tarifeData->preis,2,',');


$pattern = "/\B(?=(\d{2})+(?!\d))/";
$replace = ",";
$preis = preg_replace($pattern, $replace, $tarifeData->preis);
$grundpreis = preg_replace($pattern, $replace, $tarifeData->grundpreis);
//$prov = preg_replace($pattern, $replace, $tarifeData->prov);
$prov = $tarifeData->prov;


      ?>
      <div class="form-group">
        <label for="preis">Preis</label>
        <input type="text" class="form-control" id="preis" name="preis" value="{{ old('preis', $preis)}}" required>
      </div>
      <div class="form-group">
        <label for="grundpreis">Grundpreis</label>
        <input type="text" class="form-control" id="grundpreis" name="grundpreis" value="{{ old('grundpreis', $grundpreis)}}" required>
      </div>
      <div class="form-group">
        <label for="type">Typ</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $tarifeData->type)}}" required>
      </div>
      <div class="form-group">
        <label for="prov">Provision</label>
        <input type="text" class="form-control" id="prov" name="prov" value="{{ old('prov', $prov)}}" required>
      </div>

      <div class="form-group">
        <label for="prov">Energietyp</label>
        {{-- <input type="text" class="form-control" id="prov" name="prov" value="{{ old('prov') }}" required> --}}
        <select class="form-control" value="{{ old('prov', $tarifeData->contract_type)}}" id="contract_type" name="contract_type">

          @if ($tarifeData->contract_type == 'strom')
            <option value="strom" selected >Strom</option>
            <option value="gas">Gas</option>
          @elseif ($tarifeData->contract_type == 'gas')
            <option value="gas" selected >Gas</option>
            <option value="strom">Strom</option>
          @endif
        </select>

        </select>
      </div>
    <div class="form-group">
        <label for="lieferanten_id">Lieferanten</label>
        <select class="form-control" id="lieferanten_id" name="lieferanten_id">
          <option>-----lieferanten-----</option>
          @foreach($lieferantens as $lieferanten)
          <option value="{{$lieferanten->id}}" @if($lieferanten->id==$tarifeData->lieferanten_id) selected @endif>{{$lieferanten->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="contract_pdf">Vertrags PDF</label>
        <div class="d-flex gap-1">
          <div>
            <input type="file" class="form-control" id="contract_pdf" name="contract_pdf">
          </div>
          <button id="btn_delete_pdf_file" type="button" class="btn btn-danger d-none">Datei entfernen</button>
        </div>
        @if($tarifeData->pdf_path && Storage::disk('public')->exists($tarifeData->pdf_path))
          <p>Derzeitiges PDF: <a href="{{ Storage::disk('public')->url($tarifeData->pdf_path) }}" target="_blank">PDF anschauen</a></p>
        @endif
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-primary">Änderung speichern</button>
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
  <script src="//cryphost.de/assets/js/pages/admin/tarife.js"></script>
@endsection
