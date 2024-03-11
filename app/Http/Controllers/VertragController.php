<?php

namespace App\Http\Controllers;
use App\Mail\SendVertraegeSignLink;
use App\Models\Tarife;
use App\Models\User;
use App\Models\Team;
use App\Helpers\Helpers;
use App\Models\VertraegeSignLinkToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vertrag;
use App\Models\Kunden;
use App\Models\Contract;
use App\Models\Vermittlernummer;
use DB;
use Exception;
use Carbon\Carbon;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use PDF;

class VertragController extends Controller
{
  public function index(): View {
    //dd(auth()->user()->teamid);
    $vertraege = Vertrag::select('vertraege.*','users.name as created_by','kundens.name as name')
      ->join('users','vertraege.created_by','users.id')
      ->join('kundens','vertraege.name','kundens.id')
      ->orderBy('id','desc')
      ->where('vertraege.team_id',auth()->user()->teamid)
      ->get();

     //dd($vertraege);

    // Retrieve all entries from the "vertraege" table
    $teamName = Team::where('id', auth()->user()->teamid)->value('name');

    $users = User::where('teamid', auth()->user()->teamid)
      ->where('active', 1)
      ->get();

    return view(
      'content.pages.vertraege.index',
      [
        'vertraege' => $vertraege,
        'teamName' => $teamName,
        'users' => $users
      ]
    );
  }

  #Contract
  public function contract(Request $request): View {
    
    $contracts_strom = Contract::where('type','strom')->get()->first();
    $contracts_gas = Contract::where('type','gas')->get()->first();

    $data_strom = DB::table('tarife')->where('contract_type','strom')->get();
    $data_gas = DB::table('tarife')->where('contract_type','gas')->get();
    $data = DB::table('tarife')->get();

    // dd($data);

    if ($data_strom->count() > 0) {
      foreach ($data_strom as $val) {
        $tarif_arry[$val->tarife] = array(
          'id'=>$val->id,
          'firma'=>$val->firma,
          'preis'=>$val->preis,
          'grundpreis'=>$val->grundpreis,
          'type'=>$val->type,
          'prov'=>$val->prov,
          'contract_type'=>$val->contract_type,
        );
      }

      $tarife = [
        'Tarife' => $tarif_arry,
        'FixedVal' => [
          'Boerse' => '0.11173',
          'AufschlagE1' => '0.0219'
        ],
      ];
      $val_strom = json_encode($tarife,JSON_PRETTY_PRINT);
    } else {
      $val_strom = json_encode('Data No Found');
    }

    if ($data_gas->count() > 0) {
      foreach($data_gas as $key => $val) {
        $tarif_arry_gas[$val->tarife] = array(
          'id'=>$val->id,
          'firma'=>$val->firma,
          'preis'=>$val->preis,
          'grundpreis'=>$val->grundpreis,
          'type'=>$val->type,
          'prov'=>$val->prov,
          'contract_type'=>$val->contract_type,
        );
      }

      $tarife_gas = [
        'Tarife' => $tarif_arry_gas,
        'FixedVal' => [
          'Boerse' => '0.11173',
          'AufschlagE1' => '0.0219'
        ],
      ];
      $val_gas = json_encode($tarife_gas,JSON_PRETTY_PRINT);
    } else{
      $val_gas = json_encode('Data No Found');
    }

    //  $strom_session = session()->get('strom_session');
    // echo $val_strom;
    // die;
    $user = Auth::user()->name;
      //dd($contracts_strom->old_stromkosten);
    session([
      'stromverbrauch' => $request->input('stromverbrauch', $contracts_strom->stromverbrauch ?? null),
      'old_stromkosten' => $request->input('old_stromkosten', $contracts_strom->old_stromkosten ?? null),
      'old_grundpreis' => $request->input('old_grundpreis', $contracts_strom->old_grundpreis ?? null),
      'stromverbrauchGas' => $request->input('stromverbrauchGas', $contracts_gas->stromverbrauch ?? null),
      'old_stromkostenGas' => $request->input('old_stromkostenGas', $contracts_gas->old_stromkosten ?? null),
      'old_grundpreisGas' => $request->input('old_grundpreisGas', $contracts_gas->old_grundpreis ?? null),
    ]);

  // dd($user);

    return view(
      'content.pages.vertraege.contract',
      compact('val_strom','val_gas','data','contracts_strom','contracts_gas'));
  }

