@extends('layouts.layoutMaster')

@section('title', 'vermittlernummern')

@section('content')
<h5 class="card-title">vermittlernummern Add</h5>

<form method="POST" action="{{ route('admin.vermittlernummer.store') }}">
    @csrf

   

    <div class="mb-3">
        <label for="vermittlernummer" class="form-label">vermittlernummern</label>
        <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer" required>
      @error('name')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
         </span>
      @enderror
    </div>

    <div class="mb-3">
        <label for="teams" class="form-label">User</label>
      <select class="form-control" name="user_id">
            
            <option>Select User </option>
        
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
       
      
    </div> 
    <div class="mb-3">
        <label for="tariffs" class="form-label">lieferanten</label>
      <select class="form-control" name="lieferanten_id">
            
            <option>Select lieferanten </option>
        
        @foreach($lieferantens as $lieferanten)
            <option value="{{$lieferanten->id}}">{{$lieferanten->name}}</option>
        @endforeach
        </select>
      
    </div> 
    

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
</form>

@endsection
