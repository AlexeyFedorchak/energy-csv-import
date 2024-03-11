<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Auth;
use Exception;


class AdminTeamsController extends Controller
{
	public function index()
{
	$teams = Team::all();
	$teamAdmins = [];
	foreach ($teams as $team) {
		$team->admins = User::where('teamadmin', 1)
					->where('teamid', $team->id)
					->get();
	$teamAdmins[$team->id] = $team->admins;

	}

	return view('content.pages.admin.teams.index', ['teams' => $teams, 'teamAdmins' => $teamAdmins]);
}
	public function create()
	{
    	$allUsers = User::all(); // Get all users for the dropdown
    	// Now you have $team->users that contains all users related to this team
    	return view('content.pages.admin.teams.create', [
        'users' => $allUsers
    ]);

	}
	public function store(Request $request) 
	{
	
	$request->validate([
		'name' => 'required|string|max:255',
	]);

	$team = Team::create([
		'name' => $request->input('name'),
		'is_active' => 1,
		]);

		if ($request->has('users')) {
			$userIds = $request->input('users');
			// Update the 'team_id' for each selected user
			User::whereIn('id', $userIds)->update(['teamid' => $team->id]);
		}

		$dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Add "Team" Id '.$team->id. ' Name ' .$request->name,
        ];

        DB::table('activity_logs')->insert($activityLogs);
	return redirect()->route('admin.teams.create')->with('success', 'Team erfolgreich hinzugefügt!');
}

public function edit($id)
{
    $team = Team::with('users')->findOrFail($id); // Assuming 'users' is the relationship method name
    $allUsers = User::all(); // Get all users for the dropdown
    // Now you have $team->users that contains all users related to this team
    return view('content.pages.admin.teams.edit', [
        'team' => $team, 
        'users' => $allUsers
    ]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'users' => 'nullable|array',
        // Note: Removed the 'is_active' validation rule since it's a checkbox and won't be present in the request if unchecked.
    ]);

    $team = Team::findOrFail($id);

    // Begin a transaction to ensure database consistency
    DB::beginTransaction();
    try {
        // Update the team, ensuring 'is_active' is handled correctly
        $team->name = $request->input('name');
        $team->is_active = $request->has('is_active'); // This will be true or false based on the checkbox
        $team->save();

        // Assuming 'teamid' is the correct column on your users table:
        // Detach all users from the team first (set their teamid to null)
        User::where('teamid', $team->id)->update(['teamid' => null]);

        // Attach selected users to the team (set their teamid to the team's id)
        if ($request->has('users')) {
            User::whereIn('id', $request->input('users'))->update(['teamid' => $team->id]);
        }

        // Commit the transaction
        DB::commit();

        return redirect()->route('admin.teams')->with('success', 'Team erfolgreich aktualisiert!');
    } catch (\Exception $e) {
        // An error occurred; cancel the transaction...
        DB::rollback();
        // Use dd($e) to dump the error details during development
        dd($e);
        // After debugging, change the above line to log the error or return an appropriate error message
        return redirect()->route('admin.teams.edit', $team->id)->with('error', 'Fehler beim Aktualisieren des Teams.');
    }
}


public function deactivate($id)
{
    $team = Team::findOrFail($id);
    $team->update(['is_active' => false]);

    // Log activity or perform other actions

    return redirect()->route('admin.teams.index')->with('success', 'Team erfolgreich deaktiviert!');
}
}
