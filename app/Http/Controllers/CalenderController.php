<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Models\Kunden;
use App\Models\Comment;
use App\Models\Vertrag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CalenderController extends Controller
{
    public function index()
    {
        // dd($getData);
        // $kundenName = Kunden::where('kundenid', auth()->user()->kundenid)->value('name');

        $contractEndDates = Vertrag::select('kundens.name','vertraege.vertragsdauer','vertraege.id')
          ->join('kundens', 'kundens.id', '=', 'vertraege.name')
          ->where('vertraege.team_id',auth()->user()->teamid)->get();

        //echo "<pre>"; print_r($contractEndDates); die();
		$appointments=[];
        // dd($contractEndDates);
 		/*$events = [];
 
        $appointments = Appointment::with(['client', 'employee'])->get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->client->name . ' ('.$appointment->employee->name.')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        }*/
        return view('content.pages.calender.calender', compact('contractEndDates','appointments'));
    }
 
   


}
