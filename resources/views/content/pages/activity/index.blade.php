@extends('layouts.layoutMaster') @section('title', 'Earnings')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> @section('content') <div>
  <h5 class="card-title">Activity</h5>
  @if ($message = Session::get('success'))

            <div class="alert alert-success">
                
                <p>{{$message}}</p>
            </div>

            @endif
  <div class="text-end mb-3">
    <!-- <a href="{{ route('kunden.create') }}" class="btn btn-primary">Add New Member</a> -->
  </div>
  <table id="userTable" class="display">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Datum und Zeit</th>
        <th>Aktivitäten</th>
        <th>Aktion</th>
      </tr>
    </thead>
    <tbody> @foreach ($getData as $user)
      @php
        $date = $user->date_time;
        $date = Carbon\Carbon::parse($date);
        $agoTime = $date->diffForHumans();
        
      @endphp
       <tr>
        <td style="text-align: center;">{{ $loop->iteration }}</td>
        <td>{{ $user->user_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->date_time }}</td>
        <td>{{ $user->activity }}</td>
        <!-- Add other user data columns as needed -->
        <td>
          
            <form method="DELETE" action="{{route('activity.delete',$user->id)}}">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-danger confirm-button" ><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr> @endforeach </tbody>
  </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">

    $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
<script>
  $(document).ready(function() {
    $('#userTable').DataTable();
  });
</script>

@endsection