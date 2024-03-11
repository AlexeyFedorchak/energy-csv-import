@extends('layouts.layoutMaster')
@section('title', 'Edit Member')
@section('content')
  <div id="wrapper_vertraege_update">
    <p>
    <h5 class="card-title">Vertrag bearbeiten</h5>
    </p>
    <form method="POST" action="{{ route('vertraege.update',$user->id) }}">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="kundentyp">Kundentyp:</label>
                <select name="kundentyp" class="form-control" id="kundentyp">
                  <option value="0" {{($user->kundentyp == '0') ? 'Selected' : ''}}>Firmenkunde bis 100.000 kWh</option>
                  <option value="1" {{($user->kundentyp == '1') ? 'Selected' : ''}}>Firmenkunde bis 100.000 kWh</option>
                  <option value="2" {{($user->kundentyp == '2') ? 'Selected' : ''}}>Landwirtschaftlicher Betrieb</option>
                  <option value="3" {{($user->kundentyp == '3') ? 'Selected' : ''}}>Privatkunde</option>
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
                  <input type="radio" name="vertragstyp" value="1" class="form-check-input"  @if($user->vertragstyp == "1")checked @endif> Strom
                </div>
                <div class="form-check">
                  <input type="radio" name="vertragstyp" value="2" class="form-check-input"  @if($user->vertragstyp == "2") checked @endif > Gas
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
                  <input type="radio" name="energieanbieter" value="0"  @if($user->energieanbieter == "0")checked @endif class="form-check-input"> Stadtwerke Klagenfurt
                </div>
                <div class="form-check">
                  <input type="radio" name="energieanbieter" value="1"  @if($user->energieanbieter == "1")checked @endif class="form-check-input"> Terawatt
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
                  <input type="radio" name="contract_type" value="0" @if($user->contract_type == "0")checked @endif   class="form-check-input"> Spot
                </div>
                <div class="form-check">
                  <input type="radio" name="contract_type" value="1" @if($user->contract_type == "1")checked @endif  class="form-check-input"> Fixed
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
                  <input type="radio" name="anmeldetyp" value="0" @if($user->anmeldetyp == "0")checked @endif  class="form-check-input"> Neuanmeldung
                </div>
                <div class="form-check">
                  <input type="radio" name="anmeldetyp" value="1" @if($user->anmeldetyp == "1")checked @endif  class="form-check-input"> Wechsel
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
              <div class="form-group" id="nameField">
                <label for="name">Name:</label>
                <!-- <input type="text" name="name" id="name" class="form-control"> -->
                <div class="row">
                  <div class="col-11">
                    <select name="name" id="userDropdown" class="form-control">
                      <option value="">Select User</option>
                      @foreach($getData as $val)
                        <option value="{{$val->id}}" {{$user->name == $val->id  ? 'selected' : ''}}>{{$val->name}} {{$val->nachname}}</option>
                      <!-- <option value="{{$val['id']}} ">{{$val['name']}}</option> -->
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-1">
                    <a href="{{ route('kunden.create') }}"  target="_blank">
                      <input type="button" class="btn btn-primary" value="Add">
                    </a>
                  </div>
                </div>
                @php
                  $db = DB::table('kundens')->where('id', '=', $user->name)->get();

                @endphp
                <div class="form-row" id="userData">
                  <div class="row">
                    <div class="form-group col-md-3" >
                      <label for="strasse">Strasse:</label>
                      <input type="text" name="strasse" id="customerStreet" value="{{$db[0]->street}}" disabled class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-3" >
                      <label for="hausnummer">Hausnummer:</label>
                      <input type="text" name="hausnummer" id="customerHN"  value="{{$db[0]->house_number}}" disabled class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-3" >
                      <label for="stiege">Stiege:</label>
                      <input type="text" name="stiege" id="customerStairs" value="{{$db[0]->stairs}}" disabled class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-3" >
                      <label for="tuer">Tür:</label>
                      <input type="text" name="tuer" id="customerDoor" value="{{$db[0]->door}}" disabled class="form-control inline-input">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4" >
                      <label for="plz">PLZ:</label>
                      <input type="text" name="plz" id="customerPostcode" value="{{$db[0]->postcode}}" disabled class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-4" >
                      <label for="ort">Ort:</label>
                      <input type="text" name="ort" id="customerLocation" value="{{$db[0]->location}}" disabled class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telefon">Telefonnummer:</label>
                      <input type="text" name="telefon" id="customerTelephone" value="{{$db[0]->tel_number}}" disabled class="form-control">
                    </div>
                  </div>

                  <!-- diff -->
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label for="strasse">Abweichende Strasse:</label>
                      <input type="text" name="diff_street" id="diff_street" value="{{$db[0]->diff_street}}"  class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="hausnummer">Abweichende Hausnummer:</label>
                      <input type="text" name="diff_house_number" id="diff_house_number" value="{{$db[0]->diff_house_number}}" class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="stiege">Abweichende Stiege:</label>
                      <input type="text" name="diff_stairs" id="diff_stairs" value="{{$db[0]->diff_stairs}}"  class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="tuer">Abweichende Tür:</label>
                      <input type="text" name="diff_door" id="diff_door" value="{{$db[0]->diff_door}}"  class="form-control inline-input">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="plz">Abweichende PLZ:</label>
                      <input type="text" name="diff_postcode" id="diff_postcode"  value="{{$db[0]->diff_postcode}}" class="form-control inline-input">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="ort"> Abweichende Ort:</label>
                      <input type="text" name="diff_location" id="diff_location"  value="{{$db[0]->diff_location}}" class="form-control inline-input">
                    </div>
                    <!-- <div class="form-group col-md-4">
                      <label for="telefon">Abweichende Telefonnummer:</label>
                      <input type="text" name="telefon" id="customerTelephone"  class="form-control">
                    </div> -->
                  </div>
                  <!--end -->
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
                  <label for="firmenbuchnummer">Firmenname:</label>
                  <input type="text" name="firmenname" id="firmenname" value="{{ old('firmenname',$user->firmenname)}}" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="uid">Netzbetreibernummer:</label>
                  <input type="text" name="netzbetreibernummer" value="{{ old('netzbetreibernummer',$user->netzbetreibernummer)}}" id="netzbetreibernummer" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="lfbis">Kontaktart:</label>
                  <div class="form-check">

                    <input type="radio" name="kontaktart" value="0" @if(@$user->kontaktart == "0")checked @endif class="form-check-input"> Yes
                  </div>
                  <div class="form-check">
                    <input type="radio" name="kontaktart" value="1" @if(@$user->kontaktart == "1")checked @endif class="form-check-input"> No
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="branche">Zahlungsart:</label>
                  <div class="form-check">

                    <input type="radio" name="zahlungsart" value="0" @if(@$user->zahlungsart == "0")checked @endif class="form-check-input"> Yes
                  </div>
                  <div class="form-check">
                    <input type="radio" name="zahlungsart" value="1" @if(@$user->zahlungsart == "1")checked @endif class="form-check-input"> No
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
                  <input type="text" name="firmenbuchnummer" value="{{ old('firmenbuchnummer',$user->firmenbuchnummer)}}" id="firmenbuchnummer" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="uid">UID Nummer:</label>
                  <input type="text" name="uid" id="uid" value="{{ old('uid',$user->uid)}}" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="lfbis">LFBIS Nummer:</label>
                  <input type="text" name="lfbis" id="lfbis" value="{{ old('lfbis',$user->lfbis)}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="branche">Branche:</label>
                  <input type="text" name="branche" id="branche" value="{{ old('branche',$user->branche)}}" class="form-control">
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
                <input type="text" name="unterzeichner" id="unterzeichner" value="{{ old('unterzeichner',$user->unterzeichner)}}" class="form-control">
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
                <input type="text" name="betreuer" id="betreuer" value="{{ old('betreuer',$user->betreuer)}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="betreuer">Ihr Betreuer:</label>
                <input type="text" value="kommt noch" disabled class="form-control">
              </div>
              <div class="form-group">
                <label for="handlingfee">Handling Fee:</label>
                <input type="number" name="handlingfee" id="handlingfee" value="{{ old('handlingfee',$user->handlingfee)}}" class="form-control" step="0.01" min="2.5" max="6.0" />
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
                  <input type="number" name="kundenkennwort" id="kundenkennwort" value="{{ old('kundenkennwort',$user->kundenkennwort)}}" class="form-control" />
                </div>
                <div class="form-group col-md-6">
                  <label for="mail">E-Mail:</label>
                  <input type="mail" name="mail" id="mail" value="{{ old('mail',$user->mail)}}" class="form-control">
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
                  <input type="text" name="bank" id="bank" value="{{ old('bank',$user->bank)}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="iban">IBAN:</label>
                  <input type="text" name="iban" id="iban" value="{{ old('iban',$user->iban)}}" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="bic">BIC:</label>
                  <input type="text" name="bic" id="bic" value="{{ old('bic',$user->bic)}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="kontoinhaber">Kontoinhaber:</label>
                  <input type="text" name="kontoinhaber" id="kontoinhaber" value="{{ old('kontoinhaber',$user->kontoinhaber)}}" class="form-control">
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
                <input type="text" name="jvb" id="jvb" value="{{ old('jvb',$user->jvb)}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="nb">Netzbetreiber:</label>
                <input type="text" name="nb" id="nb" value="{{ old('nb',$user->nb)}}" class="form-control">
              </div>
              <div class="form-group">
                <label for="aktuellerlieferant">Aktueller Lieferant:</label>
                <input type="text" name="aktuellerlieferant" id="aktuellerlieferant" value="{{ old('aktuellerlieferant',$user->aktuellerlieferant)}}" class="form-control">
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
                @php
                  $vertraege = DB::table('vertraege')->where('id',$user->id)->first();
                  $zpn = json_decode($vertraege->zpn);
                  $anummer = json_decode($vertraege->anummer);
                //   dd($vertraege);
                @endphp
                <div class="row">
                  <div class="form-group col-md-5">

                    <label for="zpn">Zählpunktnummer:</label>
                    @foreach($zpn as $v)
                      <input type="text" name="zpn[]" id="zpn" value="{{ old('zpn',$v)}}" class="form-control mt-2">
                    @endforeach

                  </div>
                  <div class="form-group col-md-5">
                    <label for="anummer">Anlagennummer:</label>
                    @foreach($anummer as $v)
                      <input type="text" name="anummer[]" id="anummer" value="{{old('anummer',$v)}}" class="form-control mt-2">
                  @endforeach
                  <!-- <input type="text" name="anummer[]" id="anummer" value="{{isset($anummer['anummer'])? $anummer['anummer']:'--'}}" class="form-control"> -->
                  </div>
                  <div class="col-md-2 mt-3">
                    <button type="button" name="add" id="add"  class="  form-group btn btn-success">Add More</button>
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
                  <input type="date" name="vertragsdauer" id="vertragsdauer" value="{{ old('vertragsdauer',$user->vertragsdauer)}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="partner">Partner:</label>
                  <select name="partnerid"  class="form-control">
                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                    @foreach($team as $teamuser)
                      <option value="{{$teamuser->id}}" {{$user->partnerid == $teamuser->id  ? 'selected' : ''}}>{{$teamuser->name}}</option>
                    <!-- <option value="{{$teamuser['id']}}">{{$teamuser['name']}}</option> -->
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
            <button type="submit" class="btn btn-primary">Änderungen Speichern</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
@section('page-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script type="text/javascript" src="{{ asset(mix('assets/js/pages/vertraege.js')) }}"></script>
@endsection
