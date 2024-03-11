<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\VertragController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminImportController;
use App\Http\Controllers\AdminDownloadsController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\UserDownloadsController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\UserFaqController;
use App\Http\Controllers\AdminSiteSettingsController;
use App\Http\Controllers\AdminTeamsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KundenController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\TarifeController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\VermittlernummerController;
use App\Http\Controllers\LieferantenController;
use App\Mail\SendVertraegeSignLink;
use Carbon\Carbon;

//use AuthenticatesUsers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {
  Artisan::call('cache:clear');
  Artisan::call('optimize');
  Artisan::call('route:cache');
  Artisan::call('view:clear');
  Artisan::call('config:cache');
  return '<h1>Cache facade value cleared</h1>';
});

$controller_path = 'App\Http\Controllers';

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
#Downloads
  Route::get('/admin/downloads', [AdminDownloadsController::class, 'index'])->name('admin.downloads');
  Route::get('/admin/downloads/add', [AdminDownloadsController::class, 'create'])->name('admin.downloads.create');
  Route::post('/admin/downloads', [AdminDownloadsController::class, 'store'])->name('admin.downloads.store');
  Route::get('/admin/downloads/edit/{id}', [AdminDownloadsController::class, 'edit'])->name('admin.downloads.edit');
  Route::put('/admin/downloads/update/{id}', [AdminDownloadsController::class, 'update'])->name('admin.downloads.update');
  Route::delete('/admin/downloads/{id}', [AdminDownloadsController::class, 'destroy'])->name('admin.downloads.destroy');
  Route::get('/download', [DownloadController::class,'download'])->name('download');

#FAQs
  Route::get('/admin/fua', [AdminFaqController::class,'create'])->name('admin.faq.create');
  Route::post('/admin/fua/store', [AdminFaqController::class,'store'])->name('admin.faq.store');
  Route::get('/admin/fua/{id}/edit', [AdminFaqController::class,'edit'])->name('admin.faq.edit');
  Route::put('/admin/fua/{id}', [AdminFaqController::class,'update'])->name('admin.faq.update');
  Route::delete('/admin/fua/{id}', [AdminFaqController::class,'destroy'])->name('admin.faq.destroy');

#Setting
  Route::get('/admin/settings', [AdminSiteSettingsController::class, 'index'])->name('admin.site-settings.index');
  Route::post('/admin/settings', [AdminSiteSettingsController::class, 'update'])->name('admin.site-settings.update');

#Vertraege
  Route::get('/admin/vertraege', [VertragController::class, 'index'])->name('admin.vertraege');
  Route::get('/admin/import', [AdminImportController::class, 'index'])->name('admin.import');
  Route::get('/admin/import/upload', [AdminImportController::class, 'upload'])->name('admin.import.upload1');
  Route::post('/admin/import/upload', [AdminImportController::class, 'upload'])->name('admin.import.upload');

#Teams
  Route::get('/admin/teams', [AdminTeamsController::class, 'index'])->name('admin.teams');
  Route::get('/admin/teams/create', [AdminTeamsController::class, 'create'])->name('admin.teams.create');
  Route::post('/admin/teams', [AdminTeamsController::class, 'store'])->name('admin.teams.store');
  Route::get('/admin/teams/{id}/edit', [AdminTeamsController::class, 'edit'])->name('admin.teams.edit');
  Route::put('/admin/teams/{id}', [AdminTeamsController::class, 'update'])->name('admin.teams.update');

#Tarife
  Route::get('/admin/tarife', [TarifeController::class, 'index'])->name('admin.tarife');
  Route::get('/admin/tarife/create', [TarifeController::class, 'create'])->name('admin.tarife.create');
  Route::post('/admin/tarife/validate-pdf', [TarifeController::class, 'validatePdf'])->name('admin.tarife.validate-pdf');
  Route::post('/admin/tarife', [TarifeController::class, 'store'])->name('admin.tarife.store');
  Route::get('/admin/tarife/{id}/edit', [TarifeController::class, 'edit'])->name('admin.tarife.edit');
  Route::put('/admin/tarife/{id}', [TarifeController::class, 'update'])->name('admin.tarife.update');
  Route::get('/admin/tarife/delete/{id}',[TarifeController::class,'remove'])->name('tarife.delete');


#Avtivity
  Route::get('/admin/activitys', [ActivityLogController::class, 'index'])->name('admin.activitys');
  Route::get('/admin/activity/delete/{id}',[ActivityLogController::class,'remove'])->name('activity.delete');
  Route::delete('/selected-all-data',[ActivityLogController::class,'deleteAll'])->name('deleteAll');


