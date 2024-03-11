<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use DB;
use Carbon\Carbon;
use Auth;

class AdminFaqController extends Controller
{
    public function create()
	{
	$faqs = Faq::all();
    return view('content.pages.admin.faq.create',compact('faqs'));
}
public function store(Request $request)
{
    
    // $request->validate([
    //     'question' => 'required|string',
    //     'answer' => 'required|string',
    // ]);
    // Faq::create($request->all());

    $faq = new Faq();
		$faq->question = $request->question;
        $faq->answer = $request->answer;
        

        $faq->save();


		$dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Add "FAQs" Id '.$faq->id. ' Question is ' .$request->question,
        ];

        DB::table('activity_logs')->insert($activityLogs);
    return redirect('/admin/fua')->with('success', 'FAQ created successfully');
}
public function edit($id)
{
    $faq = Faq::find($id);
    return view('content.pages.admin.faq.edit', compact('faq'));
}
public function update(Request $request, $id)
{
    //dd($request->all());
    $request->validate([
        'question' => 'required|string',
        'answer' => 'required|string',
    ]);
    $faq = Faq::find($id);
    if (!$faq) {
        return redirect()->route('admin.faq.create')->with('error', 'User not found');
    }

    $faq->update([
        'question' => $request->input('question'),
        'answer' => $request->input('answer'),
        // Update other fields here.
    ]);
    $dt = Carbon::now('Asia/Kolkata');

    $todayDate = $dt->toDayDateTimeString();
    // dd($todayDate);
    $user = Auth::user();
    $activityLogs = [
        'user_name' => $user->name,
        'email' => $user->email,
        'date_time' => $todayDate,
        'activity' => 'updated "FAQs" Id '.$faq->id. ' Name ' .$request->question,
    ];
            
            DB::table('activity_logs')->insert($activityLogs);
    // $faq->update($request->all());
    return redirect(route('admin.faq.create'))->with('success', 'FAQ updated successfully');

}
public function destroy($id)
{
    $remove = Faq::find($id);
    $remove->delete();
    $dt = Carbon::now('Asia/Kolkata');

    $todayDate = $dt->toDayDateTimeString();
    // dd($todayDate);
    $user = Auth::user();
    $activityLogs = [
        'user_name' => $user->name,
        'email' => $user->email,
        'date_time' => $todayDate,
        'activity' => 'deleted "FAQs" Id '.$remove->id. ' Question is' .$remove->question,
    ];
            
            DB::table('activity_logs')->insert($activityLogs);
    return redirect(route('admin.faq.create'))->with('success', 'FAQ deleted successfully');

}
}
