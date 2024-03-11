<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminSiteSettingsController extends Controller
{
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




return view('content.pages.admin.site-settings.site-settings', compact('siteName', 'wienenergiestrom', 'wienenergiegas', 'enstrogastrom', 'enstrogagas', 'gruenstrom', 'gruengas', 'maxstrom', 'maxgas', 'montanastrom', 'montanagas', 'oekostrom', 'oekogas', 'uwkstrom', 'uwkgas', 'eonstrom', 'eongas', 'goldgasstrom', 'goldgasgas', 'gostrom', 'gogas', 'switchstrom', 'switchgas', 'erstestrom', 'erstegas', 'verbundstrom', 'verbundgas', 'graspreis', 'kokspreis'));
}
public function update(Request $request)
{

    $request->validate([
        'site_name' => 'required',
	'we_strom' => 'required',
	'we_gas' => 'required',
	'ens_strom' => 'required',
	'ens_gas' => 'required',
	'gruen_strom' => 'required',
	'gruen_gas' => 'required',
	'max_stromm' => 'required',
	'max_gas' => 'required',
	'mon_strom' => 'required',
	'mon_gas' => 'required',
	'oeko_strom' => 'required',
	'oeko_gas' => 'required',
	'uwk_strom' => 'required',
	'uwk_gas' => 'required',
	'eon_strom' => 'required',
	'eon_gas' => 'required',
	'gg_strom' => 'required',
	'gg_gas' => 'required',
	'go_strom' => 'required',
	'go_gas' => 'required',
	'ver_strom' => 'required',
	'ver_gas' => 'required',
	'switch_strom' => 'required',
	'switch_gas' => 'required',
	'erste_strom' => 'required',
	'erste_gas' => 'required',
	'graspreis' => 'required',
	'kokspreis' => 'required'
    ]);
            SiteSetting::updateOrCreate(
            ['setting' => 'site_name'],
            ['value' => $request->input('site_name')]
        );
	SiteSetting::updateOrCreate(
		['setting' => 'we_strom'],
		['value' => $request->input('we_strom')]
);

        SiteSetting::updateOrCreate(
                ['setting' => 'we_gas'],
                ['value' => $request->input('we_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'ens_strom'],
                ['value' => $request->input('ens_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'ens_gas'],
                ['value' => $request->input('ens_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'gruen_strom'],
                ['value' => $request->input('gruen_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'gruen_gas'],
                ['value' => $request->input('gruen_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'max_strom'],
                ['value' => $request->input('max_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'max_gas'],
                ['value' => $request->input('max_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'mon_strom'],
                ['value' => $request->input('mon_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'mon_gas'],
                ['value' => $request->input('mon_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'oeko_strom'],
                ['value' => $request->input('oeko_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'oeko_gas'],
                ['value' => $request->input('oeko_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'uwk_strom'],
                ['value' => $request->input('uwk_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'uwk_gas'],
                ['value' => $request->input('uwk_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'eon_strom'],
                ['value' => $request->input('eon_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'eon_gas'],
                ['value' => $request->input('eon_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'gg_strom'],
                ['value' => $request->input('gg_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'gg_gas'],
                ['value' => $request->input('gg_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'go_strom'],
                ['value' => $request->input('go_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'go_gas'],
                ['value' => $request->input('go_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'ver_strom'],
                ['value' => $request->input('ver_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'ver_gas'],
                ['value' => $request->input('ver_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'switch_strom'],
                ['value' => $request->input('switch_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'switch_gas'],
                ['value' => $request->input('switch_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'erste_strom'],
                ['value' => $request->input('erste_strom')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'erste_gas'],
                ['value' => $request->input('erste_gas')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'graspreis'],
                ['value' => $request->input('graspreis')]
);
        SiteSetting::updateOrCreate(
                ['setting' => 'kokspreis'],
                ['value' => $request->input('kokspreis')]
);


    return redirect()->route('admin.site-settings.index')->with('success', 'Erfolgreich geupdated!');
}
}
