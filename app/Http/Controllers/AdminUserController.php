<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use App\Mail\ReferredUserCreatedEmail;
use App\Mail\UserCreatedEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Vermittlernummer;
use App\Models\Lieferanten;
use DB;
use Carbon\Carbon;
use Auth;

class AdminUserController extends Controller
{
	public function index(Request $request)
	{

		$user = User::orderBy('id' , 'DESC')->get();
		// dd($user);
		return view('content.pages.admin.users.index', ['users' => $user]);
	}

	public function create()
	{
		$teams = Team::all();
		$users = User::all();
		$lieferantens = Lieferanten::all();
		$verms = Vermittlernummer::all();
		return view('content.pages.admin.users.create', ['teams' => $teams, 'users' => $users, 'lieferantens' => $lieferantens, 'verms' => $verms]);
	}

	public function store(Request $request)
	{


		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8',
			//'team' => 'required|exists:teams,id',
		]);
        // $row = User::create([
        //    'name' => $request->input('name'),
        //    'email' => $request->input('email'),
        //    'password' => Hash::make($request->password),
        //    'teamid' => $request->input('team'),
        //    'referral' => $request->input('referral'),
        //    'role' => $request->input('role'),
        // ]);

		$user = new User();
		$user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->teamid = $request->team;
        $user->referral = $request->referral;
        $user->role = $request->role;
		$user->companyname = $request->companyname;
		$user->manager = $request->manager;
		$user->contactperson = $request->contactperson;
		$user->street = $request->street;
		$user->zipcode = $request->zipcode;
		$user->city = $request->city;
		$user->phone = $request->phone;
		$user->website = $request->website;
		$user->bankname = $request->bankname;
		$user->iban = $request->iban;
		$user->bic = $request->bic;
		$user->taxnumber = $request->taxnumber;
		$user->financeoffice = $request->financeoffice;
		$user->socialsecuritynumber = $request->socialsecuritynumber;
		$user->vatid = $request->vatid;
		$user->gisa1 = $request->gisa1;
		$user->gisa2 = $request->gisa2;
		$user->referral = $request->referral;
		$user->teamid = $request->team;

        $user->save();

		foreach($request->lieferanten_id as $key=>$lieferanten_id){
			Vermittlernummer::where('lieferanten_id',$lieferanten_id)->where('user_id',$user->id)->delete();
		 Vermittlernummer::create([
			'user_id'=>$user->id,
			 'lieferanten_id'=>$lieferanten_id,
			 'vermittlernummer'=>$request->vermittlernummer[$key]
			 // Update other fields here.
		 ]);
		}

		$dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Add "User" Id '.$user->id. ' Name ' .$request->name,
        ];

        DB::table('activity_logs')->insert($activityLogs);

       try {
         Mail::to($request->email)->send(new UserCreatedEmail($row));
         $referral = User::find($request->referral);
         if($referral){
         Mail::to($referral->email)->send(new ReferredUserCreatedEmail($row, $referral));
         }

        }catch (\Exception $e){

        }

		return redirect()->route('admin.users.index')->with('success', 'User erfolgreich hinzugefügt');
	}

	public function edit($id)
	{
      $lieferantens = Lieferanten::all();
      $verms = Vermittlernummer::where('user_id',$id)->get();
	  $user = User::find($id);
	  $users = User::all();
	  $teams = Team::all();
		return view('content.pages.admin.users.edit', compact('user','lieferantens','verms', 'users', 'teams'));
	}

	public function update(Request $request, $id)
	{
    		$request->validate([
        		'name' => 'required|string|max:255',
        		'email' => 'required|email|unique:users,email,' . $id,
   		 ]);

    		$user = User::find($id);
			// dd($user);

    		if (!$user) {
        		return redirect()->route('admin.users.index')->with('error', 'User not found');
    		}

    		$user->update([
        		'name' => $request->input('name'),
        		'email' => $request->input('email'),
				'companyname' => $request->input('companyname'),
				'manager' => $request->input('manager'),
				'contactperson' => $request->input('contactperson'),
				'street' => $request->input('street'),
				'zipcode' => $request->input('zipcode'),
				'city' => $request->input('city'),
				'phone' => $request->input('phone'),
				'website' => $request->input('website'),
				'bankname' => $request->input('bankname'),
				'iban' => $request->input('iban'),
				'bic' => $request->input('bic'),
				'taxnumber' => $request->input('taxnumber'),
				'financeoffice' => $request->input('financeoffice'),
				'socialsecuritynumber' => $request->input('socialsecuritynumber'),
				'vatid' => $request->input('vatid'),
				'gisa1' => $request->input('gisa1'),
				'gisa2' => $request->input('gisa2'),
				'admin' => $request->input('admin'),
				'referral' => $request->input('referral'),
				'teamid' => $request->input('team'),
        		// Update other fields here.
    		]);
      		foreach($request->lieferanten_id as $key=>$lieferanten_id){
      		 Vermittlernummer::where('lieferanten_id',$lieferanten_id)->where('user_id',$user->id)->delete();
            Vermittlernummer::create([
               'user_id'=>$user->id,
                'lieferanten_id'=>$lieferanten_id,
                'vermittlernummer'=>$request->vermittlernummer[$key]
                // Update other fields here.
            ]);
            }
			$dt = Carbon::now('Asia/Kolkata');

			$todayDate = $dt->toDayDateTimeString();
			// dd($todayDate);
			$user = Auth::user();
			$activityLogs = [
				'user_name' => $user->name,
				'email' => $user->email,
				'date_time' => $todayDate,
				'activity' => 'updated "User" Id '.$request->id. ' Name ' .$request->name,
			];

					DB::table('activity_logs')->insert($activityLogs);
    		return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
	}
}
