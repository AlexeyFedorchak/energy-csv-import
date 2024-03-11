<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RecordMonthlyRevenue extends Command
{
    protected $signature = 'revenue:record';
    protected $description = 'Record monthly revenue and generate invoices';

    public function handle()
    {
        $userIds = DB::table('rv_account_user_assoc')
            ->pluck('user_id')
            ->unique();

        foreach ($userIds as $userId) {
            $assoc = DB::table('rv_account_user_assoc')
                ->where('user_id', $userId)
                ->pluck('account_id');

            $accounts = DB::table('rv_accounts')
                ->whereIn('account_id', $assoc)
                ->pluck('account_id');

            $affiliates = DB::table('rv_affiliates')
                ->whereIn('account_id', $accounts)
                ->pluck('affiliateid');

            $zones = DB::table('rv_zones')
                ->whereIn('affiliateid', $affiliates)
                ->pluck('zoneid');

            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();

            // Calculate the revenue for the month
            // Calculate the revenue for the month
            // Calculate the revenue for the month
            // Calculate the revenue for the month
            $revenue = DB::table('rv_data_summary_ad_hourly')
    ->join('rv_zones', 'rv_data_summary_ad_hourly.zone_id', '=', 'rv_zones.zoneid')
    ->join('rv_affiliates', 'rv_zones.affiliateid', '=', 'rv_affiliates.affiliateid')
    ->join('rv_accounts', 'rv_affiliates.account_id', '=', 'rv_accounts.account_id')
    ->join('rv_account_user_assoc', 'rv_accounts.account_id', '=', 'rv_account_user_assoc.account_id')
    ->where('rv_account_user_assoc.user_id', $userId)
    ->whereBetween(DB::raw('DATE(rv_data_summary_ad_hourly.date_time)'), [$startOfMonth->format('Y-m-d'), $endOfMonth->format('Y-m-d')])
    ->sum('rv_data_summary_ad_hourly.total_revenue');





            // Check if the monthly revenue already exists for the user
            $existingRevenue = DB::table('monthly_revenue')
                ->where('user_id', $userId)
                ->where('month', $startOfMonth)
                ->first();

            if ($existingRevenue) {
                // Update the existing revenue with the new calculated revenue
                DB::table('monthly_revenue')
                    ->where('user_id', $userId)
                    ->where('month', $startOfMonth)
                    ->update(['revenue' => $revenue]);
            } else {
                // Insert the new revenue record
                DB::table('monthly_revenue')->insert([
                    'user_id' => $userId,
                    'month' => $startOfMonth,
                    'revenue' => $revenue,
                ]);
            }
        }
    }
}
