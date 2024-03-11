@extends('layouts.layoutMaster')

@section('title', 'Group')

@section('content')
<h5 class="card-title">Group Edit</h5>

<form method="POST" action="{{ url('groups/edit/'.$row->id) }}">
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

    <div class="mb-3">
        <label for="teams" class="form-label">Teams</label>
      
        @foreach($teams as $team)
      	@php
			$team_checked = Helper::groupchecked($row->id,$team->id);
		@endphp
            <div class="d-block"><label><input type="checkbox" name="teams[]" value="{{$team->id}}" @if($team_checked) checked @endif>{{$team->name}}</label></div>
        @endforeach
      
    </div> 
    <div class="mb-3">
        <label for="tariffs" class="form-label">Tariffs</label>
      
        @foreach($tariffs as $tariff)
      	@php
			$tariff_checked = Helper::grouptariffchecked($row->id,$tariff->id);
		@endphp
            <div class="d-block"><label><input type="checkbox" name="tariffs[]" value="{{$tariff->id}}" @if($tariff_checked) checked @endif>{{$tariff->tarife}}</label></div>
        @endforeach
      
    </div> 

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
</form>

@endsection