#Contract
  Route::get('/admin/contract', [ContractController::class, 'index'])->name('admin.contract');
  Route::get('/admin/contract/create', [ContractController::class, 'create'])->name('admin.contract.create');
  Route::post('/admin/contract', [ContractController::class, 'store'])->name('admin.contract.store');
  Route::get('/admin/contract/{id}/edit', [ContractController::class, 'edit'])->name('admin.contract.edit');
  Route::put('/admin/contract/{id}', [ContractController::class, 'update'])->name('admin.contract.update');
  Route::get('/admin/contract/delete/{id}',[ContractController::class,'remove'])->name('contract.delete');

#Users
  Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
  Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
  Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
  Route::get('/admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
  Route::put('/admin/users/edit/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
#lieferanten
  Route::get('/admin/lieferanten', [LieferantenController::class,'index'])->name('admin.lieferanten.index');
  Route::get('/admin/lieferanten/create', [LieferantenController::class,'create'])->name('admin.lieferanten.create');
  Route::post('/admin/lieferanten/store', [LieferantenController::class,'store'])->name('admin.lieferanten.store');
  Route::get('/admin/lieferanten/{id}/edit', [LieferantenController::class,'edit'])->name('admin.lieferanten.edit');
  Route::put('/admin/lieferanten/{id}', [LieferantenController::class,'update'])->name('admin.lieferanten.update');
  Route::delete('/admin/lieferanten/{id}', [LieferantenController::class,'destroy'])->name('admin.lieferanten.destroy');
  #vermittlernummer
  Route::get('/admin/vermittlernummer', [VermittlernummerController::class,'index'])->name('admin.vermittlernummer.index');
  Route::get('/admin/vermittlernummer/create', [VermittlernummerController::class,'create'])->name('admin.vermittlernummer.create');
  Route::post('/admin/vermittlernummer/store', [VermittlernummerController::class,'store'])->name('admin.vermittlernummer.store');
  Route::get('/admin/vermittlernummer/edit/{id}', [VermittlernummerController::class,'edit'])->name('admin.vermittlernummer.edit');
  Route::put('/admin/vermittlernummer/{id}', [VermittlernummerController::class,'update'])->name('admin.vermittlernummer.update');
  Route::delete('/admin/vermittlernummer/{id}', [VermittlernummerController::class,'destroy'])->name('admin.vermittlernummer.destroy');
});

Route::get('test',function(){
  return 'o';
});
Route::get('/', function () {
  if (Auth::check()) {
    return redirect('/dashboard');
  }
  		$dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
  		$activityLogs = [
          'user_name' => 'Login Visit',
          'email' => '',
          'date_time' => $todayDate,
          'activity' => 'User IP: '.$_SERVER['REMOTE_ADDR'],
        ];
        DB::table('activity_logs')->insert($activityLogs);
  return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
  Route::get('/team', function () {
    return view('content.pages.team');
  })->name('team');
  Route::get('/provisionen', function () {
    return view('content.pages.provisionen.index');
  })->name('provisionen');
});

Route::middleware(['guest'])->group(function () {
  Route::get('/login', function () {
    $dt = Carbon::now();
      $todayDate = $dt->toDayDateTimeString();
    $activityLogs = [
          'user_name' => 'Login Visit',
          'email' => '',
          'date_time' => $todayDate,
          'activity' => 'User IP: '.$_SERVER['REMOTE_ADDR'],
        ];
        DB::table('activity_logs')->insert($activityLogs);
    return view('auth.login');
  })->name('login');

  Route::post('/login', function () {

    $credentials = request()->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $dt = Carbon::now('Asia/Kolkata');
      $todayDate = $dt->toDayDateTimeString();
      $userActive = Auth::user();
      if($userActive->role == 1){
        $activityLogs = [
          'user_name' => $userActive->name,
          'email' => $userActive->email,
          'date_time' => $todayDate,
          'activity' => '"Admin Login" Id '.$userActive->id. ' Name ' .$userActive->name,
        ];
      } else if($userActive->role == 0){
        $activityLogs = [
          'user_name' => $userActive->name,
          'email' => $userActive->email,
          'date_time' => $todayDate,
          'activity' => '"User Login" Id '.$userActive->id. ' Name ' .$userActive->name,
        ];
      }

      DB::table('activity_logs')->insert($activityLogs);
      return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  })->name('login.post');

  /*Route::post('/logout', function (Request $request){ 
    Auth::logout(); 
    return redirect()->route('login');
  })->name('account.logout');*/
});

