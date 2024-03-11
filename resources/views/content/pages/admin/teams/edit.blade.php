@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<div class="container">
  <h2>Team <i>{{ $team->name }}</i> (ID: {{ $team->id }}) bearbeiten</h2>
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  <form action="{{ route('admin.teams.update', $team->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Team ID</label>
                  <input type="text" class="form-control" value="{{ $team->id }}" readonly
                    style="background-color: #e9ecef;">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Team Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Status</label><br>
                  <div class="switch-container">
                    <label class="switch">
                      <input type="checkbox" id="is_active" name="is_active" {{ $team->is_active ? 'checked' : '' }}>
                      <span class="slider round"></span>
                    </label>
                    <span id="statusText" class="status-text">{{ $team->is_active ? 'Aktiv' : 'Inaktiv' }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="users">Teammitglieder</label>
                  <select id="users" name="users[]" class="form-control" multiple>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $team->users->contains($user) ? 'selected' : '' }}>
                      {{ $user->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Speichern</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/choices.js"></script>
<script>
  // Initialize Choices on the select element
  const element = document.getElementById('users');
  const choices = new Choices(element, {
    removeItemButton: true,
  });

  // Toggle switch label update
  document.getElementById('is_active').addEventListener('change', function () {
    document.getElementById('statusText').textContent = this.checked ? 'Aktiv' : 'Inaktiv'; // Update the label text
  });

</script>
<style>
  /* Custom CSS for the Toggle Switch */
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .switch-container {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .status-text {
    margin-left: 10px;
    /* Adjust as needed */
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
  }

  input:checked+.slider {
    background-color: #2196F3;
  }

  input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }

</style>
@endsection
