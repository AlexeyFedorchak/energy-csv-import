@extends('layouts.layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>Seiten Einstellungen</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.site-settings.update') }}">
        @csrf
        <div class="form-group">
            <label for="site_name">Seiten Name</label>
            <input type="text" name="site_name" class="form-control" value="{{ $siteName }}" required>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="we_strom">Wien Energie Strompreis</label><a href="https://www.wienenergie.at/privat/produkte/strom/optima-entspannt/?options=SOPTB_0001-okopure-year" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fas fa-external-link-alt"></i></a>
                            <input type="text" name="we_strom" class="form-control" value="{{ $wienenergiestrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="we_gas">Wien Energie Gaspreis</label><a href="https://www.wienenergie.at/privat/produkte/erdgas/optima-entspannt/?options=GEOPTB__01-gaspure-year" target="_blank" class="btn btn-outline-secondary btn-sm"><i class="fas fa-external-link-alt"></i></a>
                            <input type="text" name="we_gas" class="form-control" value="{{ $wienenergiegas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="ens_strom">Enstroga Strompreis</label>
                            <input type="text" name="ens_strom" class="form-control" value="{{ $enstrogastrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ens_gas">Enstroga Gaspreis</label>
                            <input type="text" name="ens_gas" class="form-control" value="{{ $enstrogagas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gruen_strom">Grünwelt Strompreis</label>
                            <input type="text" name="gruen_strom" class="form-control" value="{{ $gruenstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gruen_gas">Grünwelt Gaspreis</label>
                            <input type="text" name="gruen_gas" class="form-control" value="{{ $gruengas }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="max_strom">MaxEnergy Stropreis</label>
                            <input type="text" name="max_strom" class="form-control" value="{{ $maxstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="max_gas">MaxEnergy Gaspreis</label>
                            <input type="text" name="max_gas" class="form-control" value="{{ $maxgas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="mon_strom">Montana Strompreis</label>
                            <input type="text" name="mon_strom" class="form-control" value="{{ $montanastrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="mon_gas">Montana Gaspreis</label>
                            <input type="text" name="mon_gas" class="form-control" value="{{ $montanagas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="oeko_strom">Ökostrom Strompreis</label>
                            <input type="text" name="oeko_strom" class="form-control" value="{{ $oekostrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="oeko_gas">Ökostrom Gaspreis</label>
                            <input type="text" name="oeko_gas" class="form-control" value="{{ $oekogas }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="uwk_strom">Unsere Wasserkraft Strompreis</label>
                            <input type="text" name="uwk_strom" class="form-control" value="{{ $uwkstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="uwk_gas">Unsere Wasserkraft Gaspreis</label>
                            <input type="text" name="uwk_gas" class="form-control" value="{{ $uwkgas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="eon_strom">Eon Strompreis</label>
                            <input type="text" name="eon_strom" class="form-control" value="{{ $eonstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="eon_gas">Eon Gaspreis</label>
                            <input type="text" name="eon_gas" class="form-control" value="{{ $eongas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="gg_strom">Goldgas Strompreis</label>
                            <input type="text" name="gg_strom" class="form-control" value="{{ $goldgasstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gg_gas">Goldgas Gaspreis</label>
                            <input type="text" name="gg_gas" class="form-control" value="{{ $goldgasgas }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="go_strom">GoGreenEnergy Strompreis</label>
                            <input type="text" name="go_strom" class="form-control" value="{{ $gostrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="go_gas">GoGreenEnergy Gaspreis</label>
                            <input type="text" name="go_gas" class="form-control" value="{{ $gogas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="ver_strom">Verbund Strompreis</label>
                            <input type="text" name="ver_strom" class="form-control" value="{{ $verbundstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ver_gas">Verbund Gaspreis</label>
                            <input type="text" name="ver_gas" class="form-control" value="{{ $verbundgas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="switch_strom">Switch Strompreis</label>
                            <input type="text" name="switch_strom" class="form-control" value="{{ $switchstrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="switch_gas">Switch Gaspreis</label>
                            <input type="text" name="switch_gas" class="form-control" value="{{ $switchgas }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="erste_strom">Erste Energie Strompreis</label>
                            <input type="text" name="erste_strom" class="form-control" value="{{ $erstestrom }}" required>
                        </div>
                        <div class="form-group">
                            <label for="erste_gas">Erste Energie Gaspreis</label>
                            <input type="text" name="erste_gas" class="form-control" value="{{ $erstegas }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="graspreis">1 Gramm Cannabis Preis</label>
                            <input type="text" name="graspreis" class="form-control" value="{{ $graspreis }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kokspreis">1 Gramm Koks Preis</label>
                            <input type="text" name="kokspreis" class="form-control" value="{{ $kokspreis }}" required>
                        </div>
                    </div>
                </div>
            <!-- Repeat the above block for the remaining fields -->
        </div>
        <button type="submit" class="btn btn-primary">Update Site Name</button>
    </form>
</div>
@endsection
