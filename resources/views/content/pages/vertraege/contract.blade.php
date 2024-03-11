@extends('layouts.layoutMaster')
@section('title', 'Contract')
@section('content')
  <div id="wrapper_create_contract">
    <div class="row">
      <div class="col-md-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="body-wrapper">
              <div class="heading">
                <!-- Überschrift-->
                <h1 class="page-header">Energie<wbr>kosten<wbr>rechner Büro TIP</h1>
              </div>
              <div class="tab-label tab1 active">Strom</div>
              <div class="tab-label tab2">Gas</div>
              <div id="tab1" class="tab-content active-tab mt-2">
                <b>STROM</b>
                <div class="user-input-form ">
                  <table id="input-table">
                    <tr>
                    </tr>
                    <tr>


                      {{--<td><label class="form-label">Aktu<wbr>eller Strom<wbr>ver<wbr>brauch:</label></td>--}}
                      <td><label class="form-label">Jahresverbrauch:</label></td>
                      <td><input class="form-input" type="number" name="stromverbrauch" id="stromverbrauch" placeholder="kWh" value="{{$contracts_strom->stromverbrauch}}"></td>
                      <td class="unit"><label> kWh</label><br></td>
                    </tr>
                    <tr>
                      <td><label class="form-label">Aktueller Strom<wbr>preis:</label></td>
                      <td>
                        <input class="form-input" type="number" name="old_stromkosten" id="old_stromkosten" placeholder="in Cent pro kWh" value="{{$contracts_strom->old_stromkosten}}">
                      </td>
                      <td class="unit"><label> Cent/kWh</label><br></td>
                    </tr>
                    <tr>
                      <td><label class="form-label">Grund<wbr>preis:</label></td>
                      <td><input class="form-input" type="number" name="old_grundpreis" id="old_grundpreis"
                                 placeholder="in €" value="{{$contracts_strom->old_grundpreis}}"></td>
                      <td class="unit"><label> €</label><br></td>
                    </tr>
                    <tr>
                      <td><label class="form-label">Anzahl Zähl<wbr>punkte:</label></td>
                      <td><input class="form-input" type="number" name="ZPNum" id="ZPNum" placeholder="" value="{{$contracts_strom->ZPNum}}"></td>
                      <td class="unit"><label> Zähl<wbr>punkte</label></td>
                    </tr>
                    <!-- Extra Field for Handling Fee + in die Preisberechnung dazu -->
                  </table>
                  <span class="disclaimer" style="font-size: 14px">*Eingaben exklusive USt!</span><br>
                  <button id="calculate-button" class="button-tip">
                    Ersparnis berechnen
                  </button>
                </div>
                <div class="resulttablewrapper" id="result-table-wrapper">
                  <div id="AlterPreis"></div>
                  <input type="hidden" name="total_alter_price" id="total_alter_price">
                  <table class="result-table" id="result-table">
                    <tr>
                      <th>Tarif Art</th>
                      <th>Tarif Name</th>
                      <th>Preis</th>
                      <th>Ersparnis</th>
                    </tr>
                    <!-- here goes JS Output -->
                  </table>
                </div>
                <div id="provtablewrapper-INTERN">
                  <label class="form-label" for="stufe-select">Stufe auswählen</label>
                  <select name="stufe-select" id="stufe-select" class="stufe-select">
                    <option class="option-stufe" value="0.5">Trainee</option>
                    <option class="option-stufe" value="0.67">Energy Advisor</option>
                    <option class="option-stufe" value="0.8">Energy Consultant</option>
                    <option class="option-stufe" value="0.91">Executive Energy Consultant</option>
                    <option class="option-stufe" value="1">Energy Branch Manager</option>
                  </select>
                  <button id="calcProvBtn" class="button-tip">Provision berechnen</button>
                  <div class="resulttablewrapper">
                    <div id="AlterPreis"></div>
                    <table class="result-table" id="prov-table">
                      <thead>
                      <tr>
                        <th>Tarif</th>
                        <th>Prov</th>
                        <th>Monatlich</th>
                      </tr>
                      </thead>
                      <tbody>
                      <!-- here goes JS Output -->
                      </tbody>
                    </table>
                    <span class="disclaimer">*HF ... Handling Fee</span>
                  </div>
                </div>
              </div>
              <div id="tab2" class="tab-content mt-2">
                <b>GAS</b>
                <div class="user-input-form ">
                  <table id="input-table">
                    <tr>
                    </tr>
                    <tr>
                      <td><label class="form-label">Aktu<wbr>eller Strom<wbr>ver<wbr>brauch:</label></td>
                      <td><input class="form-input" type="number" name="stromverbrauchGas" id="stromverbrauchGas"
                                 placeholder="kWh" value="{{$contracts_gas->stromverbrauch}}"></td>
                      <td class="unit"><label> kWh</label><br></td>
                    </tr>
                    <tr>
                      <td><label class="form-label">Aktueller Strom<wbr>preis:</label></td>
                      <td><input class="form-input" type="number" name="old_stromkostenGas" id="old_stromkostenGas"
                                 placeholder="in Cent pro kWh" value="{{$contracts_gas->old_stromkosten}}"></td>
                      <td class="unit"><label> Cent/kWh</label><br></td>
                    </tr>
                    <tr>
                      <td><label class="form-label">Grund<wbr>preis:</label></td>
                      <td><input class="form-input" type="number" name="old_grundpreisGas" id="old_grundpreisGas"
                                 placeholder="in €" value="{{$contracts_gas->old_grundpreis}}"></td>
                      <td class="unit"><label> €</label><br></td>
                    </tr>
                    <tr>
                      <td><label class="form-label">Anzahl Zähl<wbr>punkte:</label></td>
                      <td><input class="form-input" type="number" name="ZPNumGas" id="ZPNumGas" placeholder="" value="{{$contracts_gas->ZPNum}}"></td>
                      <td class="unit"><label> Zähl<wbr>punkte</label></td>
                    </tr>
                  </table>
                  <span class="disclaimer" style="font-size: 14px">*Eingaben exklusive USt!</span><br>
                  <button id="calculate-button" class="button-tip">Ersparnis berechnen</button>
                </div>
                <div class="resulttablewrapper" id="result-table-wrapper">
                  <div id="AlterPreisGas"></div>
                  <input type="hidden" name="total_alter_pricegas" id="total_alter_pricegas">
                  <input type="hidden" readonly id="totalprice">
                  <table class="result-table" id="result-table-gas">
                    <tr>
                      <th>Tarif Art</th>
                      <th>Tarif Name</th>
                      <th>Preis</th>
                      <th>Ersparnis</th>
                    </tr>
                    <!-- here goes JS Output -->
                  </table>
                </div>
                <div id="provtablewrapper-INTERN">
                  <label class="form-label" for="stufe-select">Stufe auswählen</label>
                  <select name="stufe-select" id="stufe-select" class="stufe-select">
                    <option class="option-stufe" value="0.5">Trainee</option>
                    <option class="option-stufe" value="0.67">Energy Advisor</option>
                    <option class="option-stufe" value="0.8">Energy Consultant</option>
                    <option class="option-stufe" value="0.91">Executive Energy Consultant</option>
                    <option class="option-stufe" value="1">Energy Branch Manager</option>
                  </select>
                  <button id="calcProvBtn" class="button-tip">Provision berechnen</button>
                  <div class="resulttablewrapper">
                    <div id="AlterPreisGas"></div>
                    {{-- <input  readonly id="total"> --}}
                    <table class="result-table" id="prov-table-gas">
                      <thead>
                      <tr>
                        <th>Tarif</th>
                        <th>Prov</th>
                        <th>Monatlich</th>
                      </tr>
                      </thead>
                      <tbody>
                      <!-- here goes JS Output -->
                      </tbody>
                    </table>
                    <span class="disclaimer">*HF ... Handling Fee</span>
                  </div>
                </div>
              </div>
              <input type="hidden" id="tarife_data_strom" value="{{$val_strom}}">
              <input type="hidden" id="tarife_data_gas" value="{{$val_gas}}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card -->


    

   


