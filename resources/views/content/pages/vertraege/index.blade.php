@extends('layouts.layoutMaster')

@section('title', 'Verträge')
@section('content')
  <div id="wrapper_vertraege_list">
    <h5 class="card-title">Verträge im Team {{ $teamName }}:</h5>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    <div class="text-end mb-3">
      <a href="{{ route('vertraege.contract') }}" class="btn btn-primary">Neuen Vertrag Hinzufügen</a>
    </div>
    <table id="vertragTable" class="display">
      <thead>
      <tr>
        <th>Typ</th>
        <th>Name</th>
        <th>Strom</th>
        <th>Gas</th>
        <th>Inhaber</th>
        <th>Ersteller</th>
        <th>Status</th>
        <th>Liefertermin</th>
        <th>Erstellt</th>
        <th>Aktion</th>
        <!-- Add other user data columns as needed -->
      </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        @foreach($vertraege as $vertrag)
          @if($vertrag->partnerid == $user->id)
            <tr>
              <td>@if ($vertrag->vertragstyp === 1)
                  <span>Strom</span>
                @elseif($vertrag->vertragstyp === 2)
                  <span>Gas</span>
                @endif
              </td>
              <td>{{ $vertrag->name }}</td>
              <td>@if ($vertrag->vertragstyp === 1)
                  <span>{{ $vertrag->jvb }}</span>
                @elseif($vertrag->vertragstyp === 2)
                  <span></span>
                @endif</td>
                <td>@if ($vertrag->vertragstyp === 2)
                  <span>{{ $vertrag->jvb }}</span>
                @elseif($vertrag->vertragstyp === 1)
                  <span></span>
                @endif</td>
              <td>{{ $user->name}}</td>
              <td>{{ $vertrag->created_by }}</td> <!-- Display the user's name -->
              <td>
                @if ($vertrag->status === 0 || is_null($vertrag->status))
                  <span style="background-color: orange; padding: 2px 5px;">Warten</span>
                @elseif($vertrag->status === 1)
                  <span style="background-color: lightblue; padding: 2px 5px;">Unvollendet</span>
                @elseif($vertrag->status === 2)
                  <span style="background-color: lightgreen; padding: 2px 5px;">Akzeptiert</span>
                @elseif($vertrag->status === 3)
                  <span style="background-color: red; padding: 2px 5px;">Abgelehnt</span>
                @else
                @endif
              </td>
              <td>{{ $vertrag->liefertermin }}</td>
              <td>{{ $vertrag->created_at }}</td>
              <td>
                <a href="{{ route('vertraege.edit', $vertrag->id) }}" class="btn btn-primary">Bearbeiten</a>
                <a href="{{ route('vertraege.pdf', ['id' => $vertrag->id]) }}" class="btn btn-danger">PDF</a>
              </td>
            </tr>
          @endif
        @endforeach
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
@section('page-script')
  <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset(mix('assets/js/pages/vertraege.js')) }}"></script>
@endsection
@section('page-style')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
@endsection
