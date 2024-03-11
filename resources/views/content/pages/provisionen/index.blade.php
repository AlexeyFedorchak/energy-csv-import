@php

$configData = Helper::appClasses();

@endphp



@extends('layouts/layoutMaster')



@section('title', 'Dashboard')



@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

@endsection



@section('vendor-script')

<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

@endsection



@section('page-script')

<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>

@endsection



@section('content')



<div class="row">

  <div class="col-xl">

    <div class="card card-action mb-4">

      <div class="card-alert"></div>

      <div class="card-header">

        <h5 class="card-title">Provisionsrechner:</h5>

      </div>
      @if ($message = Session::get('success'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p>{{$message}}</p>
</div>

@endif
        <div class="card-body">

        <p class="card-text">

          <div class="container">

            <!-- Empty form with the specified fields -->

            <form id="calculationForm">

              @csrf

              <div class="form-group">

                <label for="strom">Strom (as a number)</label>

                <input type="number" class="form-control" id="strom" name="strom">

              </div>

              <div class="form-group">

                <label for="gas">Gas (as a number)</label>

                <input type="number" class="form-control" id="gas" name="gas">

              </div>

              <br><button type="button" class="btn btn-primary" id="calculateButton">Berechnen</button>

            </form>



            <!-- Results display -->

            <div id="results" class="mt-4">

              <h5>Results:</h5>

              <p>Strom: <span id="resultStrom"></span></p>

              <p>Gas: <span id="resultGas"></span></p>

              <p>Sum of Strom and Gas: <span id="resultSum"></span></p>

              <p>Handling-Fee: <span id="resultHandlingFee"></span></p>

              <p>Sum of Strom and Gas minus Handling-Fee: <span id="resultSumMinusHandlingFee"></span></p>

              <p>Anteil Vertrieb: <span id="resultAnteilVertrieb"></span></p>

            </div>

          </div>

        </p>

      </div>

    </div>

  </div>

</div>



<!-- JavaScript for form calculation -->

<script>

  document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('calculationForm');

    const calculateButton = document.getElementById('calculateButton');

    const resultStrom = document.getElementById('resultStrom');

    const resultGas = document.getElementById('resultGas');

    const resultSum = document.getElementById('resultSum');

    const resultHandlingFee = document.getElementById('resultHandlingFee');

    const resultSumMinusHandlingFee = document.getElementById('resultSumMinusHandlingFee');

    const resultAnteilVertrieb = document.getElementById('resultAnteilVertrieb');



    calculateButton.addEventListener('click', function () {

      const strom = parseFloat(document.getElementById('strom').value) || 0;

      const gas = parseFloat(document.getElementById('gas').value) || 0;

      

      // Calculate values

      const stromResult = strom * 0.0255 * 0.7;

      const gasResult = gas * 0.0295 * 0.7;

      const sumResult = stromResult + gasResult;

      const handlingFeeResult = -(sumResult * 0.1);

      const sumMinusHandlingFeeResult = sumResult + handlingFeeResult;

      const anteilVertriebResult = sumMinusHandlingFeeResult / 2;



      // Display results

      resultStrom.textContent = stromResult.toFixed(2);

      resultGas.textContent = gasResult.toFixed(2);

      resultSum.textContent = sumResult.toFixed(2);

      resultHandlingFee.textContent = handlingFeeResult.toFixed(2);

      resultSumMinusHandlingFee.textContent = sumMinusHandlingFeeResult.toFixed(2);

      resultAnteilVertrieb.textContent = anteilVertriebResult.toFixed(2);

    });

  });

</script>

@endsection



@push('style')

<link href="{{asset('assets/admin/css/tree.css')}}" rel="stylesheet">

@endpush

