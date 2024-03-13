<?php

namespace App\Http\Controllers;

use App\Models\Abrechnung;
use App\Models\SiteSetting;
use App\Models\Vertrag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function updateItemInDB(array $updateRecordArray, array $index, Carbon $period)
    {
        $updateStatus = -1;

        DB::beginTransaction();

        foreach ($updateRecordArray as $updateRecord) {

            $jvb = $this->convertStringToFloat($updateRecord[$index['jvb']] ?? '');
            $commission = $this->convertStringToFloat($updateRecord[$index['commission']] ?? '');

            if ($jvb == 0 && $commission == 0) {
                print_r('jvb and commision is not parsed or equal to 0');
                continue;
            }

            if ($vertrag = Vertrag::where('zpn', 'LIKE', '%"'.($updateRecord[$index['zpn']] ?? '').'"%')->first()) {

                $monatOrYear = $updateRecord[$index['modalitat']] ?? '';
                $vertrag->monat_or_year = (false !== stripos($monatOrYear, 'airtime'))
                    ? Vertrag::MONTHLY
                    : Vertrag::ANNUAL;

                if ($vertrag->checkExistingContracts($period)) {
                    print_r('This contract is already processed');
                    continue;
                }

                if ($vertrag->checked == 0) {
                    $vertrag->checked = 1;
                    $vertrag->jvb = $jvb;
                    $vertrag->commission = $commission;
                } elseif ($vertrag->checked == 2) {
                    $vertrag->jvb += $jvb;
                    $vertrag->commission += $commission;
                }

                $vertrag->update();

                Abrechnung::create([
                  'contract_id' => $vertrag->id,
                  'user_id' => $vertrag->created_by,
                  'kwh' => $jvb,
                  'commission' => $commission,
                  'period' => $period,
                ]);

                $updateStatus = 0;
            } else {
                print_r('no found');
            }
        }


        Vertrag::where('checked', 2)->update(['checked' => 1]);

        DB::commit();

        return $updateStatus;
    }

    public function upload(Request $request)
    {
        $updateResult = -1;

        if ($request->hasFile('csv_name')) {
            $periodDate = Carbon::parse($request->input('period', now()));
            $path = $request->file('csv_name')->getRealPath();

            $fileData = array_map(function($line) {
              return str_getcsv($line, ';');
            }, file($path));

            $headerRow = array_slice($fileData, 0, 1)[0] ?? [];

            $index = [
              'zpn' => $this->findColumnIndex($headerRow, 'zaehlpunkt')
                  ?? $this->findColumnIndex($headerRow, 'nummer'),
              'jvb' => $this->findColumnIndex($headerRow, 'verbrauch')
                  ?? $this->findColumnIndex($headerRow, 'verbrauchelvsumme'),
              'commission' => $this->findColumnIndex($headerRow, 'provision')
                  ?? $this->findColumnIndex($headerRow, 'betrag'),
              'modalitat' => $this->findColumnIndex($headerRow, 'modal'),
            ];

            $index = array_map(function($value) {return ($value === null) ? -1 : $value;}, $index);

            if (!in_array(-1, $index)) {
                $updateResult = $this->updateItemInDB($fileData, $index, $periodDate);
            }
        }

        DB::table('activity_logs')->insert([
            'user_name' => auth()->user()?->name,
            'email' => auth()->user()?->email,
            'date_time' => now('Asia/Kolkata')->toDayDateTimeString(),
            'activity' => 'Upload "Import Data" File Name ' . $request->csv_name,
        ]);

        return view('content.pages.admin.import.upload', compact('updateResult'));
    }

  /**
   * @param array $header
   * @param string $search
   *
   * @return int|null
   */
    private function findColumnIndex(array $header, string $search): ?int
    {
      $row = array_filter($header, function($index) use ($search) {
        return false !== stripos($index, $search);
      });

      return count($row) === 1
        ? key($row)
        : null;
    }

  /**
   * @param string $number
   *
   * @return float
   */
    private function convertStringToFloat(string $number): float
    {
        if (str_contains($number, '.') && str_contains($number, ',')) {
            $number = str_replace(',', '.', $number);
            $number = str_replace('.', '', $number);

            return (float) $number;
        }

        if (str_contains($number, ',')) {
            $number = str_replace(',', '.', $number);
        }

        return (float) $number;
    }
}