<?php
if(isset($_GET['user'])&& $_GET['user'])
{
  $userid= $_GET['user'];
}
    // echo $_GET['user'];

    ?>

    <div id="tarifes" class="container mt-2">

   


      <form action="{{ route('vertraege.create')}}" method="get">
        <input type="hidden" name="type" value="strom" />
        @if(isset($userid))
        <input type="hidden" name="user" value="{{$userid}}" />
        @endif
        <div class="row" id="cards">
        </div>
        <button class="btn btn-success mt-2" type="submit">Neuen Stromvertrag erstellen</button>
      </form>
    </div>
{{--    <div id="tab_gas" class="container mt-2" style="display: none;">--}}
{{--      <form action="{{ route('vertraege.create')}}" method="post">--}}
{{--        <input type="hidden" name="type" value="gas" />--}}
{{--        @csrf--}}
{{--        <div class="row" id="card-gas"></div>--}}
{{--        <button class="btn btn-success mt-2" type="submit">Neuen Gasvertrag erstellen</button>--}}
{{--      </form>--}}
{{--    </div>--}}
  </div>
@endsection
@section('page-style')
  <link href={{ asset(mix('assets/css/pages/vertraege/contract.css')) }} rel="stylesheet" />
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/decimal.js/9.0.0/decimal.js"></script>
  <!--<script src={{ asset(mix('assets/js/pages/vertraege.js')) }}></script>-->
