<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $activityLogs = [
          'user_name' => 'Login',
          'email' => '',
          'date_time' => date('Y-m-d H:i'),
          'activity' => 'User IP: '.$_SERVER['REMOTE_ADDR'],
        ];
        DB::table('activity_logs')->insert($activityLogs);
        $guards = empty($guards) ? [null] : $guards;
         
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $dt = Carbon::now('Asia/Kolkata');
                $todayDate = $dt->toDayDateTimeString();
                $userActive = Auth::user();
                $activityLogs = [
                    'user_name' => $userActive->name,
                    'email' => $userActive->email,
                    'date_time' => $todayDate,
                    'activity' => '"Admin Login" Id '.$userActive->id. ' Name ' .$userActive->name,
                ];

                DB::table('activity_logs')->insert($activityLogs);
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
