@extends('layouts.layoutMaster')
@section('title', 'Earnings')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@section('content')
<div class="app-content">
   <div class="content-wrapper">
      <div class="container-fluid">
         <div class="row">
            <div class="col">
               <div class="page-description">
                  <h1>Commission</h1>
               </div>
            </div>
         </div>

          <div class="row p-2">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Total count</h5>
                     <!-- <select>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>yearly</option>
                        </select> -->
                  </div>
                  <div class="card-body">
                     <table id="" class="table table-bordered">
                          @if (auth()->user()->role == '1')
                        <thead class="table table-dark">
                           <tr>
                              <th>Total Team</th>
                              <th>Total User</th>
                              <th>Total Strom</th>
                              <th>Total Gas</th>
                              <th>Total Contract</th>
                              <th>Total Comission</th>
                           </tr>
                        </thead>
                        <tbody>

                           <tr>
                              <td>{{$total['team']}}</td>
                              <td>{{$total['user']}}</td>
                              <td>{{$total['strom'] ?? 0}}</td>
                              <td>{{$total['gas'] ?? 0}}</td>
                              <td>{{$total['vertrage'] ?? 0}}</td>

                              <td>0</td>
                              <!-- Add other user data columns as needed -->
                           </tr>


                        </tbody>
                        @elseif(auth()->user()->role == '2')
                          <thead class="table table-dark">
                           <tr>

                              <th>Total User</th>
                              <th>Total Strom</th>
                              <th>Total Gas</th>
                              <th>Total Contract</th>
                              <th>Total Comission</th>
                           </tr>
                        </thead>
                        <tbody>

                           <tr>



                              <td>{{$total['user']}}</td>
                              <td>{{$total['strom'] ?? 0}}</td>
                              <td>{{$total['gas'] ?? 0}}</td>

                              <td>{{$total['vertrage'] ?? 0}}</td>

                              <td>0</td>
                              <!-- Add other user data columns as needed -->
                           </tr>


                        </tbody>

                        @else
                          <thead class="table table-dark">
                           <tr>

                              <th>Total Strom</th>
                              <th>Total Gas</th>
                              <th>Total Contract</th>
                              <th>Total Comission</th>
                           </tr>
                        </thead>
                        <tbody>

                           <tr>



                              <td>{{$total['strom'] ?? 0}}</td>
                              <td>{{$total['gas'] ?? 0}}</td>
                              <td>{{$total['vertrage'] ?? 0}}</td>

                              <td>0</td>
                              <!-- Add other user data columns as needed -->
                           </tr>


                        </tbody>

                        @endif

                     </table>
                  </div>
               </div>
            </div>
         </div>

          @if (auth()->user()->role == '1')

         <div class="row p-2">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Teams</h5>
                     <!-- <select>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>yearly</option>
                        </select> -->
                  </div>
                  <div class="card-body">
                     <table id="userTable" class="display">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Team Name</th>
                              <th>Strom</th>
                              <th>Gas</th>
                              <th>Contract</th>
                              <th>Comission</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                           <tr>

                              <td>{{ $loop->iteration }}</td>
                              <td>{{$team->team_name}}</td>
                              <td>{{$team->kwh_strom ?? 0}}</td>
                              <td>{{$team->kwh_gas ?? 0}}</td>
                              <td>{{$team->count ?? 0}}</td>
                              <td>{{0}}</td>
                              <!-- Add other user data columns as needed -->
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         @endif

 @if (auth()->user()->role == '1')
         <div class="row p-2">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Users</h5>
                     <!-- <select>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>yearly</option>
                        </select> -->
                  </div>
                  <div class="card-body">
                     <table id="vertragTable" class="display">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>User Name</th>
                              <th>Strom</th>
                              <th>Gas</th>
                              <th>Contract</th>
                              <th>Comission</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $user)
                           <tr>

                              <td>{{ $loop->iteration }}</td>
                              <td>{{$user->user_name}}</td>
                             <td>{{$user->kwh_strom ?? 0}}</td>
                              <td>{{$user->kwh_gas ?? 0}}</td>
                              <td>{{$user->count ?? 0}}</td>
                              <td>{{0}}</td>
                              <!-- Add other user data columns as needed -->
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
 @elseif(auth()->user()->role == '2')
 <div class="row p-2">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Users</h5>
                     <!-- <select>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>yearly</option>
                        </select> -->
                  </div>
                  <div class="card-body">
                     <table id="vertragTable" class="display">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>User Name</th>
                              <th>Strom</th>
                              <th>Gas</th>
                              <th>Contract</th>
                              <th>Comission</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $user)
                           <tr>

                              <td>{{ $loop->iteration }}</td>
                              <td>{{$user->user_name}}</td>
                              <td>{{$user->kwh_strom ?? 0}}</td>
                              <td>{{$user->kwh_gas ?? 0}}</td>
                              <td>{{$user->count ?? 0}}</td>
                              <td>{{0}}</td>
                              <!-- Add other user data columns as needed -->
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
 @else
 <div class="row p-2">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-title">Users</h5>
                     <!-- <select>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>yearly</option>
                        </select> -->
                  </div>
                  <div class="card-body">
                     <table id="vertragTable" class="display">
                        <thead>
                           <tr>
                              <th>S.No</th>

                              <th>Contract</th>

                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $user)
                           <tr>

                              <td>{{ $loop->iteration }}</td>
                              <td>{{$user->customer}}</td>

                              <!-- Add other user data columns as needed -->
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>

