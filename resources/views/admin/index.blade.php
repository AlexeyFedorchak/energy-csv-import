@extends('layouts/layoutMaster')

@section('title', 'Admin Dashboard')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#websites-table').DataTable({
            "paging": false, // Remove pagination
        });

        $('#users-table').DataTable({
            "paging": false, // Remove pagination
        });
    });
</script>
@endsection

@section('content')
<h1>Admin Dashboard</h1>
<div class="container">
    <!-- New Websites Added Today -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            New Websites Added Today <a href="{{ route('admin.todaysWebsites') }}"><span class="badge bg-primary">{{ $todayWebsitesCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <!-- Pending Websites -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            Pending Websites <a href="{{ route('admin.pendingWebsites') }}"><span class="badge bg-primary">{{ $pendingWebsitesCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <!-- Accepted Websites -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            Accepted Websites <a href="{{ route('admin.acceptedWebsites') }}"><span class="badge bg-primary">{{ $acceptedWebsitesCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div> <!-- End of Row -->
    <br>
    <!-- Blocked Websites -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            Blocked Websites <a href="{{ route('admin.blockedWebsites') }}"><span class="badge bg-primary">{{ $blockedWebsitesCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <!-- Withdrawal Requests -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            Withdrawal Requests <a href="{{ route('admin.withdrawalRequests') }}"><span class="badge bg-primary">{{ $withdrawalRequestsCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <!-- Users Registered Today -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            Users Registered Today <a href="{{ route('admin.todaysUsers') }}"><span class="badge bg-primary">{{ $usersRegisteredTodayCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div> <!-- End of Row -->
    <br>
    <!-- All Users -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        
                            All Users <a href="{{ route('admin.allUsers') }}"><span class="badge bg-primary">{{ $allUsersCount }}</span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    </div> <!-- End of Row -->
</div>



@endsection
