<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Auth;

class TeamController extends Controller
{
    public function index()
    {
        // Retrieve users whose teamid matches the logged-in user's teamid and are active
        $users = User::where('id', auth()->user()->teamid)
             ->where('active', 1)
             ->orderBy('created_at','desc')
             ->get();
        
        // Retrieve the team name for the logged-in user's team
        $teamName = Team::where('id', auth()->user()->teamid)->value('name');

        return view('content.pages.team.index', ['users' => $users, 'teamName' => $teamName]);
    }
    public function deactivated()
    {
        // Retrieve users whose teamid matches the logged-in user's teamid and are active
        $users = User::where('id', auth()->user()->teamid)
            ->where('active', 0)
            ->get();
        
        // Retrieve the team name for the logged-in user's team
        $teamName = Team::where('id', auth()->user()->teamid)->value('name');

        return view('content.pages.team.deactivated', ['users' => $users, 'teamName' => $teamName]);
    }

    public function create()
    {
        return view('content.pages.team.add-member');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
     
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'admin' => 'required|in:yes,no',
        ]);

        $user = new User();
       
        $user->name = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['admin'] === 'yes' ? 2 : 0;
        $user->teamid = auth()->user()->teamid;

        $user->save();

        $dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Add "Team" Id '.$user->id. ' Username ' .$request->username,
        ];

        DB::table('activity_logs')->insert($activityLogs);

        return redirect()->route('team.index')->with('success', 'Team member added successfully.');
    }

    public function edit($id)
    {
        // Check if the logged-in user has permission to edit the user
        // if (auth()->user()->teamadmin == 1) {
        //     return view('content.pages.team.edit', ['user' => $user]);
        // } else {
        //     // Handle unauthorized access
        //     abort(403, 'Unauthorized action');
        // }

        $user = User::find($id);
        
            return view('content.pages.team.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->admin);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'admin' => 'required',
        ]);

        $user = User::find($id);
        // dd($user);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found');
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'teamadmin' => $request->input('admin'),

            // Update other fields here.
        ]);
        
        // Update the user's details here

        return redirect()->route('team.index')->with('success', 'User updated successfully.');
    }

    public function deactivate(User $user)
    {
        // Deactivate the user here (e.g., set the 'active' flag to 0)
        $user->active = 0;
        $user->save();

        return redirect()->route('team.index')->with('success', 'User deactivated successfully.');
    }
}
