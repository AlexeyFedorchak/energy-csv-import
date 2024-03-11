<?php

namespace App\Console\Commands;


use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserEarnings;
use App\Models\User;

class WithdrawMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'withdraw:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Withdraw monthly!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $users = User::get();
       foreach($users as $user){
        $totalEarnings = UserEarnings::where('user_id', $user->id)
            ->where(function ($query) {
            $query->where('paid_out', false)->orwhere('paid_out', null);
            })
          ->sum('earning');
           // echo $user->id."===".$totalEarnings."<br>";
         //&& (date('Y-m-t')==date('Y-m-d'))
            if(($totalEarnings >=50)){
            // Insert the withdrawal request into the withdrawal_requests table

            DB::table('withdrawal_requests')->insert([
                'user_id' => $user->id,
                'amount' => $totalEarnings, // Set a default value of 0 if the revenue is null
                'created_at' => now(),
                'updated_at' => now(),
                'paid_out' => 0,
            ]);
    
            // Mark the earnings as paid_out in the user_earnings table
            UserEarnings::where('user_id', $user->id)
                ->where(function ($query) {
            $query->where('paid_out', false)->orwhere('paid_out', null);
            }) // Only update records that are not already paid out
                ->update(['paid_out' => true]);
                }
           }
}
}