  public function angebot(Request $request , $id){
    $pricedata = DB::table('tarife')->where('id',$id)->get()->first();
    //dump($pricedata);
    $contact_type_data = null;
    if ($pricedata->contract_type == 'strom') {
      $contact_type_data = Contract::where('type', 'strom')->first();
  } else {
      $contact_type_data = Contract::where('type', 'gas')->first();
  }
// dd($contact_type_data);
     $name = Auth::user()->name;
    // dd($data);
    $getData = Kunden::all();
    $total = $contact_type_data->stromverbrauch * $contact_type_data->old_stromkosten + $contact_type_data->old_grundpreis;
    $tax = $total * 20 / 100 ;

    $subtotal = $contact_type_data->stromverbrauch * $pricedata->preis + $pricedata->grundpreis;
    $subtax = $subtotal * 20 / 100 ;
    // dd($subtax);
    // session()->put('total',$total,$tax,$subtotal,$subtax);
    
dump(session('stromverbrauch'),session('old_stromkosten'),session('old_grundpreis'),session('stromverbrauchGas'));
    session(['total' => $total, 
    'tax' => $tax, 
    'subtotal' => $subtotal,
    'subtax'=>$subtax,
    'stromverbrauch'=>$contact_type_data->stromverbrauch,
    'old_stromkosten'=>$contact_type_data->old_stromkosten,
    'old_grundpreis'=>$contact_type_data->old_grundpreis,
    'preis'=>$pricedata->preis,
    'grundpreis'=>$pricedata->grundpreis,
    'name'=>$name,

  ]);
  //dump(session()->all());
    return  view('content.pages.vertraege.angebot',
    [
      'getData' => $getData,
      'contact_type_data' => $contact_type_data,
      'pricedata' => $pricedata,
      'tax' => $tax,
      'subtax' => $subtax,
    ])->with('data', $name);
  }

  public function send_mail()
    {
      // $data = session()->get('total');// Replace with your data
$data = null;
$data = [
  'stromverbrauch' => session('stromverbrauch'),
  'old_stromkosten' => session('old_stromkosten'),
  'old_grundpreis' => session('old_grundpreis'),
  'preis' => session('preis'),
  'tax' => session('tax'),
  'subtotal' => session('subtotal'),
  'subtax' => session('subtax'),
  'grundpreis' => session('grundpreis'),
  'name' => session('name'),

];



// dd($data);

        $pdf = PDF::loadView('content.pages.vertraege.mail', compact('data'));
        // dd($pdf);

        if ($pdf) {
          return $pdf->download('filename.pdf');
      } else {
          // Handle the case where $pdf is null
      }

        // return $pdf->download('example.pdf');
    }

  public function send_mailn(Request $request){

    $user = array(
      'name' => 'Test',
       'email' => $request->email,
  );

    Mail::send('content.pages.vertraege.mail',['user'=>$user],function($message) use ($user){
      // $message->from($data->email, $data->name);
      $message->to($user['email'])->subject('Your Details');
     });
     return redirect()->back()->with(['success' => 'User has been sent Successfully!']);;
  }

  public function getUserDetails($id)
  {
      $user = Kunden::find($id);
      return response()->json($user);
  }

  public function create(Request $request): View {

     // dd($request->all());
    $type = $request->input('type', 'gas');
    // echo $type;
    // die;

    $tarifeId = $type === 'strom' ? $request->input('strom') : $request->input('gas');
    // echo $tarifeId;
    // die;

    // $data = DB::table('tarife')->where('id',$tarifeId)->get()->first();
    $data = DB::table('tarife')->where('contract_type',$type)->get()->first();
    // echo "<pre>";
    // print_r($data);
    // die;

    // dd($dataStrom);
    // dd($userId,$type,$contract_type);

    $getData = Kunden::all();

    $loggedInUser = Auth::user();
    $loggedInUserId = $loggedInUser->id; // Use $loggedInUser->id to get the user's ID
    $loggedInTeamId = $loggedInUser->teamid;
    $team = User::where('teamid', auth()->user()->teamid)->get();

    return view(
      'content.pages.vertraege.add',
      [
        'partnerid' => $loggedInUserId,
        'teamid' => $loggedInTeamId,
        'getData' => $getData,
        'team' => $team,
        'type' => $type,
        'data' => $data,
      ]
    );
  }


