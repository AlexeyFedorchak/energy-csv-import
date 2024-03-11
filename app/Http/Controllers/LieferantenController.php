<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieferanten;
use DB;
use Carbon\Carbon;
use Auth;

class LieferantenController extends Controller
{
    public function index()
	{
	$rows = Lieferanten::all();
    return view('content.pages.lieferanten.index',compact('rows'));
	}
  	public function create()
	{
	$rows = Lieferanten::all();
    return view('content.pages.lieferanten.create',compact('rows'));
	}
    public function store(Request $request)
    {
      $request->validate([
            'name' => 'required|string',
           
        ]);
      Lieferanten::create([
      	'name'=>$request->name
      ]);
        
        return redirect('/admin/lieferanten')->with('success', ' created successfully');
    }
    public function edit($id)
    {
        $row = Lieferanten::find($id);
        return view('content.pages.lieferanten.edit', compact('row'));
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string',
           
        ]);
        $row = Lieferanten::find($id);
        if (!$row) {
            return redirect()->route('admin.lieferanten.index')->with('error', 'User not found');
        }

        $row->update([
            'name' => $request->input('name'),
          
            // Update other fields here.
        ]);
        
        return redirect(route('admin.lieferanten.index'))->with('success', 'updated successfully');

    }
    public function destroy($id)
    {
        $remove = Lieferanten::find($id);
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
        return redirect(route('admin.lieferanten.index'))->with('success', 'deleted successfully');

    }
}
