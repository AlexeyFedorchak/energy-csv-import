@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-5">
        <h1>Willkommen beim Admin Dashboard V1.0</h1>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Downloads</h5>
                        <p class="card-text">Manage und organisiere Downloads.</p>
                        <a href="{{ route('admin.downloads') }}" class="btn btn-primary">Downloads</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Frequently Asked Questions</h5>
                        <p class="card-text">Hier findest du unsere meist-gefragten Fragen!</p>
                        <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Seiten Einstellung</h5>
                        <p class="card-text">Manage hier Seiten Einstellungen und Konfigurationen.</p>
                        <a href="{{ route('admin.site-settings.index') }}" class="btn btn-primary">Seiten Einstellung</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Importe</h5>
                        <p class="card-text">Importiere CSV und füge Sie der Datenbank hinzu.</p>
                        <a href="{{ route('admin.import') }}" class="btn btn-primary">Importe</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mitarbeiter Einstellungen</h5>
                        <p class="card-text">Manage Mitarbeiter Einstellungen und Konfigurationen.</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Mitarbeiter Einstellungen</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Team Einstellungen</h5>
                        <p class="card-text">Manage Team Einstellungen und Konfigurationen.</p>
                        <a href="{{ route('admin.teams') }}" class="btn btn-primary">Team Einstelllungen</a>
                    </div>
                </div>
            </div>
        </div>
            <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tarif Einstellungen</h5>
                        <p class="card-text">Manage Tarife.</p>
                        <a href="{{ route('admin.tarife') }}" class="btn btn-primary">Tarif Einstellungen</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contract settings</h5>
                        <p class="card-text">Manage Contract here</p>
                        <a href="{{ route('admin.contract') }}" class="btn btn-primary">Go to Contract Settings</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Aktivitäten</h5>
                        {{-- <p class="card-text">Manage Tarife here</p> --}}
                        <a href="{{ route('admin.activitys') }}" class="btn btn-primary">Aktivitäten</a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contract settings</h5>
                        <p class="card-text">Manage Contract here</p>
                        <a href="{{ route('admin.contract') }}" class="btn btn-primary">Go to Contract Settings</a>
                    </div>
                </div>
            </div> --}}
        </div>
        
        </div>
    </div>
@endsection
