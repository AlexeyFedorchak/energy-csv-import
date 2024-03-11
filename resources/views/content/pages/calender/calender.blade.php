@extends('layouts.layoutMaster')

@section('title', 'Earnings')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@section('content')
  <link href="{{asset('assets/vendor/calendar/main.min.css')}}" rel="stylesheet">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="card calendar-container">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<script src="{{asset('assets/vendor/calendar/main.js')}}"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

var contractEndDates = {!! $contractEndDates !!};

            var newevents = contractEndDates.map(function (data) {
                return {
                    title: 'Contract End-Name:'+data.name,
                    start: data.vertragsdauer,
                    color: '#FF0000', // Event color (you can customize this)
                    url:'/vertraege/edit/'+data.id
                };
            });

    var calendar = new FullCalendar.Calendar(calendarEl, {
      dayMaxEvents: true, // allow "more" link when too many events
      events : newevents,
      selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {console.log(start);},
        eventClick: function(info) {
    	    //alert(info.event.url);
        },
        
    });

    calendar.render();
  });
      
    </script>
@endsection
