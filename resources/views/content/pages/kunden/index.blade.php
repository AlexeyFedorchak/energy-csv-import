@extends('layouts.layoutMaster') @section('title', 'Kunden')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> @section('content') <div>
  <h5 class="card-title">Kunden</h5>
  @if ($message = Session::get('success'))

            <div class="alert alert-success">
                
                <p>{{$message}}</p>
            </div>

            @endif
  <div class="text-end mb-3">
    <a href="{{ route('kunden.create') }}" class="btn btn-primary">Neuen Kunden anlegen</a>
  </div>
  <style>
.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}
</style>
  <div class="table-responsive">
  <table id="userTable" class="display">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Adresse</th>
        <th>Lieferadresse</th>
        <th>Email</th>
        <th>Telefonnummer</th>
        <th>Geburtsdatum</th>
        <th>Erstellungsdatum</th>
        <!-- Add other user data columns as needed -->
        <th>Contract</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody> @foreach ($getData as $user) <tr>
        <td style="text-align: center;">{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->nachname }}</td>
        <td>
    {{ $user->street }}, {{ $user->house_number }}
    @if(!empty($user->stairs))/{{ $user->stairs }}@endif
    @if(!empty($user->door))/ {{ $user->door }}@endif
    , {{ $user->plz }} {{ $user->location }}
</td>        
<td>
@if(!empty($user->diff_street))
        {{ $user->diff_street }},
        @else
        Keine Lieferadresse eingegeben
    @endif 
    @if(!empty($user->diff_house_number)){{ $user->diff_house_number }}@endif
    @if(!empty($user->diff_stairs))
        /{{ $user->diff_stairs }}
    @endif
    @if(!empty($user->diff_door))
        /{{ $user->diff_door }}
    @endif
    @if(!empty($user->diff_plz)), {{ $user->diff_plz }}@endif 
    @if(!empty($user->diff_location)) {{ $user->diff_location }}@endif
</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->tel_number }}</td>
        <td>{{ $user->dob }}</td>
        <td>{{ $user->created_at }}</td>
        <!-- Add other user data columns as needed -->
        <td>
          <a href="{{ route('kunden.contract', ['user' => $user->id]) }}" class="btn btn-secondary">
            <i class="fa fa-eye" aria-hidden="true"></i>
          </a>
        </td>
        <td>
          <a href="{{ route('kunden.edit', ['user' => $user->id]) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i>  
            
          </a> @if($user->status =='0') <a href="{{ route('kunden.activate', ['user' => $user->id]) }}" class="mt-2 btn btn-success">Activate</a> @else <a href="{{ route('kunden.deactivate', ['user' => $user->id]) }}" class="mt-2 btn btn-info">Deactivate</a> @endif
          {{-- <a href="{{ route('kunden.delete', $user->id) }}" class="btn btn-danger">
            <i class="fa fa-trash"></i> --}}
            <form method="DELETE" class="mt-2" action="{{ route('kunden.delete', $user->id) }}">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-danger confirm-button" ><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr> @endforeach </tbody>
  </table>
</div>
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
  $('#userTable').DataTable({
    responsive: true
  });
});
</script>

@endsection