  public function store(Request $request)
  {
    // dd($request->all());
    // $validatedData = $request;
    // Validate the input data
    $user = new Vertrag();
    $user->fill([
      'kundentyp' => $request->input('kundentyp'),
      'partnerid' => $request->input('partnerid'),
      'vertragstyp' => $request->input('vertragstyp'),
      'energieanbieter' => $request->input('energieanbieter'),
      'contract_type' => $request->input('contract_type'),
      'name' => $request->input('name'),
      'firmenbuchnummer' => $request->input('firmenbuchnummer'),

      'firmenname' => $request->input('firmenname'),
      'kontaktart' => $request->input('kontaktart'),
      // 'rechnungsanschrit' => $request->input('rechnungsanschrit'),
      'netzbetreibernummer' => $request->input('netzbetreibernummer'),
      'zahlungsart' => $request->input('zahlungsart'),
      'uid' => $request->input('uid'),
      'lfbis' => $request->input('lfbis'),
      'branche' => $request->input('branche'),
      'unterzeichner' => $request->input('unterzeichner'),
      'betreuer' => $request->input('betreuer'),
      'handlingfee' => $request->input('handlingfee'),
      'kundenkennwort' => $request->input('kundenkennwort'),
      'mail' => $request->input('mail'),
      'anmeldetyp' => $request->input('anmeldetyp'),
      'bank' => $request->input('bank'),
      'iban' => $request->input('iban'),
      'bic' => $request->input('bic'),
      'kontoinhaber' => $request->input('kontoinhaber'),
      'jvb' => $request->input('jvb'),
      'nb' => $request->input('nb'),
      'aktuellerlieferant' => $request->input('aktuellerlieferant'),
      'vertragsdauer' => $request->input('vertragsdauer'),

      'zpn'=>json_encode($request->input('zpn')),
      'zaehlpunktnummer' =>json_encode($request->input('zpn')),
      'anummer'=>json_encode($request->input('anummer')),
      'created_by'=>auth()->user()->id,
      'team_id'=>auth()->user()->teamid,
      // Update other fields here.
      'tarife_id' => $request->input('tarife_id'),
    ]);
    // dd($user);
    // $vert = DB::table('vertraege')->insert($user);
    $user->save();
    // dd($vert);

    //  $validatedData['zpn']=json_encode($request->zpn);
    //  $validatedData['zaehlpunktnummer'] =json_encode($request->zpn);
    //  $validatedData['anummer']=json_encode($request->anummer);
    //  $validatedData['created_by']=auth()->user()->id;
    //  $validatedData['team_id']=auth()->user()->teamid;


    // Create a new Vertrag record
		

    // $vert = Vertrag::create($validatedData);

    $dt = Carbon::now('Asia/Kolkata');
    $todayDate = $dt->toDayDateTimeString();
    $userActive = Auth::user();
    $activityLogs = [
      'user_name' => $userActive->name,
      'email' => $userActive->email,
      'date_time' => $todayDate,
      'activity' => 'Add "Vertrag" Id '.$user->id. ' Name ' .$request->name,
    ];

    $diff_data = Kunden::find($request->name);
    if ($diff_data) {
      // Update the attributes
      $diff_data->update([

        'diff_street' => $request->diff_street,
        'diff_house_number' => $request->diff_house_number,
        'diff_stairs' => $request->diff_stairs,
        'diff_door' => $request->diff_door,
        'diff_location' => $request->diff_location,
        'diff_postcode' => $request->diff_postcode,

      ]);
    }
    DB::table('activity_logs')->insert($activityLogs);
  try{
	$kundenId = $user->name;
    $kunden = Kunden::where('id', $kundenId)->first();
    $vertraegeId = $user->id;
    if ($kunden && $kunden->email) {
      $token = base64_encode(str_shuffle(time().'_'.$vertraegeId));
      $ret = VertraegeSignLinkToken::create([
        'vertraege_id' => $vertraegeId,
        'token' => $token,
        'expires_at' => Carbon::now()->addHours(1)
      ]);

      if ($ret) {
        $link = route('vertraege.signature', $token);
        Mail::to($kunden->email)->send(new SendVertraegeSignLink($link));
      } 
    }
    }catch(Exception $e){
    
    }
    // Redirect to a success page or back to the form
    return redirect()->route('vertraege.pdf', $user->id);
  }

