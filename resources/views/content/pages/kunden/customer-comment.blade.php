@extends('layouts.layoutMaster')

@section('title', 'Kundenkommentare')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<style type="text/css">
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #e6e7eb;;
}

.section-one {
   
    margin-bottom: 40px;
}

.kundandetan {
    background-color: #0e72c0;
    border-radius: 10px 10px 0px 0px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #f1f1f1;
    font-weight: 500;
    font-weight: 500;
    padding: 12px 15px;
}
h2.kundan-head {
    font-size: 27px;
    margin-bottom: 0;
    color: #f1f1f1;
}

i.kundan-icon {
    cursor: pointer;
    background: #04c98d;
    padding: 7px 10px;
}
i.aufra-icon {
    cursor: pointer;
    background: #f37f41;
    padding: 7px 10px;
}
.kundan-content {
    padding: 10px 20px;
    background: #ffffff;
    border-radius: 0px 0px 10px 10px;
}
#kundan-content{
    min-height: 180px;
}

.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    /* padding: 20px; */
    border-radius: 5px;
    width: 58%;
}

.close-popup {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
h2.test-color {
    padding: 10px 20px;
}
h2#test-color {
    background-color: #2b78be;
}
.auftra-content {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #444444;
}
p.auftra-para {
    color: #444647;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 7px;
}
</style>

@section('content')



<h5 class="kundandetan"> Alle Notizen</h5>

<table id="userTable" class="display">
    <thead>
        <tr>
            
            <th>Nummer</th>
            <th>Notiz</th>  
            <th>Verfasst von</th>
            <th>Datum und Uhrzeit</th>
            
           
          
        </tr>
    </thead>
    <tbody>
        @foreach ($comment as $comm)
        <td>{{ $loop->iteration }}</td>
       
            <td>{{$comm->comment}}</td>
            <td>{{$comm->name}}</td>
            <td>{{date('d.m.Y - H:i', strtotime($comm->created_at));}}</td>
       

                </tr>
           
        @endforeach
    </tbody>
</table>

</div>



   
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>

@endsection
