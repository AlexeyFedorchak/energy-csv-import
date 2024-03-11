@extends('layouts/layoutMaster')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Heute Hinzugfügte Websites</h1>

<!-- Include DataTables CSS and JavaScript via CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.10/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>

<!-- Add a unique id to the table -->
<table class="table" id="websites-datatable">
</table>

<script>
    $(document).ready(function() {
        $('#websites-datatable').DataTable({
            "processing": true, // Show loading indicator
            "serverSide": false, // Fetch data on the client side
            "data": @json($websites), // Pass the data from PHP to DataTables
            "columns": [
                { "data": "id", "title": "ID" },
                { "data": "url", "title": "URL" },
                { "data": "user_name", "title": "User Name" },
                { 
                    "data": null,
                    "title": "Action",
                    "render": function(data, type, row) {
                        return '<a href="{{ route("admin.editWebsite", "") }}/' + data.id + '" class="btn btn-primary">View Details</a>';
                    }
                }
            ]
        });
    });
</script>

@endsection