  public function getUserData(Request $request) {
    $userId = $request->input('userId');
    // Fetch user data based on $userId

    // Example: Fetch user data from the User model
    $user = Kunden::find($userId);

    // Return user data HTML (replace this with your actual HTML structure)
    return $user;
  }

  public function edit($id): View {
    $getData = Kunden::all();
    $team = User::where('teamid', auth()->user()->teamid)->get();
    $user = Vertrag::find($id);
    $zpn =  (array) json_decode($user['zpn'],true);
    $zaehlpunktnummer =  (array) json_decode($user['zaehlpunktnummer'],true);
    $anummer =  (array) json_decode($user['anummer'],true);

    return view('content.pages.vertraege.edit',compact('user','getData','team','zpn','zaehlpunktnummer','anummer'));
  }

  public function update(Request $request, $id): RedirectResponse  {
    $request->validate([
      'kundentyp' => 'required|integer', // Assuming kundentyp is an integer
      'partnerid' => 'required|integer', // Assuming kundentyp is an integer
      'contract_type' => 'required|integer', // Assuming vertragstyp is an array of checkboxes
      'vertragstyp' => 'required|integer',
      'energieanbieter' => 'required|integer', // Assuming energieanbieter is an integer
      'name' => 'required|string',
      'firmenbuchnummer' => 'nullable|string', // Assuming it's nullable
      'uid' => 'nullable|string', // Assuming it's nullable
      'lfbis' => 'nullable|string', // Assuming it's nullable
      'branche' => 'nullable|string', // Assuming it's nullable
      'unterzeichner' => 'required|string',
      'betreuer' => 'nullable|string', // Assuming it's nullable
      'handlingfee' => 'required|numeric|min:2.5|max:6.0',
      'kundenkennwort' => 'required|string',
      'mail' => 'required|email', // Assuming it's an email address
      'anmeldetyp' => 'required|integer', // Assuming anmeldetyp is an integer
      'bank' => 'required|string', // Assuming it's nullable
      'iban' => 'required|string', // Assuming it's nullable
      'bic' => 'required|string', // Assuming it's nullable
      'kontoinhaber' => 'required|string', // Assuming it's nullable
      //'zaehlpunktnummer' => 'required|string', // Assuming it's nullable
      'jvb' => 'required|string', // Assuming it's nullable
      'nb' => 'required|string', // Assuming it's nullable
      'aktuellerlieferant' => 'nullable|string', // Assuming it's nullable
      //'zpn' => 'nullable|string', // Assuming it's nullable
      // 'anummer' => 'nullable|string', // Assuming it's nullable
      'vertragsdauer' => 'nullable|date', // Assuming it's a date
    ]);

    $user = Vertrag::find($id);
    if (!$user) {
      return redirect()->route('admin.users.index')->with('error', 'User not found');
    }

    $user->update([
      'kundentyp' => $request->input('kundentyp'),
      'partnerid' => $request->input('partnerid'),
      'vertragstyp' => $request->input('vertragstyp'),
      'energieanbieter' => $request->input('energieanbieter'),
      'contract_type' => $request->input('contract_type'),
      'name' => $request->input('name'),
      'firmenbuchnummer' => $request->input('firmenbuchnummer'),
      'firmenname' => $request->input('firmenname'),
      'kontaktart' => $request->input('kontaktart'),
      // 'rechnungsanschrit' => $request->input('rechnungsanschrit'),
      'netzbetreibernummer' => $request->input('netzbetreibernummer'),
      'zahlungsart' => $request->input('zahlungsart'),
      'uid' => $request->input('uid'),
      'lfbis' => $request->input('lfbis'),
      'branche' => $request->input('branche'),
      'unterzeichner' => $request->input('unterzeichner'),
      'betreuer' => $request->input('betreuer'),
      'handlingfee' => $request->input('handlingfee'),
      'kundenkennwort' => $request->input('kundenkennwort'),
      'mail' => $request->input('mail'),
      'anmeldetyp' => $request->input('anmeldetyp'),
      'bank' => $request->input('bank'),
      'iban' => $request->input('iban'),
      'bic' => $request->input('bic'),
      'kontoinhaber' => $request->input('kontoinhaber'),
      'jvb' => $request->input('jvb'),
      'nb' => $request->input('nb'),
      'aktuellerlieferant' => $request->input('aktuellerlieferant'),
      'vertragsdauer' => $request->input('vertragsdauer'),

      'zpn'=>json_encode($request->input('zpn')),
      'zaehlpunktnummer' =>json_encode($request->input('zpn')),
      'anummer'=>json_encode($request->input('anummer')),
      'created_by'=>auth()->user()->id,
      'team_id'=>auth()->user()->teamid,
      // Update other fields here.
    ]);

    $dt = Carbon::now('Asia/Kolkata');
    $todayDate = $dt->toDayDateTimeString();
    $userActive = Auth::user();
    $activityLogs = [
      'user_name' => $userActive->name,
      'email' => $userActive->email,
      'date_time' => $todayDate,
      'activity' => 'updated "Vertrag" Id '.$user->id. ' Name ' .$request->name,
    ];

    $diff_data = Kunden::find($request->name);
    if ($diff_data) {
      // Update the attributes
      $diff_data->update([

        'diff_street' => $request->diff_street,
        'diff_house_number' => $request->diff_house_number,
        'diff_stairs' => $request->diff_stairs,
        'diff_door' => $request->diff_door,
        'diff_location' => $request->diff_location,
        'diff_postcode' => $request->diff_postcode,

      ]);
    }

    DB::table('activity_logs')->insert($activityLogs);

    // $user->update(['title'=>'Updated title']);
    // Update the user's details here

    return redirect()->route('vertraege.pdf', $id);
  }

