@extends('layouts.layoutMaster')



@section('title', 'Mitarbeiter bearbeiten')


@section('content')


<div class="container">

  <h1>Mitarbeiter bearbeiten</h1>



  <form action="{{ route('admin.users.update', $user->id) }}" method="POST">

    @csrf

    @method('PUT')

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Mitarbeiterdetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Name:</label>
                   <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                  </div>
                 </div>
              <div class="col-md-4">
                <div class="form-group">
                 <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                  </div>
                </div>
             </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Adressdetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="street">Straße:</label>
                    <input type="text" class="form-control" id="street" name="street" value="{{ $user->street }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                 <label for="zipcode">Postleitzahl:</label>
                   <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $user->zipcode }}">
               </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                 <label for="city">Ort:</label>
                   <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Kontaktinformation</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Telefonnummer:</label>
                     <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                  </div>
               </div>
              <div class="col-md-6">
                <div class="form-group">
                 <label for="website">Website:</label>
                   <input type="text" class="form-control" id="website" name="website" value="{{ $user->website }}">
                 </div>
                </div>
             </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Firmendetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                 <label for="companyname">Firmenname:</label>
                   <input type="text" class="form-control" id="companyname" name="companyname" value="{{ $user->companyname }}">
                 </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="manager">Manager:</label>
                    <input type="text" class="form-control" id="manager" name="manager" value="{{ $user->manager }}">
               </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="contactperson">Ansprechpartner:</label>
                 <input type="text" class="form-control" id="contactperson" name="contactperson" value="{{ $user->contactperson }}">
                 </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                 <label for="taxnumber">UID:</label>
                   <input type="text" class="form-control" id="taxnumber" name="taxnumber" value="{{ $user->taxnumber }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                 <label for="financeoffice">Finanzamt:</label>
                   <input type="text" class="form-control" id="financeoffice" name="financeoffice" value="{{ $user->financeoffice }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="socialsecuritynumber">SV Nummer:</label>
                    <input type="text" class="form-control" id="socialsecuritynumber" name="socialsecuritynumber" value="{{ $user->socialsecuritynumber }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                 <label for="vatid">Steuernummer</label> 
                  <input type="text" class="form-control" id="vatid" name="vatid" value="{{ $user->vatid }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="gisa1">GISA 1</label> 
                    <input type="text" class="form-control" id="gisa1" name="gisa1" value="{{ $user->gisa1 }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="gisa2">GISA 2</label> 
                    <input type="text" class="form-control" id="gisa2" name="gisa2" value="{{ $user->gisa2 }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Zahlungsdetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="bankname">Bank:</label>
                    <input type="text" class="form-control" id="bankname" name="bankname" value="{{ $user->bankname }}">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="iban">IBAN:</label>
                    <input type="text" class="form-control" id="iban" name="iban" value="{{ $user->iban }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="bic">BIC:</label>
                    <input type="text" class="form-control" id="bic" name="bic" value="{{ $user->bic }}">
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Energy-Group Einstellungen</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="referral">Eingeladen von:</label>
                  <select class="form-control" id="referral" name="referral">
  <option></option>
  @foreach ($users as $userOption)
  <option value="{{ $userOption->id }}" {{ $userOption->id == $user->referral ? 'selected' : '' }}>
    {{ $userOption->name }} - {{ optional($userOption->team)->id }} | {{ optional($userOption->team)->name }}
  </option>
  @endforeach
</select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="teamid">Team</label>
                  <select class="form-control" id="team" name="team">
  <option></option>
  @foreach ($teams as $teamOption)
  <option value="{{ $teamOption->id }}" {{ $teamOption->id == $user->teamid ? 'selected' : '' }}>
    {{ $teamOption->id }} - {{ $teamOption->name }}
  </option>
  @endforeach