Route::post('/logout', function (Request $request){ 
  Auth::logout(); 
  return redirect()->route('login');
})->name('account.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


#Team
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
Route::post('/team', [TeamController::class, 'store'])->name('team.store');
Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::put('/team/edit/{id}', [TeamController::class, 'update'])->name('team.update');
Route::get('/team/{user}/deactivate', [TeamController::class, 'deactivate'])->name('team.deactivate');
Route::get('/team/deactivated', [TeamController::class, 'deactivated'])->name('team.deactivated');

#Group
Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/edit/{id}', [GroupController::class, 'update'])->name('groups.update');
Route::get('/groups/{user}/deactivate', [GroupController::class, 'deactivate'])->name('groups.deactivate');
Route::get('/groups/deactivated', [GroupController::class, 'deactivated'])->name('groups.deactivated');

#kunden Route
Route::get('/kunden', [KundenController::class, 'index'])->name('kunden.index');
Route::get('/kunden/create', [KundenController::class, 'create'])->name('kunden.create');
Route::post('/kunden', [KundenController::class, 'store'])->name('kunden.store');
Route::get('/kunden/{user}/edit', [KundenController::class, 'edit'])->name('kunden.edit');
Route::put('/kunden/{user}', [KundenController::class, 'update'])->name('kunden.update');
Route::get('kunden/delete/{id}',[KundenController::class,'remove'])->name('kunden.delete');
Route::get('/kunden/{user}/deactivate', [KundenController::class, 'deactivate'])->name('kunden.deactivate');
Route::get('/kunden/deactivated', [KundenController::class, 'deactivated'])->name('kunden.deactivated');
Route::get('/kunden/activated', [KundenController::class, 'activate'])->name('kunden.activate');
Route::get('/kunden/{user}/contract', [KundenController::class, 'contract'])->name('kunden.contract');
Route::post('/kunden/{user}/comment', [KundenController::class, 'comment'])->name('kunden.comment');
Route::get('/comments/{user}', [KundenController::class, 'viewcomments'])->name('comments');

#Vertraege
Route::get('/vertraege', [VertragController::class, 'index'])->name('vertraege.index');
Route::any('/vertraege/create/{id?}', [VertragController::class, 'create'])->name('vertraege.create');
Route::get('/vertraege/contract/{id?}', [VertragController::class, 'contract'])->name('vertraege.contract');
Route::get('/vertraege/edit/{id}', [VertragController::class, 'edit'])->name('vertraege.edit');
Route::put('/vertraege/edit/{id}', [VertragController::class, 'update'])->name('vertraege.update');
Route::post('/vertraege', [VertragController::class, 'store'])->name('vertraege.store');
Route::get('/vertraege/sign-pdf/{token}', [VertragController::class, 'signature'])->name('vertraege.signature');
Route::get('/vertraege/pdf/{id}', [VertragController::class, 'pdf'])->name('vertraege.pdf');
Route::post('/vertraege/send-sign-link', [VertragController::class, 'sendSignLink'])->name('vertraege.send-signed-link');
Route::post('/vertraege/save-signed-pdf', [VertragController::class, 'saveSignedPdf'])->name('vertraege.save-signed-pdf');

Route::any('/angebot/{id}', [VertragController::class, 'angebot'])->name('vertraege.angebot');
Route::get('/angebot/send/pdf', [VertragController::class, 'send_mail'])->name('vertraege.send_mail');
Route::get('/get-tarife', [VertragController::class, 'getTarife'])->name('vertraege.getTarife');
Route::get('/get-fields', [VertragController::class, 'tarifeData'])->name('vertraege.tarifeData');




Route::get('set/angebot',function(Request $request){
  
});


#Download aread
Route::get('/downloadarea', [AdminDownloadsController::class, 'userindex'])->name('user.download');

#Fua
Route::get('/fua', [UserFaqController::class,'index'])->name('faq.show');

#Calendar view
Route::get('/calender', [CalenderController::class, 'index'])->name('calendar.index');
Route::post('/get-user-data', [VertragController::class, 'getUserData'])->name('ajax');
Route::get('/user-details/{id}', [VertragController::class, 'getUserDetails'])->name('getUserDetails');

#Commission
Route::get('/commission', [CommissionController::class, 'index'])->name('commission.index');

#Calendar view
Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