@endif
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
     $('#userTable').DataTable();
   });
</script>
<script>
   $(document).ready(function () {
     $('#vertragTable').DataTable();
   });

</script>
<script type="text/javascript" src="{{asset('assets/js/chart/chart.bundle.min.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function () {

   "use strict";

   var dates = @json($vertraege->pluck('date'));
       var counts = @json($vertraege->pluck('count'));


   new Chart(document.getElementById("chartjs1"),
    { "type": "line",
      "data": { "labels": dates,
                "datasets": [{
                    "label": "Contract count",
                     "data": counts,
                     "fill": false,
                     "borderColor": "rgb(75, 192, 192)",
                     "lineTension": 0.1 }] },
       "options": {} });

   new Chart(document.getElementById("chartjs2"),
       { "type": "bar",
         "data": { "labels": dates,
                   "datasets": [{
                              "label": "Contract count",
                              "data": counts, "fill": false,
                              "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                              "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                               "borderWidth": 1 }] },
                   "options": { "scales": { "yAxes": [{ "ticks": { "beginAtZero": true } }] } } });

   new Chart(document.getElementById("chartjs3"), { "type": "radar", "data": { "labels": ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"], "datasets": [{ "label": "My First Dataset", "data": [65, 59, 90, 81, 56, 55, 40], "fill": true, "backgroundColor": "rgba(255, 99, 132, 0.2)", "borderColor": "rgb(255, 99, 132)", "pointBackgroundColor": "rgb(255, 99, 132)", "pointBorderColor": "#fff", "pointHoverBackgroundColor": "#fff", "pointHoverBorderColor": "rgb(255, 99, 132)" }, { "label": "My Second Dataset", "data": [28, 48, 40, 19, 96, 27, 100], "fill": true, "backgroundColor": "rgba(54, 162, 235, 0.2)", "borderColor": "rgb(54, 162, 235)", "pointBackgroundColor": "rgb(54, 162, 235)", "pointBorderColor": "#fff", "pointHoverBackgroundColor": "#fff", "pointHoverBorderColor": "rgb(54, 162, 235)" }] }, "options": { "elements": { "line": { "tension": 0, "borderWidth": 3 } } } });

   new Chart(document.getElementById("chartjs4"), { "type": "doughnut", "data": { "labels": ["Red", "Blue", "Yellow"], "datasets": [{ "label": "My First Dataset", "data": [300, 50, 100], "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"] }] } });

   });
</script>
@endsection
