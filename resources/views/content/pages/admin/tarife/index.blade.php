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
        <h2>Tarifliste</h2>
        
        <div class="btn-group">
            <a href="{{ route('admin.dashboard') }}" class=""><button class="btn btn-secondary me-2">Zurück zum Admin Panel</button></a>
            <a href="{{ route('admin.tarife.create') }}" ><button class="btn btn-primary  ">Erstellen</button></a>
        </div>
    </div>
    <table id="teams-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarif</th>
                <th>Firma</th>
                <th>Preis</th>
                <th>Grundpreis</th>
                <th>Typ</th>
                <th>Provision</th>
                <th>Energietyp</th>
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarife as $tarif)
            <tr>
                <td>{{ $tarif->id }}</td>
                <td>{{ $tarif->tarife }}</td>
                <td>{{ $tarif->firma }}</td>
                <td>{{ $tarif->preis }}</td>
                <td>{{ $tarif->grundpreis }}</td>
                <td>{{ $tarif->type }}</td>
                <td>{{ $tarif->prov }}</td>
                <td>{{ $tarif->contract_type }}</td>
                <td>
          <a href="{{route('admin.tarife.edit',$tarif->id)}}" class="btn btn-primary">
            <i class="fas fa-edit"></i>  
            
          </a> 
          
            <form class="d-inline" method="DELETE" action="{{ route('tarife.delete', $tarif->id) }}">
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