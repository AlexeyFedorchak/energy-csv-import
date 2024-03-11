@extends('layouts.layoutMaster')

@section('title', 'Group')

@section('content')
<h5 class="card-title">Group Add</h5>

<form method="POST" action="{{ route('groups.store') }}">
    @csrf

   

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      @error('name')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
         </span>
      @enderror
    </div>

    <div class="mb-3">
        <label for="teams" class="form-label">Teams</label>
      
        @foreach($teams as $team)
        <div class="d-block"><label><input type="checkbox" name="teams[]" value="{{$team->id}}">{{$team->name}}</label></div>
        @endforeach
      
    </div> 
    <div class="mb-3">
        <label for="tariffs" class="form-label">Tariffs</label>
      
        @foreach($tariffs as $tariff)
        <div class="d-block"><label><input type="checkbox" name="tariffs[]" value="{{$tariff->id}}">{{$tariff->tarife}}</label></div>
        @endforeach
      
    </div> 

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
</form>

@endsection
