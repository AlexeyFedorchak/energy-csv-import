@extends('layouts.layoutMaster')



@section('title', 'Team')



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



@section('content')

<h5 class="card-title">Groups </h5>
@if ($message = Session::get('success'))

<div class="alert alert-success">
    
    <p>{{$message}}</p>
</div>

@endif


<div class="text-end mb-3">
<a href="{{ route('groups.create') }}" class="btn btn-primary">Neue Group hinzufügen</a>
    

</div>



<table id="userTable" class="display">

    <thead>

        <tr>
          <th>SL.No</th>
            <th>Name</th>
			<th>Teams</th>
            <th>Tariffs</th>
          	<th>Api Key</th>

            <!-- Add other user data columns as needed -->

            

                <th>Actions</th>

            

        </tr>

    </thead>

    <tbody>

        @foreach ($groups as $key=>$group)

            

                <tr>
                  <td>{{++$key}}</td>
                    <td>{{ $group->name }}</td>
					<td>{{Helper::groupTeams($group->id)}}</td>
					<td>{{Helper::groupTariffs($group->id)}}</td>
                  	<td>{{$group->api_key}}</td>
                    <!-- Add other user data columns as needed -->

                    

                    <td>

   						 <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary">Edit</a>

   						 

					</td>

                    

                </tr>

            

        @endforeach

    </tbody>

</table>



<script>

    $(document).ready(function() {

        $('#userTable').DataTable();

    });

</script>



@endsection

