<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Models\Tarife;
use App\Models\GroupTeam;
use App\Models\GroupTariff;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Auth;

class GroupController extends Controller
{
    public function index()
    {
        // Retrieve users whose teamid matches the logged-in user's teamid and are active
        $groups = Group::orderBy('created_at','desc')
             ->get();
        
        // Retrieve the team name for the logged-in user's team
        //$teamName = Team::where('teamid', auth()->user()->teamid)->value('name');

        return view('content.pages.groups.index', ['groups' => $groups]);
    }
    public function deactivated()
    {
        // Retrieve users whose teamid matches the logged-in user's teamid and are active
        $groups = Group::get();
        
        // Retrieve the team name for the logged-in user's team
        $teamName = Team::where('teamid', auth()->user()->teamid)->value('name');

        return view('content.pages.groups.deactivated', ['groups' => $groups, 'teamName' => $teamName]);
    }

    public function create()
    {
        $teams = Team::all();
      	$tariffs = Tarife::all();
        return view('content.pages.groups.create',['teams'=>$teams,'tariffs'=>$tariffs]);
    }

    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|unique:groups,name', 
          	"teams.*"=> "required",

        ]);
      
      	$row = Group::create([
        	'name'=>$request->name,
        	'api_key'=>bin2hex(random_bytes(32))

        ]);
      foreach($request->teams as $team){
       
			GroupTeam::create([
        		'group_id'=>$row->id,
          		'team_id'=>$team
        	]);
        }
      foreach($request->tariffs as $tariff){
       
			GroupTariff::create([
        		'group_id'=>$row->id,
          		'tariff_id'=>$tariff
        	]);
        }
        
        return redirect()->route('groups.index')->with('success', 'Group added successfully.');
    }

    public function edit($id)
    {
        
		$teams = Team::all();
        $tariffs = Tarife::all();
      	$row = Group::find($id);
        return view('content.pages.groups.edit',compact('row','teams','tariffs'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->admin);
        $request->validate([
            
            'name' => 'required|unique:groups,name,' . $id,
            
        ]);

        $row = Group::find($id);
        // dd($user);

        if (!$row) {
            return redirect()->route('groups.index')->with('error', 'Group not found');
        }

        $row->update([
            'name' => $request->input('name'),
            //'api_key'=>bin2hex(random_bytes(32))
            // Update other fields here.
        ]);
        GroupTeam::where('group_id',$id)->delete();
      	GroupTariff::where('group_id',$id)->delete();
        foreach($request->teams as $team){
       
			GroupTeam::create([
        		'group_id'=>$id,
          		'team_id'=>$team
        	]);
        }
      	foreach($request->tariffs as $tariff){
       
			GroupTariff::create([
        		'group_id'=>$id,
          		'tariff_id'=>$tariff
        	]);
        }
        // Update the user's details here

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    public function deactivate(Group $group)
    {
        // Deactivate the user here (e.g., set the 'active' flag to 0)
        $group->active = 0;
        $group->save();

        return redirect()->route('groups.index')->with('success', 'Group deactivated successfully.');
    }
}
