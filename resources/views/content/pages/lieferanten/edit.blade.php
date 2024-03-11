@extends('layouts.layoutMaster')

@section('title', 'lieferanten')

@section('content')
<h5 class="card-title">lieferanten Edit</h5>

<form method="POST" action="{{ url('admin/lieferanten/'.$row->id) }}">
  <input type="hidden" name="_method" value="PUT">
    @csrf

   

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$row->name}}" required>
      @error('name')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
         </span>
      @enderror
    </div>

    

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
</form>

@endsection
