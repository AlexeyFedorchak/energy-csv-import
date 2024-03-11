@extends('layouts.layoutMaster')

@section('title', 'Edit Team Member')

@section('content')
    <h5 class="card-title">Bearbeiten</h5>

    <form method="POST" action="{{ route('admin.contract.update', $tarifeData->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tarife">Aktu<wbr>eller Strom<wbr>ver<wbr>brauch:</label>
            <input type="number" class="form-control" id="stromverbrauch" name="stromverbrauch" value="{{ old('stromverbrauch', $tarifeData->stromverbrauch)}}" required>
        </div>
        <div class="form-group">
            <label for="firma">Aktueller Strom<wbr>preis:</label>
            <input type="number" class="form-control" id="old_stromkosten" name="old_stromkosten" value="{{ old('old_stromkosten', $tarifeData->old_stromkosten)}}" required>
        </div>
          <div class="form-group">
            
            <label for="preis">Grund<wbr>preis:</label>
            <input type="number" class="form-control" id="old_grundpreis" name="old_grundpreis" value="{{ old('old_grundpreis', $tarifeData->old_grundpreis)}}" required>
        </div>
          
          <div class="form-group">
            
            <label for="grundpreis">Anzahl Zähl<wbr>punkte:</label>
            <input type="number" class="form-control" id="ZPNum" name="ZPNum" value="{{ old('ZPNum', $tarifeData->ZPNum)}}" required>
        </div>
          <div class="form-group">
          <label for="grundpreis">Typ</label>
          <select class="form-control" value="{{ old('type', $tarifeData->type)}}" id="type" name="type">
            
            @if ($tarifeData->type == 'strom')
            <option value="strom" selected >Strom</option>
            <option value="gas">Gas</option>
            @elseif ($tarifeData->type == 'gas')
            <option value="gas" selected >Gas</option>
            <option value="strom">Strom</option>
            @endif
          </select>
        </div>
         
        <div class="mt-4">
        <button type="submit" class="btn btn-primary">Änderung Speichern</button>
       </div>
    </form>
@endsection
