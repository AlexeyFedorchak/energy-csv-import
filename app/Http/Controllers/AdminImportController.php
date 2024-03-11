<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\SiteSetting;
use App\Models\Vertrag;
use DB;
use Carbon\Carbon;
use Auth;


class AdminImportController extends Controller
{
    //
    public function index()
    {
        $siteNameSetting = SiteSetting::where('setting', 'site_name')->first();
        $siteName = $siteNameSetting ? $siteNameSetting->value : '';
        $wienenergiePricingStrom = SiteSetting::where('setting', 'we_strom')->first();
        $wienenergiestrom = $wienenergiePricingStrom ? $wienenergiePricingStrom->value : '';
        $wienenergiePricingGas = SiteSetting::where('setting', 'we_gas')->first();
        $wienenergiegas = $wienenergiePricingGas ? $wienenergiePricingGas->value : '';
        $enstrogaPricingStrom = SiteSetting::where('setting', 'ens_strom')->first();
        $enstrogastrom = $enstrogaPricingStrom ? $enstrogaPricingStrom->value : '';
        $enstrogaPricingGas = SiteSetting::where('setting', 'ens_gas')->first();
        $enstrogagas = $enstrogaPricingGas ? $enstrogaPricingGas->value : '';
        $gruenPricingStrom = SiteSetting::where('setting', 'gruen_strom')->first();
        $gruenstrom = $gruenPricingStrom ? $gruenPricingStrom->value : '';
        $gruenPricingGas = SiteSetting::where('setting', 'gruen_gas')->first();
        $gruengas = $gruenPricingGas ? $gruenPricingGas->value : '';
        $maxPricingStrom = SiteSetting::where('setting', 'max_strom')->first();
        $maxstrom = $maxPricingStrom ? $maxPricingStrom->value : '';
        $maxPricingGas = SiteSetting::where('setting', 'max_gas')->first();
        $maxgas = $maxPricingGas ? $gruenPricingGas->value : '';
        $montanaPricingStrom = SiteSetting::where('setting', 'mon_strom')->first();
        $montanastrom = $montanaPricingStrom ? $montanaPricingStrom->value : '';
        $montanaPricingGas = SiteSetting::where('setting', 'mon_gas')->first();
        $montanagas = $montanaPricingGas ? $montanaPricingGas->value : '';
        $oekoPricingStrom = SiteSetting::where('setting', 'oeko_strom')->first();
        $oekostrom = $oekoPricingStrom ? $oekoPricingStrom->value : '';
        $oekoPricingGas = SiteSetting::where('setting', 'oeko_gas')->first();
        $oekogas = $oekoPricingGas ? $oekoPricingGas->value : '';
        $uwkPricingStrom = SiteSetting::where('setting', 'uwk_strom')->first();
        $uwkstrom = $uwkPricingStrom ? $uwkPricingStrom->value : '';
        $uwkPricingGas = SiteSetting::where('setting', 'uwk_gas')->first();
        $uwkgas = $uwkPricingGas ? $uwkPricingGas->value : '';
        $eonPricingStrom = SiteSetting::where('setting', 'eon_strom')->first();
        $eonstrom = $eonPricingStrom ? $eonPricingStrom->value : '';
        $eonPricingGas = SiteSetting::where('setting', 'eon_gas')->first();
        $eongas = $eonPricingGas ? $eonPricingGas->value : '';
        $goldgasPricingStrom = SiteSetting::where('setting', 'gg_strom')->first();
        $goldgasstrom = $goldgasPricingStrom ? $goldgasPricingStrom->value : '';
        $goldgasPricingGas = SiteSetting::where('setting', 'gg_gas')->first();
        $goldgasgas = $goldgasPricingGas ? $goldgasPricingGas->value : '';
        $goPricingStrom = SiteSetting::where('setting', 'go_strom')->first();
        $gostrom = $goPricingStrom ? $goPricingStrom->value : '';
        $goPricingGas = SiteSetting::where('setting', 'go_gas')->first();
        $gogas = $goPricingGas ? $goPricingGas->value : '';
        $verbundPricingStrom = SiteSetting::where('setting', 'ver_strom')->first();
        $verbundstrom = $verbundPricingStrom ? $verbundPricingStrom->value : '';
        $verbundPricingGas = SiteSetting::where('setting', 'ver_gas')->first();
        $verbundgas = $verbundPricingGas ? $verbundPricingGas->value : '';
        $switchPricingStrom = SiteSetting::where('setting', 'switch_strom')->first();
        $switchstrom = $switchPricingStrom ? $switchPricingStrom->value : '';
        $switchPricingGas = SiteSetting::where('setting', 'switch_gas')->first();
        $switchgas = $switchPricingGas ? $switchPricingGas->value : '';
        $erstePricingStrom = SiteSetting::where('setting', 'erste_strom')->first();
        $erstestrom = $erstePricingStrom ? $erstePricingStrom->value : '';
        $erstePricingGas = SiteSetting::where('setting', 'erste_gas')->first();
        $erstegas = $erstePricingGas ? $erstePricingGas->value : '';
        $gruenPricingStrom = SiteSetting::where('setting', 'gruen_strom')->first();
        $gruenstrom = $gruenPricingStrom ? $gruenPricingStrom->value : '';
        $grammgrasPreis = SiteSetting::where('setting', 'gras_preis')->first();
        $graspreis = $grammgrasPreis ? $grammgrasPreis->value : '';
        $grammkoksPreis = SiteSetting::where('setting', 'koks_preis')->first();
        $kokspreis = $grammkoksPreis ? $grammkoksPreis->value : '';

        return view('content.pages.admin.import.index', compact('siteName', 'wienenergiestrom', 'wienenergiegas', 'enstrogastrom', 'enstrogagas', 'gruenstrom', 'gruengas', 'maxstrom', 'maxgas', 'montanastrom', 'montanagas', 'oekostrom', 'oekogas', 'uwkstrom', 'uwkgas', 'eonstrom', 'eongas', 'goldgasstrom', 'goldgasgas', 'gostrom', 'gogas', 'switchstrom', 'switchgas', 'erstestrom', 'erstegas', 'verbundstrom', 'verbundgas', 'graspreis', 'kokspreis'));
    }

