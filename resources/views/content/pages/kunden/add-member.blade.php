@extends('layouts.layoutMaster')

@section('title', 'Neuen Kunden anlegen')

@section('content')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var radioPrivate = document.querySelector('input[name="type"][value="0"]');
    var radioBusiness = document.querySelector('input[name="type"][value="1"]');
    var privateFields = document.querySelectorAll('.private');
    var businessFields = document.querySelector('#firmenkundeFields');
    var birthdateField = document.querySelector('#datepicker'); // Select the birthdate field
    var birthdateLabel = document.querySelector('label[for="datepicker"]'); // Select the label for the birthdate field

    function toggleFields(isPrivate) {
        // Toggle visibility of private fields
        privateFields.forEach(function(field) {
            field.style.display = isPrivate ? 'block' : 'none';
        });
        // Toggle visibility of business fields
        businessFields.style.display = isPrivate ? 'none' : 'block';
        // Toggle requirement and label of the birthdate field
        birthdateField.required = isPrivate;
        birthdateLabel.innerHTML = isPrivate ? 'Geburtstdatum*' : 'Geburtstdatum';
    }

    // Event listeners for the radio buttons
    radioPrivate.addEventListener('change', function() {
        if(this.checked) toggleFields(true);
    });

    radioBusiness.addEventListener('change', function() {
        if(this.checked) toggleFields(false);
    });

    // Initialize with the correct fields shown and birthdate requirement based on the pre-selected radio button
    if(radioPrivate.checked) {
        toggleFields(true);
    } else if(radioBusiness.checked) {
        toggleFields(false);
    }
});

</script>


<h5 class="card-title">Neuen Kunden anlegen</h5>

<form method="POST" action="{{ route('kunden.store') }}">
    @csrf

    
  <div class="row">
    {{-- <div class="form-group col-md-12">
        <label for="username" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required> 
    </div> --}}

    <div class="card text-center"><div class="form-group col-md-12">
        <label for="type" class="form-label">Kundentyp*</label><br>
        <input type="radio"  id="type" name="type" value="0">
        <label for="privatkunde">Privatkunde</label>
        <input type="radio" id="type" name="type" value="1">
        <label for="firmenkunde">Firmenkunde</label>
    </div></div>

    <div id="firmenkundeFields" style="display: none;">
<div class="row">

    <div class="form-group col-md-4">
        <label for="company_name" class="form-label">Firmenname</label>
        <input type="text" class="form-control" id="company_name" name="company_name">
    </div>

    <div class="form-group col-md-4">
        <label for="corporate_form" class="form-label">Unternehmensform</label>
        <input type="text" class="form-control" id="corporate_form" name="corporate_form" required>
    </div>

    <div class="form-group col-md-4">
        <label for="industry" class="form-label">Branche</label>
        <input type="text" class="form-control" id="industry" name="industry" required>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="uid" class="form-label">UID</label>
        <input type="text" class="form-control" id="uid" name="uid" required>
    </div>



    <div class="form-group col-md-4">
        <label for="door" class="form-label">Firmenbuchnummer</label>
        <input type="text" class="form-control" id="door" name="door">
    </div>

    <div class="form-group col-md-4">
        <label for="location" class="form-label">Vereinsnummer/LFBIS Nummer</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>
</div>
</div>

    <div class="form-group col-md-3">
        <label for="username" class="form-label">vorname*</label>
        <input type="text" class="form-control" id="vorname" name="vorname" required>
    </div>

    <div class="form-group col-md-3">
        <label for="username" class="form-label">nachname*</label>
        <input type="text" class="form-control" id="nachname" name="nachname" required>
    </div>

    <div class="form-group col-md-3">
        <label for="anrede" class="form-label">Anrede*</label><br>
        <input type="radio"  id="male" name="anrede" value="male">
        <label for="male">Männlich</label>
        <input type="radio" id="female" name="anrede" value="female">
        <label for="female">Weiblich</label>
    </div>
 </div>
 
 <div class="row">
    <div class="form-group col-md-6">
        
    <label for="datepicker" class="form-label">Geburtstdatum</label>
<input type="text" id="datepicker" class="form-control" name="dob">

    </div>
    <div class="form-group col-md-6">
        <label for="tel_number" class="form-label">Titel</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="email" class="form-label">E-mail*</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group col-md-6">
        <label for="tel_number" class="form-label">Telefonnummer*</label>
        <input type="text" class="form-control" id="tel_number" name="tel_number" required>
    </div>

</div>

<div class="row">
    <div class="form-group col-md-4">
        <label for="street" class="form-label">Strasse*</label>
        <input type="Text" class="form-control" id="street" name="street" required>
    </div>

    <div class="form-group col-md-4">
        <label for="house_number" class="form-label">Hausnummer*</label>
        <input type="Text" class="form-control" id="house_number" name="house_number" required>
    </div>

    <div class="form-group col-md-4">
        <label for="stairs" class="form-label">Stiege</label>
        <input type="text" class="form-control" id="stairs" name="stairs">
    </div>
</div>
<div class="row">

    <div class="form-group col-md-4">
        <label for="door" class="form-label">Türnummer</label>
        <input type="text" class="form-control" id="door" name="door">
    </div>

    <div class="form-group col-md-4">
        <label for="location" class="form-label">Ort*</label>
        <input type="text" class="form-control" id="location" name="location" required>
    </div>

    <div class="form-group col-md-4">
        <label for="postcode" class="form-label">Postleitzahl*</label>
        <input type="text" class="form-control" id="postcode" name="postcode" required>
    </div>
</div>



    

   
<div class="form-group col-md-12 mt-2">
    <button type="submit" class="btn btn-primary" style="float: inline-end";>Kunden anlegen</button>
</div>
</form>
@endsection
