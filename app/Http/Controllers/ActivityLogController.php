<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ActivityLog;


class ActivityLogController extends Controller
{
    public function index(){
        $getData = DB::table('activity_logs')->latest()->get();
        // dd($getData);

        return view('content.pages.activity.index', ['getData'=>$getData]);
    }

    public function remove($id){


        $remove = ActivityLog::find($id);
        $remove->delete();
        return redirect()->route('admin.activitys')->with(['success' => 'Deleted successfully!']);
      }


   public function deleteAll(Request $request){
    $id = $request->id;
		foreach ($id as $user) 
		{
			ActivityLog::where('id', $user)->delete();
		}
    return redirect()->back();
   }   
}
