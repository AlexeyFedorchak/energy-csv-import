<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vertrag; 
use App\Models\Kunden; 

use DB;

class CommissionController extends Controller
{
    public function index()
    { 
        $role = auth()->user()->role;
        
        $team = auth()->user()->teamadmin;
        
       
        if ($role == '1') {
        

             $vertraege = Vertrag::selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

            $total['vertrage'] = Vertrag::count();  
            
            $total['team'] = Team::count();
            $total['user'] = User::count();
            // dd($total['user']);
            $total['strom'] = Vertrag::sum('kwh_strom');
            $total['gas'] = Vertrag::sum('kwh_gas');
            $total['sumcommission'] = Vertrag::sum('commission');
            // dd($total['sumcommission']);

          $teams = Vertrag::join('teams', 'vertraege.team_id', '=', 'teams.id')
            ->selectRaw('vertraege.team_id,teams.name as team_name, count(vertraege.id) as count, SUM(vertraege.kwh_strom) as kwh_strom,SUM(vertraege.kwh_gas) as kwh_gas,SUM(vertraege.commission) as team_commission')
            ->groupBy('team_name','team_id')
            ->orderBy('count')
            ->get();
// dd($teams);  
          $users = Vertrag::join('users', 'vertraege.created_by', '=', 'users.id')
            ->selectRaw('users.name as user_name,users.stufe as user_stufe, count(vertraege.id) as count, SUM(vertraege.kwh_strom) as kwh_strom,SUM(vertraege.kwh_gas) as kwh_gas,SUM(vertraege.commission) as user_commission')
            ->groupBy('user_name','user_stufe')
            ->orderBy('count')
            ->get();
            // dd($users);

// dd($vertraege,$teams,$users,$total);
             return view('content.pages.reports.index',compact('vertraege','teams','users','total'));
            
        }
        elseif ($role == '2') { 
            

            $vertraege = Vertrag::selectRaw('DATE(created_at) as date, count(*) as count')
            ->where('team_id',auth()->user()->teamid)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

            $total['vertrage'] = Vertrag::where('team_id',auth()->user()->teamid)->count();
           
            $total['user'] = User::where('teamid',auth()->user()->teamid)->count();
            $total['strom'] = Vertrag::where('teamid',auth()->user()->teamid)->sum('kwh_strom');
            $total['gas'] = Vertrag::where('teamid',auth()->user()->teamid)->sum('kwh_gas');

          $teams = Vertrag::join('teams', 'vertraege.team_id', '=', 'teams.id')
            ->selectRaw('teams.name as team_name, count(vertraege.id) as count, SUM(vertraege.kwh_strom) as kwh_strom,SUM(vertraege.kwh_gas) as kwh_gas')
            ->where('vertraege.team_id',auth()->user()->teamid)
            ->groupBy('team_name')
            ->orderBy('count')
            ->get();

          $users = Vertrag::join('users', 'vertraege.created_by', '=', 'users.id')
            ->selectRaw('users.name as user_name, count(vertraege.id) as count, SUM(vertraege.kwh_strom) as kwh_strom,SUM(vertraege.kwh_gas) as kwh_gas')
            ->where('vertraege.team_id',auth()->user()->teamid)
            ->groupBy('user_name')
            ->orderBy('count')
            ->get();

             return view('content.pages.commission.index',compact('vertraege','teams','users','total'));
        }
        else{
            

            $vertraege = Vertrag::selectRaw('DATE(created_at) as date, count(*) as count')
            ->where('created_by',auth()->user()->id)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

            $total['vertrage'] = Vertrag::where('vertraege.created_by',auth()->user()->id)->count();
             $total['strom'] = Vertrag::where('vertraege.created_by',auth()->user()->id)->sum('kwh_strom');
            $total['gas'] = Vertrag::where('vertraege.created_by',auth()->user()->id)->sum('kwh_gas');
           

         

          $users = Vertrag::
            join('kundens', 'vertraege.name', '=', 'kundens.id')
            ->selectRaw('kundens.name as customer')
            ->where('vertraege.created_by',auth()->user()->id)

            
            ->get();

             return view('content.pages.reports.index',compact('vertraege','users','total'));

        }
        
          


      return view('content.pages.reports.index',compact('vertraege','teams','users','total'));
    }



   public function create()
{ 
 


    $getData = Kunden::all();
    
    $loggedInUser = Auth::user();
    $loggedInUserId = $loggedInUser->id; // Use $loggedInUser->id to get the user's ID
    $loggedInTeamId = $loggedInUser->teamid;
    $team = User::where('teamid', auth()->user()->teamid)->get();


    return view('content.pages.vertraege.add', ['partnerid' => $loggedInUserId, 'teamid' => $loggedInTeamId, 'getData' => $getData,'team' => $team]);
}


    public function store(Request $request)
{
    
     // $validatedData = $request;
    // Validate the input data
    $validatedData = $request->validate([
        'kundentyp' => 'required|integer', // Assuming kundentyp is an integer
        'partnerid' => 'required|integer', // Assuming kundentyp is an integer
        'vertragstyp' => 'required|integer', // Assuming vertragstyp is an array of checkboxes
        'energieanbieter' => 'required|integer', // Assuming energieanbieter is an integer
        'name' => 'required|string',
        
        'firmenbuchnummer' => 'nullable|string', // Assuming it's nullable
        'uid' => 'nullable|string', // Assuming it's nullable
        'lfbis' => 'nullable|string', // Assuming it's nullable
        'branche' => 'nullable|string', // Assuming it's nullable
        'unterzeichner' => 'required|string',
        'betreuer' => 'nullable|string', // Assuming it's nullable
        'handlingfee' => 'required|numeric|min:2.5|max:6.0',
        'kundenkennwort' => 'required|string',
        'mail' => 'required|email', // Assuming it's an email address
        'anmeldetyp' => 'required|integer', // Assuming anmeldetyp is an integer
        'bank' => 'required|string', // Assuming it's nullable
        'iban' => 'required|string', // Assuming it's nullable
        'bic' => 'required|string', // Assuming it's nullable
        'kontoinhaber' => 'required|string', // Assuming it's nullable
        //'zaehlpunktnummer' => 'required|string', // Assuming it's nullable
        'jvb' => 'required|string', // Assuming it's nullable
        'nb' => 'required|string', // Assuming it's nullable
        'aktuellerlieferant' => 'nullable|string', // Assuming it's nullable
        //'zpn' => 'nullable|string', // Assuming it's nullable
       // 'anummer' => 'nullable|string', // Assuming it's nullable
        'vertragsdauer' => 'nullable|date', // Assuming it's a date
    ]);

     $validatedData['zpn']=json_encode($request->zpn);
     $validatedData['zaehlpunktnummer'] =json_encode($request->zpn);
     $validatedData['anummer']=json_encode($request->anummer);
     $validatedData['created_by']=auth()->user()->id;
     $validatedData['team_id']=auth()->user()->teamid;

     // dd($validatedData);
    // Create a new Vertrag record
    Vertrag::create($validatedData);

    // Redirect to a success page or back to the form
    return redirect()->route('vertraege.create')->with('success', 'Vertrag added successfully');
}

public function getUserData(Request $request)
{ 
    
    $userId = $request->input('userId');
    // Fetch user data based on $userId
     
    // Example: Fetch user data from the User model
    $user = Kunden::find($userId);
  
    // Return user data HTML (replace this with your actual HTML structure)
    return $user;
}

public function pdf(Request $request, Vertrag $user)
{   dd($user);
    
    
}


}