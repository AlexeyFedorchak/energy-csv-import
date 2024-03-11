@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Add a New</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.contract.store') }}">
        @csrf
        <div class="form-group">
            <label for="tarife">Aktu<wbr>eller Strom<wbr>ver<wbr>brauch:</label>
            <input type="number" class="form-control" id="stromverbrauch" name="stromverbrauch" value="{{ old('stromverbrauch') }}" required>
        </div>
        <div class="form-group">
            <label for="firma">Aktueller Strom<wbr>preis:</label>
            <input type="number" class="form-control" id="old_stromkosten" name="old_stromkosten" value="{{ old('old_stromkosten') }}" required>
        </div>
          <div class="form-group">
            <label for="preis">Grund<wbr>preis:</label>
            <input type="number" class="form-control" id="old_grundpreis" name="old_grundpreis" value="{{ old('old_grundpreis') }}" required>
        </div>
          <div class="form-group">
            <label for="grundpreis">Anzahl Zähl<wbr>punkte:</label>
            <input type="number" class="form-control" id="ZPNum" name="ZPNum" value="{{ old('ZPNum') }}" required>
        </div>
          <div class="form-group">
            <label for="type">type</label>
            {{-- <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required> --}}
            <select class="form-control" id="type" name="type">
              <option >-----Select One-----</option>
              <option value="strom">Strom</option>
              <option value="gas">Gas</option>
              
            </select>
         
        <div class="mt-4">
        <button type="submit" class="btn btn-primary">Add Contract</button>
       </div>
    </form>
</div>
@endsection