<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Models\Kunden;
use App\Models\Comment;
use App\Models\Vertrag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Auth;

class KundenController extends Controller
{
    public function index()
    {
       
       
        $getData = Kunden::orderBy('id', 'desc')->where("team_id",auth()->user()->teamid)->get();

        // dd($getData);
       
       
        // $kundenName = Kunden::where('kundenid', auth()->user()->kundenid)->value('name');

        return view('content.pages.kunden.index', ['getData'=>$getData]);
    }
    public function deactivated()
    {
        // Retrieve users whose kundenid matches the logged-in user's kundenid and are active
        $users = User::where('kundenid', auth()->user()->kundenid)
            ->where('active', 0)
            ->get();
        
        // Retrieve the team name for the logged-in user's team
        $kundenName = Kunden::where('kundenid', auth()->user()->kundenid)->value('name');

        return view('content.pages.kunden.deactivated', ['users' => $users, 'kundenName' => $kundenName]);
    }

    public function create()
    {
        return view('content.pages.kunden.add-member');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            // 'partnerid' => 'required|string|max:255',
            // 'name' => 'required|string|max:255',
            'vorname' => 'required',
            'type' => 'nullable',
            'nachname' => 'required',
            'anrede' => 'required',
            'title' => 'nullable',
            'street' => 'required',
            'dob' => 'required',
            'house_number' => 'nullable',
            'stairs' => 'nullable',
            'door' => 'nullable',
            'location' => 'required',
            'tel_number' => 'required',
            'postcode' => 'required',
            'email' => 'required|email',
            
        ]);

        $user = new Kunden();
        // $user->partnerid = $validatedData['partnerid'];
        // $user->name = $validatedData['name'];
        $user->name = $validatedData['vorname'];
        $user->nachname = $validatedData['nachname'];
        $user->type = $validatedData['type'];
        $user->anrede = $validatedData['anrede'];
        $user->title = $validatedData['title'];
        $user->street = $validatedData['street'];
        $user->dob = $validatedData['dob'];
        $user->house_number = $validatedData['house_number'];
        $user->stairs = $validatedData['stairs'];
        $user->door = $validatedData['door'];
        $user->location = $validatedData['location'];
        $user->tel_number = $validatedData['tel_number'];
        $user->email = $validatedData['email'];
        $user->postcode = $validatedData['postcode'];
        
        $user->created_by = auth()->user()->id;
        $user->team_id = auth()->user()->teamid;

       

        $user->save();

        $dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Add "Kunden" Id '.$user->id. ' Name ' .$user->name,
        ];

        DB::table('activity_logs')->insert($activityLogs);

        return redirect()->route('kunden.index')->with('success', 'Team member added successfully.');
    }

    public function edit($id)
    {
        // Check if the logged-in user has permission to edit the user
         $editData = Kunden::find($id);
         
            return view('content.pages.kunden.edit', ['editData' => $editData]);
        
    }

    public function remove($id){

        
        $remove = Kunden::find($id);
        $dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $user = Auth::user();
        $activityLogs = [
            'user_name' => $user->name,
            'email' => $user->email,
            'date_time' => $todayDate,
            'activity' => 'Deleted "Kunden" Id '.$remove->id. ' Name ' .$remove->name,
        ];

        DB::table('activity_logs')->insert($activityLogs);
        $remove->delete();
        return redirect()->route('kunden.index')->with(['success' => 'User Deleted successfully!']);
      }

    public function update(Request $request,Kunden $user)
    {
        $validatedData = $request->validate([
            
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'stairs' => 'required|string|max:255',
            'door' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tel_number' => 'required|string|max:255',
        ]);

       
       

        // dd($activityLogs);
        $data = Kunden::find($user->id);
        // dd();    
// Check if the customer exists
if ($data) {
    // Update the attributes
    $data->update([
        'name' => $request->name,
        'nachname' => $request->nachname,
        'anrede' => $request->anrede,
        'title' => $request->title,
        'dob' => $request->dob,
        'street' => $request->street,
        'house_number' => $request->house_number,
        'stairs' => $request->stairs,
        'door' => $request->door,
        'location' => $request->location,
        'tel_number' => $request->tel_number,
        'email' => $request->email,
    ]);
} else {
    // Handle the case where the customer is not found
    // (You might want to return an error response or redirect)
}

$dt = Carbon::now('Asia/Kolkata');
        
$todayDate = $dt->toDayDateTimeString();
// dd($todayDate);
$user = Auth::user();
$activityLogs = [
    'user_name' => $user->name,
    'email' => $user->email,
    'date_time' => $todayDate,
    'activity' => 'updated "Kunden" Id '.$data->id. ' Name ' .$request->name,
];
        
        DB::table('activity_logs')->insert($activityLogs);
        // $user->update($data);

        // $data->update();

        // $user->update(['title'=>'Updated title']);

        // Update the user's details here

        return redirect()->route('kunden.index')->with('success', 'User updated successfully.');
    }

    public function deactivate(Kunden $user)
    {
        // Deactivate the user here (e.g., set the 'status' flag to 0)
        $dt = Carbon::now('Asia/Kolkata');
        
        $todayDate = $dt->toDayDateTimeString();
        // dd($todayDate);
        $user = Auth::user();
        $activityLogs = [
            'user_name' => $user->name,
            'email' => $user->email,
            'date_time' => $todayDate,
            'activity' => 'deactivated "Kunden"',
        ];

        DB::table('activity_logs')->insert($activityLogs);
        $user->status = 0;
        $user->save();

        return redirect()->route('kunden.index')->with('success', 'User deactivated successfully.');
    }
    public function activate(Request $request)
    {   
        $data = Kunden::find($request['user']);
        // // Deactivate the user here (e.g., set the 'status' flag to 1)
        // $user->status = 1;
        $dt = Carbon::now('Asia/Kolkata');
        
        $todayDate = $dt->toDayDateTimeString();
        // dd($todayDate);
        $user = Auth::user();
        $activityLogs = [
            'user_name' => $user->name,
            'email' => $user->email,
            'date_time' => $todayDate,
            'activity' => 'activated "Kunden"',
        ];

        DB::table('activity_logs')->insert($activityLogs);
        $data->update(['status'=>'1']);
        // print_r()
        // print_r($data->toArray());die;
        return redirect()->route('kunden.index')->with('success', 'User Activated successfully.');
    }

     public function contract(Request $request,Kunden $user)
    {
       
       $getData = Vertrag::Where('name',$user['id'])->get();

       

      $comment = DB::table('comment')
      ->join('users','comment.commented_by','=','users.id')
      ->where('customer_id',$user['id'])
      ->orderBy('comment.created_at', 'DESC')
      ->limit(2)
      ->get(['comment.comment','comment.created_at','users.name as name']);

       
       // dd($comment);
        // $kundenName = Kunden::where('kundenid', auth()->user()->kundenid)->value('name');

        return view('content.pages.kunden.customer-contract', ['getData'=>$getData,'user'=>$user,'comment'=>$comment]);
    }


    //Comment Store

  public function comment(Request $request,Kunden $user)
    {

      

$validatedData = $request->validate([
            
            
            'comment' => 'required|string|max:255',
            
        ]);


        $data = new Comment();


        // $user->partnerid = $validatedData['partnerid'];
        $data->comment = $request['comment'];
       
        $data->customer_id = $user->id;
        $data->commented_by = auth()->user()->id;

        
        $data->save();

        // $user->update(['title'=>'Updated title']);

        // Update the user's details here

        return redirect()->route('kunden.contract', ['user' => $user->id])->with('success', 'User updated successfully.');
    }

     public function viewcomments(Request $request,Kunden $user)
    {

        // dd($user,$request);
       
     

       

      $comment = DB::table('comment')
      ->join('users','comment.commented_by','=','users.id')
      ->where('customer_id',$user['id'])
      ->orderBy('comment.created_at', 'DESC')
     
      ->get(['comment.comment','comment.created_at','users.name as name']);

       
       // dd($comment);
        // $kundenName = Kunden::where('kundenid', auth()->user()->kundenid)->value('name');

        return view('content.pages.kunden.customer-comment', ['user'=>$user,'comment'=>$comment]);
    }
    

}