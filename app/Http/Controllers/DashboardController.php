<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team; // Import the Team model
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Http\Request;
use App\Models\Vertrag; 

class DashboardController extends Controller
{
    public function index()
{
    
    // Get the currently logged-in user
    $user = auth()->user();
    $userTeam = $user->teamid;
    $userId = $user->id;

    // Retrieve the team name
    $teamName = Team::where('id', $userTeam)->value('name');

    // Calculate total strom_kwh and gas_kwh for the team
    $totalStromKwh = DB::table('vertraege')
        ->where('team_id', $userTeam)
        ->sum('kwh_strom');

    $totalUserStromKwh = DB::table('vertraege')
        ->where('created_by', $userId)
        ->sum('kwh_strom');

    $totalGasKwh = DB::table('vertraege')
        ->where('team_id', $userTeam)
        ->sum('kwh_gas');

    $totalUserGasKwh = DB::table('vertraege')
        ->where('created_by', $userId)
        ->sum('kwh_gas');

    // Retrieve all usernames of users with matching conditions
    $matchingUsers = User::where('teamid', $userTeam)
        ->where('teamadmin', 1)
        ->get();

    // Extract the usernames from the collection
    $usernames = $matchingUsers->pluck('name')->toArray();

    $stromData = DB::table('vertraege')
    ->where('partnerid', $userId)
    ->orderBy('created_at')
    ->get(['created_at', 'kwh_strom'])
    ->map(function ($entry) {
        return [
            'date' => $entry->created_at,
            'value' => $entry->kwh_strom,
        ];
    });

$gasData = DB::table('vertraege')
    ->where('created_by', $userId)
    ->orderBy('created_at')
    ->get(['created_at', 'kwh_gas'])
    ->map(function ($entry) {
        return [
            'date' => $entry->created_at,
            'value' => $entry->kwh_gas,
        ];
    });

    $stufe = $user->stufe;

    $ldate = date('Y-m-d');
   


    
   $vertraege = Vertrag::

        select('vertraege.*','users.name as created_by','kundens.name as name')
        ->join('users','vertraege.created_by','users.id')
        ->join('kundens','vertraege.name','kundens.id')
        ->orderBy('vertragsdauer','asc')
         ->where('vertraege.created_by',auth()->user()->id)
         ->limit(3)
        ->get();

    return view('dashboard', [
        'totalStromKwh' => $totalStromKwh,
        'totalGasKwh' => $totalGasKwh,
        'totalUserStromKwh' => $totalUserStromKwh,
        'totalUserGasKwh' => $totalUserGasKwh,
        'usernames' => $usernames,
        'teamName' => $teamName ?: 'Noch nicht gesetzt, kontaktiere deinen Team-Lead!',
        'stromData' => $stromData,
        'gasData' => $gasData,
        'stufe' => $stufe,
        'vertraege' => $vertraege,
        'ldate' => $ldate,
    ]);
}
}
