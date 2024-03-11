@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.js"></script>

@section('content')
<h4>Hallo,
  @if(Auth::check())
    {{ Auth::user()->name }}!
  @else
    John Doe!
  @endif
</h4>

<div class="row">
  <div class="col-md-6 p-2">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title">Deine Daten:</h5>
      Deine Mitarbeiter-ID: <b>{{ auth()->user()->id ?: 'Noch nicht gesetzt, kontaktiere deinen Team-Lead!' }}</b><br>
      Deine Team-ID: <b>{{ auth()->user()->teamid ?: 'Noch nicht gesetzt, kontaktiere deinen Team-Lead!' }}</b>
      @if (isset($teamName))
        ({{ $teamName }})
      @endif
      <br>

      @if (count($usernames) == 1)
          @if ($usernames[0])
              Dein Team-Leader ist: <b>{{ $usernames[0] }}</b>
          @else
              Dein Team-Leader ist: <b>Noch nicht gesetzt, kontaktiere deinen Team-Lead!</b>
          @endif
      @elseif (count($usernames) > 1)
          Deine Team-Leader sind:
          @foreach ($usernames as $index => $username)
              @if ($username)
                  <b>{{ $username }}</b>
                  @if ($index < count($usernames) - 1 && $usernames[$index + 1])
                      ,
                  @endif
              @endif
          @endforeach
          @if (count(array_filter($usernames)) == 0)
              Deine Team-Leader sind: <b>Noch nicht gesetzt, kontaktiere deinen Team-Lead!</b>
          @endif
      @else
          Dein Team-Leader ist: <b>Noch nicht gesetzt, kontaktiere deinen Team-Lead!</b>
      @endif<br>
      Deine Stromverträge: <b>{{ $totalUserStromKwh }} kWh</b><br>
      Deine Gasverträge: <b>{{ $totalUserGasKwh }} kWh</b><br>
      Deine Stufe:        @if ($stufe == 0)
            <b>Trainee</b>
        @elseif ($stufe == 1)
            <b>Energy Advisor</b>
        @elseif ($stufe == 2)
            <b>Energy Consultant</b>
        @elseif ($stufe == 3)
            <b>Executive Energy Consultant</b>
        @elseif ($stufe == 4)
            <b>Energy Branch Manager</b>
        @else
            <b>Unknown</b>
        @endif<br>
      </div>
    </div>
  </div>

  <div class="col-md-6 p-2" >
    <div class="card" style="height: 240.12;">
        <div class="card-body">
            <h5 class="card-title">Teamstatistik für @if (isset($teamName)) {{ $teamName }} @endif:</h5>
            Derzeitige Strom kWh: <b>{{ $totalStromKwh }}</b><br>
            Derzeitige Gas kWh: <b>{{ $totalGasKwh }}</b><br>
            Team-Mitglieder: <b>{{ count($usernames) }}</b><br>
        </div>
    </div>
  </div>
</div>
<br>
<div class="row">
 
  <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Folgende Termine : <a style="float: inline-end;" href="{{route('vertraege.index')}}"><button class="btn btn-primary">Alle anzeigen</button></a></h5>  
            @foreach ($vertraege as $var)

                
                
                  <?php $startDate = strtotime($ldate); 
                                       $endDate = strtotime($var->vertragsdauer);     
                                       $numberOfSeconds = $endDate - $startDate;
                                       $numberOfDays = $numberOfSeconds / (60 * 60 * 24);
?>
@if($numberOfDays <= 90)
 Name<b> : {{ $var->name }}</b>,<br>
                 Gas <b> : {{ $var->gas }}</b>,
                 Strom <b> : {{$var->storm }}</b><br>
 Vertragsdauer <b> :{{$var->vertragsdauer }}
<p class="text-danger"> Vertrag läuft aus in {{$numberOfDays}} days </p>
@else

@endif

            @endforeach
        </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Strom und Gas Verlauf</h5>
        <div id="energyChart"></div>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Retrieve the Strom and Gas data from the controller
    const stromData = @json($stromData);
    const gasData = @json($gasData);

    // Extract date and value arrays for both Strom and Gas data
    const stromDates = stromData.map(entry => entry.date);
    const stromValues = stromData.map(entry => entry.value);
    const gasDates = gasData.map(entry => entry.date);
    const gasValues = gasData.map(entry => entry.value);

    // Calculate cumulative sums for Strom and Gas data
    const cumulativeStrom = stromValues.reduce((acc, value) => {
      if (acc.length === 0) {
        return [value];
      }
      return [...acc, acc[acc.length - 1] + value];
    }, []);

    const cumulativeGas = gasValues.reduce((acc, value) => {
      if (acc.length === 0) {
        return [value];
      }
      return [...acc, acc[acc.length - 1] + value];
    }, []);

    // Create ApexCharts
    const options = {
      chart: {
        type: 'line',
        height: 400,
      },
      xaxis: {
        categories: stromDates, // Use dates as x-axis categories
      },
      series: [
        {
          name: 'Cumulative Strom',
          data: cumulativeStrom, // Cumulative Strom consumption values
        },
        {
          name: 'Cumulative Gas',
          data: cumulativeGas, // Cumulative Gas consumption values
        },
      ],
    };

    const chart = new ApexCharts(document.querySelector("#energyChart"), options);

    // Render the chart
    chart.render();
  });
</script>

@endsection
