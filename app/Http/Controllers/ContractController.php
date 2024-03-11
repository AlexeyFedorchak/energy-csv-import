<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Auth;

class ContractController extends Controller
{
	public function index()
{
	$contract = Contract::all();


	return view('content.pages.admin.contract.index', ['contract' => $contract]);
}
	public function create()
	{
		return view('content.pages.admin.contract.create');
	}
	public function store(Request $request) 
	{
	// dd($request->all());
	$request->validate([
		
		'stromverbrauch' => 'nullable',
		'old_stromkosten' => 'nullable',
		'old_grundpreis' => 'nullable',
		'type' => 'nullable',
		'ZPNum' => 'nullable',
	]);

	$contract = Contract::create([
		'stromverbrauch' => $request->input('stromverbrauch'),
		'old_stromkosten' => $request->input('old_stromkosten'),
		'old_grundpreis' => $request->input('old_grundpreis'),
		
		'type' => $request->input('type'),
		'ZPNum' => $request->input('ZPNum'),
		
		]);

		$dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Add "Contract" Id '.$contract->id,
        ];

        DB::table('activity_logs')->insert($activityLogs);
	return redirect()->route('admin.contract')->with('success', 'Contract erfolgreich hinzugefügt!');
}

public function edit($id)
{
	// Check if the logged-in user has permission to edit the user
	 $tarifeData = Contract::find($id);
		return view('content.pages.admin.contract.edit', ['tarifeData' => $tarifeData]);
	
}

public function update(Request $request,$id)
    {
        $request->validate([
			'stromverbrauch' => 'nullable',
		'old_stromkosten' => 'nullable',
		'old_grundpreis' => 'nullable',
		'type' => 'nullable',
		'ZPNum' => 'nullable',
		]);

		$tarifeData = Contract::find($id);
		$tarifeData->update($request->all());
	

		$dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'updated "Contract" Id '.$tarifeData->id,
        ];

        DB::table('activity_logs')->insert($activityLogs);
        return redirect()->route('admin.contract')->with('success', 'Contract updated successfully.');
    }

	public function remove($id){
        $remove = Contract::find($id);
        $remove->delete();
		$dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'deleted "Contract" Id '.$remove->id,
        ];

        DB::table('activity_logs')->insert($activityLogs);
        return redirect()->route('admin.contract')->with(['success' => 'Contract Deleted successfully!']);
      }


}
