@extends('layouts.layoutMaster')

@section('title', 'Kundendaten bearbeiten')

@section('content')
    <h5 class="card-title">Kundendaten bearbeiten</h5>

    <form method="POST" action="{{ route('kunden.update', ['user' => $editData->id]) }}">
        @csrf
        @method('PUT')

     
        {{-- <div class="mb-3">
        <label for="username" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name"  value="{{ old('name', $editData->name)}}" required>
    </div> --}}

    <div class="mb-3">
        <label for="username" class="form-label">Vorname</label>
        <input type="text" class="form-control" id="name" name="name"  value="{{ old('name', $editData->name)}}" required>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Nachname</label>
        <input type="text" class="form-control" id="nachname" name="nachname"  value="{{ old('nachname', $editData->nachname)}}" required>
    </div>

    <div class="mb-3">
        <label for="anrede" class="form-label">Anrede</label><br>
        <input type="radio"  id="male" name="anrede" value="male" @if($editData->anrede === 'male') checked @endif>
        <label for="male">M�nnlich</label>
        <input type="radio" id="female" name="anrede" value="female" @if($editData->anrede === 'female') checked @endif>
        <label for="female">Weiblich</label>
        {{-- <input type="text" class="form-control" id="anrede" name="anrede"  value="{{ old('anrede', $editData->anrede)}}" required> --}}
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title"  value="{{ old('title', $editData->title)}}" required>
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">geburtstdatum (birthday)</label>
        <input type="text" class="form-control" id="datepicker"  name="dob"  value="{{ old('dob', $editData->dob)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $editData->email)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Street</label>
        <input type="text" class="form-control" id="email" name="street" value="{{ old('street', $editData->street)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">House number</label>
        <input type="text" class="form-control" id="email" name="house_number" value="{{ old('house_number', $editData->house_number)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Stairs</label>
        <input type="text" class="form-control" id="email" name="stairs" value="{{ old('stairs', $editData->stairs)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Door</label>
        <input type="text" class="form-control" id="email" name="door" value="{{ old('door', $editData->door)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Location</label>
        <input type="text" class="form-control" id="email" name="location" value="{{ old('location', $editData->location)}}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Telephone number</label>
        <input type="text" class="form-control" id="email" name="tel_number" value="{{ old('tel_number', $editData->tel_number)}}" required>
    </div>

       

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