    function updateItemInDB($updateRecordArray, $searchIndex, $jvbTargetIndex, $commissionTargetIndex ) 
    {
        if($searchIndex < 0) return -1;
        foreach($updateRecordArray as $ind=>$updateRecord) {
            //$vertragObj = Vertrag::firstWhere('zpn', $updateRecord[$searchIndex]);
            $vertragObj = Vertrag::where('zpn', 'LIKE', '%'.$updateRecord[$searchIndex].'%')->first();
            //$vertragObj = Vertrag::where('id', '11');
            // dd($vertragObj);
            if($vertragObj->count()) {
                $itemRecord = $vertragObj->toArray();
                //dd($itemRecord);
                if($itemRecord['checked'] == 0) {
                    $vertragObj->checked = 2;
                    $vertragObj->jvb = $updateRecord[$jvbTargetIndex];
                    $vertragObj->commission = $updateRecord[$commissionTargetIndex];
                    $vertragObj->update();
                } else if($itemRecord['checked'] == 2) {
                    $vertragObj->jvb = $itemRecord['jvb'] + $updateRecord[$jvbTargetIndex];
                    print_r('JVB:'. ($itemRecord['jvb'] + $updateRecord[$jvbTargetIndex]));
                    $vertragObj->commission = $itemRecord['commission'] + $updateRecord[$commissionTargetIndex];
                    print_r('COMMISSION:'.($itemRecord['commission'] + $updateRecord[$commissionTargetIndex]));
                    $vertragObj->update();
                }
                //print_r($checkedVal);
            } else {
                print_r("no found");
            }
        }
        
        Vertrag::where('checked', 2)->update(['checked'=>1]);
        

        return 0;
    }

    public function upload(Request $request)
    {
        
        $updateResult = -1;

        if ($request->hasFile('csv_name')) {
            $request->file('csv_name')->getRealPath();
            $file = fopen($request->file('csv_name')->getRealPath(), "r");
            $headerRow = fgetcsv($file);
            $keyIndex = -1;
            $keyTarget = "ZAEHLPUNKT";
            $jvbIndex = -1;
            $jvbTarget = "VERBRAUCHELVSUMME";
            $commissionIndex = -1;
            $commissionTarget = "BETRAG";
            $dataFromCSV = [];

            for($i=0; $i<sizeof($headerRow); $i++) {
                if(strcasecmp($headerRow[$i], $keyTarget) === 0 ) {
                    $keyIndex = $i;
                } else if(strcasecmp($headerRow[$i], $jvbTarget) === 0 ) {
                    $jvbIndex = $i;
                } else if(strcasecmp($headerRow[$i], $commissionTarget) === 0 ) {
                    $commissionIndex = $i;
                }

            }

            if($keyIndex >= 0 && $jvbIndex>=0 && $commissionIndex>=0) {
                while(!feof($file))
                {
                    $csvContentRow = fgetcsv($file);
                    if(is_array($csvContentRow) && gettype($csvContentRow[0]) == 'string') {
                        if(strlen($csvContentRow[0]) > 0 )
                            array_push($dataFromCSV, $csvContentRow);
                    } 
                }
                $updateResult = $this->updateItemInDB($dataFromCSV, $keyIndex, $jvbIndex, $commissionIndex);
            }
                    
            fclose($file);
        }

        $dt = Carbon::now('Asia/Kolkata');
        $todayDate = $dt->toDayDateTimeString();
        $userActive = Auth::user();
        $activityLogs = [
            'user_name' => $userActive->name,
            'email' => $userActive->email,
            'date_time' => $todayDate,
            'activity' => 'Upload "Import Data" File Name ' .$request->csv_name,
            // 'activity' => 'Upload "Import Data" Id '.$file->id. ' File Name ' .$request->csv_name,
        ];

        DB::table('activity_logs')->insert($activityLogs);

        return view('content.pages.admin.import.upload', compact('updateResult'));
    }
}