<script>
  $(document).ready(function(){
  	$(window).on('load',function(){
   		strom() ;
        gas();
        getTarif();
	});
    $('.tab-label.tab1').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        showTab('tab1');
      });

      $('.tab-label.tab2').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        showTab('tab2');
      });
    $('.button-tip').on('click',function(){
      strom();
      gas();
      getTarif();
    });
    
    function strom(){
     let kwh = new Decimal($('#stromverbrauch').val());
     let old_stromkosten = new Decimal($('#old_stromkosten').val());
     let kwhprice =  old_stromkosten.div(100);
     let grundpreis = new Decimal($('#old_grundpreis').val());
     let preis_alt= new Decimal((kwh*kwhprice)+parseFloat(grundpreis*12))
     $('#AlterPreis').html(`Bisheriger Preis: ${preis_alt.toFixed(2)} €`);
     $('#total_alter_price').val(preis_alt.toFixed(2));
     
    }
    function gas(){
     let kwhgas = new Decimal($('#stromverbrauchGas').val());
     let old_stromkostenGas = new Decimal($('#old_stromkostenGas').val());
     let kwhpricegas =  old_stromkostenGas.div(100); // div mean divider
     let grundpreisgas = new Decimal($('#old_grundpreisGas').val());
     let preis_altgas= new Decimal((kwhgas*kwhpricegas)+parseFloat(grundpreisgas*12))
     $('#AlterPreisGas').html(`Bisheriger Preis: ${preis_altgas.toFixed(2)} €`);
     $('#total_alter_pricegas').val(preis_altgas.toFixed(2));
     
    }
    function showTab(tabId){
      $('#tarifes #cards').html('');
      $('.tab-content').hide();
      $('.tab-label').removeClass('active');
      $(`#${tabId}`).show();
      $(`.tab-label.${tabId}`).addClass('active');
    }
    function getTarif(){
      // alert("t")
      let stromverbrauch = new Decimal($('#stromverbrauch').val());
      let old_stromkosten = new Decimal($('#old_stromkosten').val());
      let old_grundpreis = new Decimal($('#old_grundpreis').val());
      let stromverbrauchGas = new Decimal($('#stromverbrauchGas').val());
      let old_stromkostenGas = new Decimal($('#old_stromkostenGas').val());
      let old_grundpreisGas = new Decimal($('#old_grundpreisGas').val());
      
        $.ajax({
                url: "{{url('get-tarife')}}?stromverbrauch="+stromverbrauch+"&old_stromkosten="+old_stromkosten+
          "&old_grundpreis="+old_grundpreis+"&stromverbrauchGas="+stromverbrauchGas+"&old_stromkostenGas="+old_stromkostenGas+"&old_grundpreisGas="+old_grundpreisGas,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
         

                    const tariffs = response.data;
                    let total_alter_price = $('#total_alter_price').val();
                    let old_stromkosten2 = new Decimal($('#old_stromkosten').val());
                    let kwhprice2 =  old_stromkosten2.div(100);
                   
                    let boers = JSON.parse(response.val_strom);
                  const boerse = new Decimal(boers.FixedVal.Boerse);
                    $('#result-table').html('<tr><th>Tarif Art</th><th>Tarif Name</th><th>Preis</th><th>Ersparnis</th></tr>');
                    $('#tarifes #cards').html('');


                    for (let key in tariffs) {
                      const tariff = tariffs[key];
                      const name= key;

                      const firma = tariff.firma;
console.log("thishtmlrespo",tariff.preis)
            		  const tarpreis = new Decimal(tariff.preis);
                  console.log("thishtmlrespo",tarpreis)
            		  const grundpreis = new Decimal((tariff.grundpreis)*12);
            		  console.log("thishtmlrespo",grundpreis)
            		  const type = tariff.type;
                      const ersparnis= total_alter_price - (parseFloat(grundpreis)+parseFloat(kwhprice2));
                      const contracttype = tariff.contract_type;
                      const contractID = tariff.id;
                      const preis=tarpreis;
                      console.log("thishtmlrespo",grundpreis)
                      const diff= (grundpreis).toFixed(2);
            			const prov = new Decimal(tariff.prov);
            			const result = grundpreis * boerse;


                    	const html =`<tr><td>${type}</td><td>${firma} - ${name}</td><td>${grundpreis.toFixed(2)} €</td><td>${ersparnis.toFixed(2)} €</td></tr>`;

                      console.log("thishtml",html)
              			$('#result-table').append(html);
                      let idx = $('#tarifes #cards .card').length;
                      const html_card = `
              <div class="col-sm-6 col-lg-4 mt-2">
                <div class="card">
                  <div class="card-body">
		    
		    <input type="radio" class="color" name="${contracttype}" value="${contractID}" ${idx === 0 ? 'checked' : ''} />
                    <h5 class="card-title mt-2">${name}</h5>
                    <hr class="custom-hr">
                    <p class="card-text">${tariff.firma}</p>
                    <b>Preis</b> : ${preis}<br>
                    <b>Ersparnis</b> : ${diff} <br>
                    <b>Prov</b> : ${prov} <br>
                    <b>Type</b> : ${type} <br>
                    <b>Contract Type</b> : ${contracttype} <a href="/angebot/${contractID}"><button type="button" class="btn btn-danger">Compare</button></a>
		    
                  </div>
                </div>
              </div>
            `;
            $('#tarifes #cards').append(html_card);
                    }
                    console.log("dd");
                }
         });

    }
    
});
</script>
@endsection
