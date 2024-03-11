<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vermittlernummer;
use App\Models\Lieferanten;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Auth;

class VermittlernummerController extends Controller
{
    public function index()
	{
	$rows = Vermittlernummer::all();
    return view('content.pages.vermittlernummern.index',compact('rows'));
	}
  	public function create()
	{
	$lieferantens = Lieferanten::all();
     $users = User::all(); 
    return view('content.pages.vermittlernummern.create',compact('lieferantens','users'));
	}
    public function store(Request $request)
    {
        $row = Vermittlernummer::create([
        	'user_id'=>$request->user_id,
          	'lieferanten_id'=>$request->lieferanten_id,
        	'vermittlernummer'=>$request->vermittlernummer
        ]);


        
        return redirect('/admin/vermittlernummer')->with('success', ' created successfully');
    }
    public function edit($id)
    {
        $row = Vermittlernummer::find($id);
      $lieferantens = Lieferanten::all();
     $users = User::all(); 
        return view('content.pages.vermittlernummern.edit', compact('row','lieferantens','users'));
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'lieferanten_id' => 'required',
        ]);
        $row = Vermittlernummer::find($id);
        if (!$row) {
            return redirect()->route('admin.vermittlernummer.index')->with('error', 'User not found');
        }

        $row->update([
           'user_id'=>$request->user_id,
          	'lieferanten_id'=>$request->lieferanten_id,
        	'vermittlernummer'=>$request->vermittlernummer
            // Update other fields here.
        ]);
        
        return redirect(route('admin.vermittlernummer.index'))->with('success', ' updated successfully');

    }
    public function destroy($id)
    {
        $remove = Vermittlernummer::find($id);
        $remove->delete();
        /*$dt = Carbon::now('Asia/Kolkata');

        $todayDate = $dt->toDayDateTimeString();
        // dd($todayDate);
        $user = Auth::user();
        $activityLogs = [
            'user_name' => $user->name,
            'email' => $user->email,
            'date_time' => $todayDate,
            'activity' => 'deleted "FAQs" Id '.$remove->id. ' Question is' .$remove->question,
        ];

                DB::table('activity_logs')->insert($activityLogs);*/
        return redirect(route('admin.vermittlernummer.index'))->with('success', ' deleted successfully');

    }
}
