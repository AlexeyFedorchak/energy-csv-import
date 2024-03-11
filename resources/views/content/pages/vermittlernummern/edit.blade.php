@extends('layouts.layoutMaster')

@section('title', 'vermittlernummern')

@section('content')
<h5 class="card-title">vermittlernummern Edit</h5>

<form method="POST" action="{{ url('admin/vermittlernummer/'.$row->id) }}">
  <input type="hidden" name="_method" value="PUT">
    @csrf

   

    <div class="mb-3">
        <label for="vermittlernummer" class="form-label">vermittlernummer</label>
        <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer" value="{{$row->vermittlernummer}}" required>
      @error('vermittlernummer')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
         </span>
      @enderror
    </div>

     <div class="mb-3">
        <label for="teams" class="form-label">User</label>
      <select class="form-control" name="user_id" required>
            
            <option value="">Select User </option>
        
        @foreach($users as $user)
            <option value="{{$user->id}}" @if($user->id==$row->user_id) selected @endif>{{$user->name}}</option>
        @endforeach
        </select>
       
      
    </div> 
    <div class="mb-3">
        <label for="tariffs" class="form-label">lieferanten</label>
      <select class="form-control" name="lieferanten_id" required>
            
            <option value="">Select lieferanten </option>
        
        @foreach($lieferantens as $lieferanten)
            <option value="{{$lieferanten->id}}" @if($lieferanten->id==$row->lieferanten_id) selected @endif>{{$lieferanten->name}}</option>
        @endforeach
        </select>
      
    </div> 

    <button type="submit" class="btn btn-primary">Hinzufügen</button>
</form>

@endsection
