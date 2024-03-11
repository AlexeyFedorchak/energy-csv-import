<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarife;
use App\Helpers\Helpers;
use App\Models\User;
use App\Models\Group;
use DB;
use App\Models\Lieferanten;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Arr;

class TarifeController extends Controller
{
  public function index() {
    $tarife = Tarife::all();
    // dd($teams);
    return view('content.pages.admin.tarife.index', ['tarife' => $tarife]);
  }

  public function create() {
    $lieferantens = Lieferanten::all();  
    return view('content.pages.admin.tarife.create',compact('lieferantens'));
  }

  public function store(Request $request) {
    // dd($request->all());
    $request->validate([
      'tarife' => 'required|string|max:255',
      'firma' => 'nullable',
      'preis' => 'required',
      'grundpreis' => 'required',
      'type' => 'nullable',
      'prov' => 'required',
      'contract_pdf' => 'nullable|file|mimes:pdf|max:2048',
      'lieferanten_id'=>'required'
    ]);

    //$preis = str_replace( ',', '', $request['preis'] );
    //$grundpreis = str_replace( ',', '', $request['grundpreis'] );
    //$prov = str_replace( ',', '', $request['prov'] );
    

    $pdfPath = null;

    if ($request->hasFile('contract_pdf')) {
      $pdfPath = $request->file('contract_pdf')->store('tarife_contracts', 'public');
    }

    // echo "<pre>";
    // print_r($pdfPath);
    // die;

    $tarifeStroe = Tarife::create([
      'tarife' => $request->input('tarife'),
      'firma' => $request->input('firma'),
      'preis' => $request->input('preis'),
      'grundpreis' => $request->input('grundpreis'),
      'type' => $request->input('type'),
      'prov' => $request->input('prov'),
      'contract_type' => $request->input('contract_type'),
      'pdf_path' => $pdfPath,
      'lieferanten_id'=> $request->lieferanten_id
    ]);

    $dt = Carbon::now('Asia/Kolkata');
    $todayDate = $dt->toDayDateTimeString();
    $userActive = Auth::user();
    $activityLogs = [
      'user_name' => $userActive->name,
      'email' => $userActive->email,
      'date_time' => $todayDate,
      'activity' => 'Add "Tarife" Id '.$tarifeStroe->id. ' Name ' .$request->tarife,
    ];

    DB::table('activity_logs')->insert($activityLogs);

    if (!empty($pdfPath)) {
      return view(
        'content.pages.admin.tarife.validate',
        [
          'path' => $pdfPath,
          'tarifeId' => $tarifeStroe->id,
          // 'fields' => [],
          'fields' => [],
        ]
      );
    } else {
      return redirect()->route('admin.tarife')->with('success', 'Tarife updated successfully.');
    }
  }

  public function edit($id) {
    // Check if the logged-in user has permission to edit the user
    $tarifeData = Tarife::find($id);
    $lieferantens = Lieferanten::all();  
    
    return view('content.pages.admin.tarife.edit', ['tarifeData' => $tarifeData,'lieferantens'=>$lieferantens]);
  }

  public function update(Request $request,$id) {
    $request->validate([
      'tarife' => 'required|string|max:255',
      'firma' => 'nullable',
      'preis' => 'required',
      'grundpreis' => 'required',
       'type' => 'nullable',
       'prov' => 'required',
      'contract_pdf' => 'nullable|file|mimes:pdf|max:2048',
      'lieferanten_id'=>'required'
    ]);
    //$request['preis'] = str_replace( ',', '', $request['preis'] );
    //$request['grundpreis'] = str_replace( ',', '', $request['grundpreis'] );
    //$request['prov'] = str_replace( ',', '', $request['prov'] );
    // echo '<pre>';
    // print_r($request->all());
    // die;

    $tarifeData = Tarife::find($id);
    $path = $tarifeData->pdf_path;
    if ($request->hasFile('contract_pdf')) {
      // Store the file and get its path
      $path = $request->file('contract_pdf')->store('tarife_contracts', 'public');

      // Update the file path in the request data
      $request->merge(['pdf_path' => $path]);
    }

    $tarifeData->update($request->all());

    $dt = Carbon::now('Asia/Kolkata');
    $todayDate = $dt->toDayDateTimeString();
    $userActive = Auth::user();
    $activityLogs = [
      'user_name' => $userActive->name,
      'email' => $userActive->email,
      'date_time' => $todayDate,
      'activity' => 'updated "Tarife" Id '.$tarifeData->id. ' Name ' .$tarifeData->tarife,
    ];

    DB::table('activity_logs')->insert($activityLogs);

    if (!empty($path)) {
      return view(
        'content.pages.admin.tarife.validate',
        [
          'path' => $path,
          'tarifeId' => $id,
          'fields' => $tarifeData->fields,
        ]
      );
    } else {
      return redirect()->route('admin.tarife')->with('success', 'Tarife updated successfully.');
    }
  }

  public function remove($id) {
    $remove = Tarife::find($id);
    $remove->delete();
    $dt = Carbon::now('Asia/Kolkata');
    $todayDate = $dt->toDayDateTimeString();
    $userActive = Auth::user();
    $activityLogs = [
      'user_name' => $userActive->name,
      'email' => $userActive->email,
      'date_time' => $todayDate,
      'activity' => 'deleted "Tarife" Id '.$remove->id. ' Name ' .$remove->tarife,
    ];

    DB::table('activity_logs')->insert($activityLogs);
    return redirect()->route('admin.tarife')->with(['success' => 'Tarife Deleted successfully!']);
  }

  public function validatePdf(Request $request) {
    $fields = $request->input('fields');
    $tarifeId = $request->integer('tarife_id', 0);

    // echo "<pre>";
    // print_r($fields);
    // die;

if(isset($fields))
{
  $data = Arr::map($fields, function ($item) {
      $tmp = '';
      if (!empty($item['fields'])) {
        if (is_array($item['fields'])) {
          $tmp = implode(',', $item['fields']);
        } else {
          $tmp = $item['fields'];
        }
      }
      return [
        'name' => $item['name'],
        'type' => $item['type'],
        'checked' => !empty($item['checked']),
        'fields' => $tmp
      ];
    });

    Tarife::where('id', $tarifeId)
      ->update([
        'fields' => json_encode($data)
      ]);
}

    

    return redirect()->route('admin.tarife')->with('success', 'Tarife updated successfully.');
  }
  // TTarife API
  public function getAllTarife(Request $request){
      //$userGroup = Helpers::groupUser();
      $api_key = $request->api_key;
      $group = Group::where('api_key',$api_key)->first();
      $data=[];
      if($group){
      $rows = DB::table('tarife')->leftjoin('group_tariffs','group_tariffs.tariff_id','=','tarife.id')->where('group_id',$group->group_id)->get();

      //$data = DB::table('tarife')->leftjoin('group_tariffs','group_tariffs.tariff_id','=','tarife.id')->where('group_id',$userGroup)->get();
     // $rows = Tarife::get();
      
		
      foreach($rows as $key=>$row){
        $data[$row->firma.'XXL'.$key] = [
        	"Firma"=>$row->firma, 
			"Preis"=> $row->preis,
			"Grundpreis"=> $row->grundpreis,
			"Type"=> $row->type,
			"Business" => $row->business,
			"Prov"=>$row->prov,
          	"Contract_Type"=>$row->contract_type
        ];
      }
      }
      return response()->json(['Tarife' => $data]);

  }
}

