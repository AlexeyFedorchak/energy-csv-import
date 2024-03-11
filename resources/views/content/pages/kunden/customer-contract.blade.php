@extends('layouts.layoutMaster')

@section('title', 'Kundendetails')

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

.kundan-content .edit_btn a.btn {
    background: #0076bb;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
}

.kundan-content .edit_btn {
    text-align: end;
    display: inline-block;
    margin-bottom: 8px;

    }

    .kundan-content .flex_btn {
    text-align: end;
}

</style>

@section('content')



<div class="">
        <div class="section-one">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="kundandetan">
                        <h2 class="kundan-head">Kundendaten</h2>

                    </div>
                    <div class="kundan-content">

                      <div class="flex_btn">
                        <div class="edit_btn"><a class="btn" href="{{route('kunden.edit', ['user' => $user->id])}}">Edit</a></div>
                        <div class="edit_btn"><a class="btn" href="{{route('vertraege.contract',['user'=>$user->id])}}">Add</a></div>
                    </div>
                        <div class="kun-content-para">
                            <p class="frau-para">{{$user->name}} {{ $user->nachname }}</p>
                            <p class="frau-para">{{$user->email}}</p>
                            <p class="frau-para">{{$user->tel_number}}</p>
                            <p class="frau-para">{{ $user->street }}, {{ $user->house_number }}
    @if(!empty($user->stairs))/{{ $user->stairs }}@endif
    @if(!empty($user->door))/ {{ $user->door }}@endif
    , {{ $user->plz }} {{ $user->location }}</p>
    <p>Lieferadresse: @if(!empty($user->diff_street))
        {{ $user->diff_street }},
        @else
        Keine Lieferadresse eingegeben
    @endif 
    @if(!empty($user->diff_house_number)){{ $user->diff_house_number }}@endif
    @if(!empty($user->diff_stairs))
        /{{ $user->diff_stairs }}
    @endif
    @if(!empty($user->diff_door))
        /{{ $user->diff_door }}
    @endif
    @if(!empty($user->diff_plz)), {{ $user->diff_plz }}@endif 
    @if(!empty($user->diff_location)) {{ $user->diff_location }}@endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="kundandetan">
                        <h2 class="kundan-head">Kundennotizen</h2>
                        <i class="fa-solid fa-plus kundan-icon" onclick="showPopup(this)"></i>
                    </div>
                    <div class="kundan-content" id="kundan-content">
                        
                       @foreach($comment as $comm)
                      <div class="row">
                      <div class="col-md-12">{{$comm->comment}}</div>
                 
                  </div>
                      <div class="row ">
                     <div class="col-md-12" style="font-size: .7rem;display: inline-block;text-align: right;">{{$comm->name}}<br>{{date('d-m-Y H:i:s', strtotime($comm->created_at));}}</div> 
                     
                      </div>
                       
                       @endforeach


                    <div class="row mt-2">
                        
                        <a  href="{{ route('comments', ['user' => $user->id]) }}">
                        @if(!empty($comm->comment))<button class="btn btn-primary" style="float: inline-end;">Ältere Kommentare</button> @else @endif</div>


                        </a>

                       
                    </div>
                </div>
            </div>


</div>






<h5 class="kundandetan">Verträge</h5>

<table id="userTable" class="display">
    <thead>
        <tr>
            
            <th>S.No</th>
            <th>Vertragstyp</th>  
            <th>Customer Name</th>
            <th>Strom</th>
           
          
        </tr>
    </thead>
    <tbody>
        @foreach ($getData as $vertrag)
        <td>{{ $loop->iteration }}</td>
        <td>@if ($vertrag->vertragstyp === 1)
              <span>Strom</span>
            @elseif($vertrag->typ === 2)
              <span>Gas</span>
            @endif</td>
            <td>{{$user->name}}</td>
            <td>{{ $vertrag->jvb }} kwH</td>
       

                </tr>
           
        @endforeach
    </tbody>
</table>

</div>

 <div id="popup-kundan" class="popup">
        <div class="popup-content">
            <span id="close-popup" style="color: white" class="close-popup" onclick="hidePopup()"><i class="fa-solid fa-xmark"></i></span>
             <div class="kundandetan">
                        <h2 class="kundan-head">Comment</h2>

                    </div>
            <form method="POST" action="{{ route('kunden.comment', ['user' => $user->id]) }}">
                @csrf
                <div class="p-2">
                <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter your comment">
            </div>
            <div class="p-2">
                <div clas="btn float-right">
               <button type="submit" class="btn btn-primary">Save</button>
           </div>
           </div>
            </form>
        </div>
    </div>

    <script>
        function showPopup(icon) {
            const popup = document.getElementById('popup-kundan');
            popup.style.display = 'block';
        }

        function hidePopup() {
            const popup = document.getElementById('popup-kundan');
            popup.style.display = 'none';
        }
    </script>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>

@endsection