  public function pdf(Request $request, int $id): View|RedirectResponse {
    $vertraege  = Vertrag::where('id', $id)->first();
    if (!$vertraege) {
      return redirect()->route('vertraege.index');
    }

    $kundenId = $vertraege->name;
    $tarifeId = $vertraege->tarife_id;
    $userId = $vertraege->created_by;
    $kunden = Kunden::where('id', $kundenId)->first();
    $tarife = Tarife::where('id', $tarifeId)
      ->select('tarife', 'fields', 'pdf_path')
      ->first();

    $tarifeObj = Tarife::select('lieferanten_id')->where('id', $tarifeId)->first();
    $vermittlernummer = Vermittlernummer::select('vermittlernummer')->where('lieferanten_id',$tarifeObj->lieferanten_id)->where('user_id',$userId)->first();  
    //$info =array('vertraege' => $vertraege, 'kunden' => $kunden, 'tarife' => $tarife,'vermittlernummer'=>$vermittlernummer);
    //echo "<pre>"; print_r($info); die();
    return view('content.pages.vertraege.pdf')
      ->with(['vertraege' => $vertraege, 'kunden' => $kunden, 'tarife' => $tarife,'vermittlernummer'=>$vermittlernummer]);
  }

  public function sendSignLink(Request $request): RedirectResponse {

    $request->validate([
      'vertraege_id' => 'required'
    ]);

    $vertraegeId = $request->input('vertraege_id');
    $mode = $request->integer('mode', 1);

    $vertraege = Vertrag::where('id', $vertraegeId)->first();
    if (empty($vertraege)) {
      return redirect()->route('vertraege.index')->with('error', 'Vertraege not exists');
    }

    if ($mode === 1) {
      $path = null;

      if ($request->hasFile('vertraege_unsigned_pdf')) {
        $path = $request->file('vertraege_unsigned_pdf')->store('vertraege_contracts/'.$vertraegeId, 'public');
      }

      $vertraege->unsigned_pdf_path = $path;
      $vertraege->save();
    }

    $kundenId = $vertraege->name;
    $kunden = Kunden::where('id', $kundenId)->first();

    if ($kunden && $kunden->email) {
      $token = base64_encode(str_shuffle(time().'_'.$vertraegeId));
      $ret = VertraegeSignLinkToken::create([
        'vertraege_id' => $vertraegeId,
        'token' => $token,
        'expires_at' => Carbon::now()->addHours(1)
      ]);

      if ($ret) {
        $link = route('vertraege.signature', $token);
        Mail::to($kunden->email)->send(new SendVertraegeSignLink($link));

        return redirect()->route('vertraege.index')->with('success', 'Vertrag is stored successfully');
      } else {
        return redirect()->route('vertraege.index')->with('error', 'To send email is failed');
      }
    } else {
      return redirect()->route('vertraege.index')->with('error', 'Customer\'s email not exists');
    }
  }

  public function signature(Request $request, $token): View|RedirectResponse {
    $dt = Carbon::now();
      $todayDate = $dt->toDayDateTimeString();
    $activityLogs = [
          'user_name' => 'Login',
          'email' => '',
          'date_time' => $todayDate,
          'activity' => 'Signature Clicked and User IP: '.$_SERVER['REMOTE_ADDR'],
        ];
        DB::table('activity_logs')->insert($activityLogs);
    $linkToken = VertraegeSignLinkToken::where('token', $token)->first();
    if (empty($linkToken)) {
      return redirect('/');
    }

    if (Carbon::now()->greaterThan($linkToken->expires_at)) {
      return redirect('/');
    }

    $linkToken->expires_at = Carbon::now();
    $linkToken->save();

    $vertraege  = Vertrag::where('id', $linkToken->vertraege_id)->first();

    if (!$vertraege) {
      return redirect()->route('vertraege.index');
    }

    return view('content.pages.vertraege.signature')
      ->with(['vertraege' => $vertraege]);
  }

  public function saveSignedPdf(Request $request): RedirectResponse {
    $request->validate([
      'vertraege_id' => 'required'
    ]);

    $vertraegeId = $request->input('vertraege_id');

    $path = null;
    if ($request->hasFile('vertraege_signed_pdf')) {
      $path = $request->file('vertraege_signed_pdf')->store('vertraege_contracts/'.$vertraegeId, 'public');
    }

    $vertraege = Vertrag::where('id', $vertraegeId)->first();
    if ($vertraege) {
      $vertraege->signed_pdf_path = $path;
      $vertraege->save();
    }

    return redirect()->route('vertraege.index')->with('success', 'Vertrag is stored successfully');
  }
  public function getTarife(Request $request)
  {
    session(['stromverbrauch' => $request->stromverbrauch? $request->stromverbrauch:null,
      'old_stromkosten' => $request->old_stromkosten?$request->old_stromkosten:null,
      'old_grundpreis' => $request->old_grundpreis?$request->old_grundpreis: null,
      'stromverbrauchGas' => $request->stromverbrauchGas?$request->stromverbrauchGas:null,
      'old_stromkostenGas' => $request->old_stromkostenGas?$request->old_stromkostenGas:null,
      'old_grundpreisGas' => $request->old_grundpreisGas? $request->old_grundpreisGas:null,
         ]);
    
    $userGroup = Helpers::groupUser();
    
    //$groupTatiffs = GroupTariff::where('group_id',$userGroup)->get();
    $data_strom = DB::table('tarife')->where('contract_type','strom')->get();
    $data_gas = DB::table('tarife')->where('contract_type','gas')->get();
    $data = DB::table('tarife')
      ->select('tarife.*','group_tariffs.id as group_tariff_id')
      ->leftjoin('group_tariffs','group_tariffs.tariff_id','=','tarife.id')
      ->where('group_tariffs.group_id',$userGroup)->get();

    // dd($data);

    if ($data_strom->count() > 0) {
      foreach ($data_strom as $val) {
        $tarif_arry[$val->tarife] = array(
          'id'=>$val->id,
          'firma'=>$val->firma,
          'preis'=>$val->preis,
          'grundpreis'=>$val->grundpreis,
          'type'=>$val->type,
          'prov'=>$val->prov,
          'contract_type'=>$val->contract_type,
        );
      }

      $tarife = [
        'Tarife' => $tarif_arry,
        'FixedVal' => [
          'Boerse' => '0.11173',
          'AufschlagE1' => '0.0219'
        ],
      ];
      $val_strom = json_encode($tarife,JSON_PRETTY_PRINT);
    } else {
      $val_strom = json_encode('Data No Found');
    }

    if ($data_gas->count() > 0) {
      foreach($data_gas as $key => $val) {
        $tarif_arry_gas[$val->tarife] = array(
          'id'=>$val->id,
          'firma'=>$val->firma,
          'preis'=>$val->preis,
          'grundpreis'=>$val->grundpreis,
          'type'=>$val->type,
          'prov'=>$val->prov,
          'contract_type'=>$val->contract_type,
        );
      }

      $tarife_gas = [
        'Tarife' => $tarif_arry_gas,
        'FixedVal' => [
          'Boerse' => '0.11173',
          'AufschlagE1' => '0.0219'
        ],
      ];
      $val_gas = json_encode($tarife_gas,JSON_PRETTY_PRINT);
    } else{
      $val_gas = json_encode('Data No Found');
    }
  
        return response()->json([
        'val_strom'=>$val_strom,'val_gas'=>$val_gas,'data'=>$data
        ]);
    }
  	public function tarifeData(){
    
      $fields="vertraege: [
        { field: 'anummer', type: 'text', label: 'Anlagennummer', },
        { field: 'zpn', type: '[text]', value: 0, label: 'Zählpunkt', },
        { field: 'anummer', type: '[text]', value: 0, label: 'Zählernummer', },
        { field: 'zpn', type: '[text]', value: 1, label: 'Weiterer Zhlpunkt', },
        { field: 'anummer', type: '[text]', value: 1, label: 'Weitere Zählnummer', },
        { field: 'jvb', type: 'text', label: 'Jahresverbrauch ca', },
        { field: 'nb', type: 'text', label: 'Netzbetreiber', },
        { field: 'bic', type: 'text', label: 'Creditor-ID', },
        { field: 'kontoinhaber', type: 'text', label: 'Kontoinhaber', },
        { field: 'iban', type: 'text', label: 'IBAN', },
        { field: 'zahlungsart', type: 'enum', value: '0', label: 'Per Zahlschein', },
        { field: 'zahlungsart', type: 'enum', value: '1', label: 'Per Lastschrift', },
        { field: 'kontaktart', type: 'enum', value: '0', label: 'Per Mail', },
        { field: 'kontaktart', type: 'enum', value: '1', label: 'Per Post', },
        { field: 'ansprechpartner', type: 'text', label: 'Ansprechpartner', },
        { field: 'lieferbeginn', type: 'text', label: 'Lieferbeginn', },
        { field: 'derzeitiger_lieferant', type: 'text', label: 'Derzeitiger Lieferant', },
        { field: 'ort_signature', type: 'text', label: 'Ort Signature', },
        { field: 'datum_signature', type: 'text', label: 'Datum Signature', },
        { field: 'bank_rechnung', type: 'text', label: 'Bank', },
        { field: 'ort_rechnung', type: 'text', label: 'Bank Ort', },
        { field: 'datum_rechnung', type: 'text', label: 'Bank Datum', },
        { field: 'l_or_n', type: 'enum', value: '0', label: 'Lieferantenwechsel', },
        { field: 'l_or_n', type: 'enum', value: '1', label: 'Neubezug', },
        { field: 'verein_lfbis', type: 'text', label: 'Vereinsnummer/LFBIS Nummer', },
        { field: 'monat_or_year', type: 'enum', value: '0', label: 'Monatliche Rechnung', },
        { field: 'monat_or_year', type: 'enum', value: '1', label: 'Jahresrechnung', },
        { field: 'wechseldatum', type: 'text', label: 'Wechseldatum', },
        { field: 'Bindung', type: 'text', label: 'Bindung', },
        { field: 'kleinunternehmer', type: 'enum', value: '0', label: 'Kein Kleinunternehmer', },
        { field: 'kleinunternehmer', type: 'enum', value: '1', label: 'Kleinunternehmer', },
      ],
      vermittlernummer: [
        { field: 'vermittlernummer', type: 'text', label: 'Vermittlernummer', }
      ]";
    return response()->json([
        'data'=>$fields
        ]);
    }
}
