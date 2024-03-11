@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#teams-table').DataTable(); // Replace 'teams-table' with the ID of your table
    });
</script>
@section('content')
@if ($message = Session::get('success'))

            <div class="alert alert-success">
                
                <p>{{$message}}</p>
            </div>

            @endif
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Tarife List</h2>
        
        <div class="btn-group">
            <a href="{{ route('admin.dashboard') }}" class=""><button class="btn btn-secondary me-2">Back to Admin Panel</button></a>
            <a href="{{ route('admin.contract.create') }}" ><button class="btn btn-primary  ">Create</button></a>
        </div>
    </div>
    <table id="teams-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Stromverbrauch</th>
                <th>Stromkosten</th>
                <th>Grundpreis</th>
                <th>ZPNum</th>
                <th>Type</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contract as $tarif)
            <tr>
                <td>{{ $tarif->id }}</td>
                <td>{{ $tarif->stromverbrauch }}</td>
                <td>{{ $tarif->old_stromkosten }}</td>
                <td>{{ $tarif->old_grundpreis }}</td>
                <td>{{ $tarif->ZPNum }}</td>
                <td>{{ $tarif->type }}</td>
                
                <td>
          <a href="{{route('admin.contract.edit',$tarif->id)}}" class="btn btn-primary">
            <i class="fas fa-edit"></i>  
            
          </a> 
          
            <form class="d-inline" method="DELETE" action="{{ route('contract.delete', $tarif->id) }}">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="btn btn-danger confirm-button" ><i class="fa fa-trash"></i></button>
          </form>
        </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection