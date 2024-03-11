@extends('layouts.layoutMaster')
@section('title', 'Add Member')
@section('content')
  <div id="wrapper_vertraege_add">
    <p><h5 class="card-title">Neuen Vertrag erstellen</h5></p>
    <form method="POST" action="{{ route('vertraege.store') }}">
      @csrf
      <input type="hidden" name="tarife_id" value="{{ @$data->id }}" />
      <div class="row">
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="kundentyp">Kundentyp:</label>
                  <select name="kundentyp" class="form-control" id="kundentyp">
                    <option value="0">Firmenkunde bis 100.000 kWh</option>
                    <option value="1">Firmenkunde ber 100.000 kWh</option>
                    <option value="2">Landwirtschaftlicher Betrieb</option>
                    <option value="3">Privatkunde</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Vertragstyp:</label>
                  <div class="form-check">
                    {{-- <input type="radio" name="option" value="{{ $option->id }}" > --}}
                    <input type="radio" name="vertragstyp" value="1" {{ $data->contract_type === 'strom' ? 'checked' : '' }} class="form-check-input"> Strom
                  </div>
                  <div class="form-check">
                    <input type="radio" name="vertragstyp" value="2" {{ $data->contract_type === 'gas' ? 'checked' : '' }} class="form-check-input"> Gas
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Energieanbieter:</label>
                  <div class="form-check">
                    <input type="radio" name="energieanbieter" value="{{ $data->contract_type === 'strom' ? 0 : 1 }}" checked class="form-check-input"> {{$data->firma}}
                  </div>
                  <div class="form-check">
                    {{-- <input type="radio" name="energieanbieter" value="1" class="form-check-input"> Terawatt --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Tariftyp:</label>
                  <div class="form-check">
                    <input type="radio" name="contract_type" value="0" {{ $data->type === 'Flex' ? 'checked' : '' }} class="form-check-input"> Spot
                  </div>
                  <div class="form-check">
                    <input type="radio" name="contract_type" value="0" {{ $data->type === 'Fix' ? 'checked' : '' }} class="form-check-input"> Fixed
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Typ:</label>
                  <div class="form-check">

                    <input type="radio" name="anmeldetyp" value="0" class="form-check-input" checked> Neuanmeldung
                  </div>
                  <div class="form-check">
                    <input type="radio" name="anmeldetyp" value="1" class="form-check-input"> Wechsel
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php
$userid='';
        if(isset($_GET['user'])&& $_GET['user'])
{
  $userid= $_GET['user'];
  // echo $userid;
}
?>

        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group" id="nameField">
                  <label for="name">Name:</label>
                  <!--
                         <input type="text" name="name" id="name" class="form-control"> -->
                  <div class="row">
                    <div class="col-11">
                      <select name="name" id="userDropdown" class="form-control">
                        <option></option>
                        @foreach($getData as $val)
                          <option value="{{$val['id']}}" <?php if($userid==$val['id']){echo "selected";} ?>  >{{$val['name']}} {{$val['nachname']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-1">
                      <a href="{{ route('kunden.create') }}" target="_blank">
                        <input type="button" class="btn btn-primary" value="Add">
                      </a>
                    </div>
                  </div>

                  <div class="form-row" id="userData" style="display: none">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="strasse">Strasse:</label>
                        <input type="text" name="strasse" id="customerStreet" disabled class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="hausnummer">Hausnummer:</label>
                        <input type="text" name="hausnummer" id="customerHN" disabled class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="stiege">Stiege:</label>
                        <input type="text" name="stiege" id="customerStairs" disabled class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="tuer">Tür:</label>
                        <input type="text" name="tuer" id="customerDoor" disabled class="form-control inline-input">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="plz">PLZ:</label>
                        <input type="text" name="plz" id="customerPostcode" disabled class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="ort">Ort:</label>
                        <input type="text" name="ort" id="customerLocation" disabled class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="telefon">Telefonnummer:</label>
                        <input type="text" name="telefon" id="customerTelephone" disabled class="form-control">
                      </div>
                    </div>
                    <!-- diff -->
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="strasse">Abweichende Strasse:</label>
                        <input type="text" name="diff_street" id="diff_street"  class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="hausnummer">Abweichende Hausnummer:</label>
                        <input type="text" name="diff_house_number" id="diff_house_number"  class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="stiege">Abweichende Stiege:</label>
                        <input type="text" name="diff_stairs" id="diff_stairs"  class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="tuer">Abweichende Tür:</label>
                        <input type="text" name="diff_door" id="diff_door"  class="form-control inline-input">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="plz">Abweichende PLZ:</label>
                        <input type="text" name="diff_postcode" id="diff_postcode"   class="form-control inline-input">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="ort"> Abweichende Ort:</label>
                        <input type="text" name="diff_location" id="diff_location"   class="form-control inline-input">
                      </div>
                      <!-- <div class="form-group col-md-4">
                        <label for="telefon">Abweichende Telefonnummer:</label>
                        <input type="text" name="telefon" id="customerTelephone"  class="form-control">
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Diff -->



        <!-- end diff -->

        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="firmenbuchnummer">Firmenname:</label>
                    <input type="text" name="firmenname" id="firmenname" class="form-control" oninput="validateUnterzeichner()">
                    <small id="firmenname-error" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="uid">Netzbetreibernummer:</label>
                    <input type="text" name="netzbetreibernummer" id="netzbetreibernummer" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="lfbis">Kontaktart:</label>
                    <div class="form-check">

                      <input type="radio" name="kontaktart" value="0" class="form-check-input" checked> Mail
                    </div>
                    <div class="form-check">
                      <input type="radio" name="kontaktart" value="1" class="form-check-input"> Post
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="branche">Zahlungsart:</label>
                    <div class="form-check">

                      <input type="radio" name="zahlungsart" value="0" class="form-check-input" checked> Zahlschein
                    </div>
                    <div class="form-check">
                      <input type="radio" name="zahlungsart" value="1" class="form-check-input"> Lastschrift
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="firmenbuchnummer">Firmenbuchnummer:</label>
                    <input type="text" name="firmenbuchnummer" id="firmenbuchnummer" class="form-control" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="uid">UID Nummer:</label>
                    <input type="text" name="uid" id="uid" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="lfbis">LFBIS Nummer:</label>
                    <input type="text" name="lfbis" id="lfbis" class="form-control" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="branche">Branche:</label>
                    <input type="text" name="branche" id="branche" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="unterzeichner">Unterzeichnet von:</label>
                  <input type="text" name="unterzeichner" id="unterzeichner" class="form-control"
                         oninput="validateUnterzeichner()" required>
                  <small id="unterzeichner-error" class="form-text text-danger"></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="betreuer">Betreuernummer:</label>
                  <input type="text" name="betreuer" id="betreuer" class="form-control" oninput="validateBetreuer()" required>
                  <small id="betreuer-error" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="betreuer">Ihr Betreuer:</label>
                  <input type="text" value="kommt noch" disabled class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="handlingfee">Handling Fee:</label>
                  <input type="number" name="handlingfee" id="handlingfee" class="form-control" step="0.01" min="2.5"
                         max="6.0" oninput="validateHandlingFee()" required>
                  <small id="handlingfee-error" class="form-text text-danger"></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="kundenkennwort">Kundenkennwort:</label>
                    <input type="number" name="kundenkennwort" id="kundenkennwort" class="form-control"
                           oninput="validateKundenkennwort()" required>
                    <small id="kundenkennwort-error" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="mail">E-Mail:</label>
                    <input type="email" name="mail" id="mail" class="form-control" oninput="validateEmail()" required>
                    <small id="mail-error" class="form-text text-danger"></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="bank">Bank:</label>
                    <input type="text" name="bank" id="bank" class="form-control" oninput="validateBank()" required>
                    <small id="bank-error" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="iban">IBAN:</label>
                    <input type="text" name="iban" id="iban" class="form-control" oninput="validateIBAN()" required>
                    <small id="iban-error" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="bic">BIC:</label>
                    <input type="text" name="bic" id="bic" class="form-control" oninput="validateBIC()" required>
                    <small id="bic-error" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="kontoinhaber">Kontoinhaber:</label>
                    <input type="text" name="kontoinhaber" id="kontoinhaber" class="form-control"
                           oninput="validateKontoinhaber()" required>
                    <small id="kontoinhaber-error" class="form-text text-danger"></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="jvb">Jahresverbrauch:</label>
                  <input type="text" name="jvb" id="jvb" class="form-control" oninput="validateJVB()" required>
                  <small id="jvb-error" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="nb">Netzbetreiber:</label>
                  <input type="text" name="nb" id="nb" class="form-control" oninput="validateNB()" required>
                  <small id="nb-error" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="aktuellerlieferant">Aktueller Lieferant:</label>
                  <input type="text" name="aktuellerlieferant" id="aktuellerlieferant" class="form-control"
                         oninput="validateAktuellerLieferant()" required>
                  <small id="aktuellerlieferant-error" class="form-text text-danger"></small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div id="dynamic_field">
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="zpn">Zählpunktnummer:</label>
                      <input type="text" name="zpn[]" id="zpn" class="form-control" oninput="validateZPN()" required>
                      <small id="zpn-error" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="anummer">Anlagennummer:</label>
                      <input type="text" name="anummer[]" id="anummer" class="form-control" oninput="validateANummer()" required>
                      <small id="anummer-error" class="form-text text-danger"></small>
                    </div>
                    <div class="col-md-2 mt-3">
                      <button type="button" name="add" id="add" class=" form-group btn btn-success">Add More</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="vertragsdauer">Vertragsdauer:</label>
                    <input type="date" name="vertragsdauer" id="vertragsdauer" class="form-control"
                           oninput="validateVertragsdauer()" required>
                    <small id="vertragsdauer-error" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="partner">Partner:</label>
                    <select name="partnerid" class="form-control">
                      <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                      @foreach($team as $teamuser)
                        <option value="{{$teamuser['id']}}">{{$teamuser['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="">
              <button type="submit" class="btn btn-primary">Vertrag Erstellen</button>
            </div>
          </div>
        </div>
    </form>
  </div>
  <script>
    function validateiFrmenname() {
      var input = document.getElementById('firmenname');
      var errorText = document.getElementById('firmenname-error');
      if (input.value.trim() === '') {
        errorText.innerHTML = 'Dieses Feld kann nicht leer gelassen werden';
      } else {
        errorText.innerHTML = '';
      }
    }


    function validateUnterzeichner() {
      var input = document.getElementById('unterzeichner');
      var errorText = document.getElementById('unterzeichner-error');
      if (input.value.trim() === '') {
        errorText.innerHTML = 'Dieses Feld kann nicht leer gelassen werden';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateBetreuer() {
      var input = document.getElementById('betreuer');
      var errorText = document.getElementById('betreuer-error');
      if (isNaN(input.value) || input.value.trim() === '') {
        errorText.innerHTML = 'Dieses Feld muss eine Nummer sein';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateHandlingFee() {
      var input = document.getElementById('handlingfee');
      var errorText = document.getElementById('handlingfee-error');
      var value = parseFloat(input.value);
      if (isNaN(value) || value < 2.5 || value > 6.0) {
        errorText.innerHTML = 'Der Wert muss zwischen 2,5 und 6 liegen';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateKundenkennwort() {
      var input = document.getElementById('kundenkennwort');
      var errorText = document.getElementById('kundenkennwort-error');
      if (isNaN(input.value) || input.value.trim() === '') {
        errorText.innerHTML = 'Dieses Feld muss eine Nummer sein';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateEmail() {
      var input = document.getElementById('mail');
      var errorText = document.getElementById('mail-error');
      var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!regex.test(input.value)) {
        errorText.innerHTML = 'Bitte geben Sie eine gültige E-Mail-Adresse ein';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateRequiredField(fieldId, errorId) {
      var input = document.getElementById(fieldId);
      var errorText = document.getElementById(errorId);
      if (input.value.trim() === '') {
        errorText.innerHTML = 'Dieses Feld kann nicht leer gelassen werden';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateIBAN() {
      var input = document.getElementById('iban');
      var errorText = document.getElementById('iban-error');
      // Simple IBAN regex - consider a more complex one for actual use
      var regex = /^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/;
      if (!regex.test(input.value)) {
        errorText.innerHTML = 'Bitte geben Sie eine gültige IBAN ein';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateBIC() {
      var input = document.getElementById('bic');
      var errorText = document.getElementById('bic-error');
      // Simple BIC regex - consider a more complex one for actual use
      var regex = /^[A-Z]{6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3})?$/;
      if (!regex.test(input.value)) {
        errorText.innerHTML = 'Bitte geben Sie eine gültige BIC ein';
      } else {
        errorText.innerHTML = '';
      }
    }

    function validateNumberField(fieldId, errorId) {
      var input = document.getElementById(fieldId);
      var errorText = document.getElementById(errorId);
      if (isNaN(input.value) || input.value.trim() === '') {
        errorText.innerHTML = 'Dieses Feld muss eine Nummer sein';
      } else {
        errorText.innerHTML = '';
      }
    }

    // Call validateRequiredField for fields that just need to check if they are not empty
    // Example: validateRequiredField('bank', 'bank-error');

    // Call validateNumberField for fields that need to be validated as numbers
    // Example: validateNumberField('jvb', 'jvb-error');

  </script>
  <script>
    document.addEventListener("visibilitychange", function() {
        if (document.visibilityState === 'visible') {
            // Page is visible, trigger a reload
            location.reload();
        }
    });

</script>

<script>
VertraegeAdd1()

function VertraegeAdd1() {
      let i = 1;
      
       let selectedUserId={{$userid}};
        $('#userData').show();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        // Make an AJAX request to fetch user data
        $.ajax({
          url: '/get-user-data', // Replace this URL with the actual route to fetch user data
          method: 'post',
          data: {
            userId: selectedUserId,
          },
          success: function (data) {
            // Populate the user data in the userDataContainer
            console.log('success');
            $('#customerStreet').val(data.street);
            $('#customerHN').val(data.house_number);
            $('#customerTelephone').val(data.tel_number);
            $('#customerStairs').val(data.stairs);
            $('#customerDoor').val(data.door);
            $('#customerLocation').val(data.location);
            $('#customerEmail').val(data.email);
            $('#customerPostcode').val(data.postcode);
            $('#diff_street').val(data.diff_street);
            $('#diff_house_number').val(data.diff_house_number);
            $('#diff_stairs').val(data.diff_stairs);
            $('#diff_door').val(data.diff_door);
            $('#diff_location').val(data.diff_location);
            $('#diff_postcode').val(data.diff_postcode);
          },
          error: function (xhr, status, error) {
            console.log(error);
          }
        });
}

  </script>


@endsection
@section('page-style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{ asset(mix('assets/js/pages/vertraege.js')) }}"></script>
@endsection