</select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="role">Rolle</label>
                  <select class="form-control" id="role" name="role">
                    <option value="{{ 0 }}">Worker</option>
                    <option value="{{ 2 }}">Team Admin</option>
                    <option value="{{ 1 }}">Admin</option>

                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="card">
        <div class="card-header">
            Add Vermittlernummer
        </div>
        <div class="card-body">
          
            <div id="vermittlernummerForm">
              @if(count($verms)!=0)
              @foreach($verms as $verm)
              <div class="row" id="row">
                <div class="col-md-3">
                <div class="form-group">
                    <label for="lieferanten_id">Supplier:</label>
                    <select class="form-control lieferanten_id" id="lieferanten_id" name="lieferanten_id[]">
                      <option value="">Select Supplier</option>
                    @foreach($lieferantens as $lieferant)
                            <option value="{{ $lieferant->id }}" @if($lieferant->id==$verm->lieferanten_id) selected @endif>{{ $lieferant->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="vermittlernummer">Vermittlernummer:</label>
                    <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer[]" value="{{$verm->vermittlernummer}}">
                </div>
                </div>
                </div>
              @endforeach
              @else
              <div class="row" id="row">
                <div class="col-md-3">
                <div class="form-group">
                    <label for="lieferanten_id">Supplier:</label>
                    <select class="form-control lieferanten_id" id="lieferanten_id" name="lieferanten_id[]">
                      <option value="">Select Supplier</option>
                    @foreach($lieferantens as $lieferant)
                            <option value="{{ $lieferant->id }}">{{ $lieferant->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="vermittlernummer">Vermittlernummer:</label>
                    <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer[]">
                </div>
                </div>
                </div>
              @endif
                   <div id="newinput"></div>

                <button type="button" class="btn btn-primary" id="addMore">Add Another</button>
            </div>
        
      </div>
    </div>

  <div class="form-group col-md-12">
  <label for="admin" class="form-label">Rolle</label><br>
  <select id="admin" name="admin" class="form-control">
    <option value="0">User</option>
    <option value="1">Admin</option>
  </select>
</div>

    <!-- Add more fields as needed -->



    <button type="submit" class="btn btn-primary mr-2">Speichern</button>

  </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('addMore').addEventListener('click', function() {
        var form = document.getElementById('vermittlernummerForm');
        var newFormGroup = document.createElement('div');
        // let div = document.createElement("div");
        newFormGroup.innerHTML = `
			<div class="row" id="row">
                <div class="col-md-3">
            <div class="form-group">
                <label for="lieferanten_id">Supplier:</label>
                <select class="form-control lieferanten_id" id="lieferanten_id1" name="lieferanten_id[]">
					<option value="">Select Supplier</option>
                    @foreach($lieferantens as $lieferant)
                        <option value="{{ $lieferant->id }}">{{ $lieferant->name }}</option>
                    @endforeach
                </select>
            </div>
			</div>
			<div class="col-md-6">
            <div class="form-group">
                <label for="vermittlernummer">Vermittlernummer:</label>
                <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer[]">
            </div>
			</div>
  			<div class="col-md-2 mt-4">
  			<button class="btn btn-danger " id="DeleteRow" type="button">
                <i class="bi bi-trash"></i> Delete</button> 
  		</div>
  		</div>
        `;
      console.log(newFormGroup);
        $('#newinput').append(newFormGroup);
      check_now()
    });
  $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
  })
  check_now();
  $(document).on('change', 'select[name*=lieferanten_id]', function() {
    check_now() //on change call as well
  })
  function check_now() {
    //remove disable from all options
    $("select[name*=lieferanten_id] option").prop('disabled', false)
    //loop through select box
    $("select[name*=lieferanten_id]").each(function() {
      var values = $(this).val()
      if (values != "") {
        //find option where value matches disable them
        $("select[name*=lieferanten_id]").not(this).find("option[value=" + values + "]").prop('disabled', true);
      }
    })
  }
 
});
  
</script>

@endsection
