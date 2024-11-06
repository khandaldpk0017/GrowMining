<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Salary;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Console\Command;
use App\Models\ManageUserBalance;
use Illuminate\Support\Facades\DB;

class AddSalaryPerDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-salary-per-day-earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add salary per day earnings to users wallet ';
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
        $users = User::all();
        foreach ($users as $user) {
            $referrals = User::select('id')->where('referel_by', $user->id)->get()->count();
            $level1Referrals = User::where('referel_by', $user->id)->pluck('id');

            // Fetch Level 2 referrals (referred by Level 1 users)
            $level2ReferralsCount = User::select('id')->whereIn('referel_by', $level1Referrals)->get()->count();

            // Fetch Level 2 referrals
            $level2Referrals = User::whereIn('referel_by', $level1Referrals)->pluck('id');
        
            // Fetch Level 3 referrals (referred by Level 2 users)
            $level3Referrals = User::whereIn('referel_by', $level2Referrals)->get()->count();
            $totalCount = $referrals + $level2ReferralsCount + $level3Referrals;
            $salaries = Salary::where('refer_count','<=',$totalCount)->orderBy('id','desc')->first();
            // foreach ($salaries as $salary) {
                if($salaries && $totalCount >=$salaries->refer_count){
                    $userSALARY = User::find($user->id);
                    
                        if ($userSALARY) {
                            // Add per day earning to the user's wallet
                            $userSALARY->wallet_balance += $salaries->salary;
                            $userSALARY->save();
                            $transaction=Transaction::create(
                                ['user_id'=>$userSALARY->id,
                            'user_name'=>$userSALARY->name,
                            'amount'=>$salaries->salary,
                            'transaction_type'=>"Perday Salary",
                            'type'=>"credit",
                            'status'=>"completed",
                            ]);
                            $checktransaction= ManageUserBalance::where('user_id',$userSALARY->id)->first();
                            if($checktransaction){
                                $checktransaction->team_earning+=$salaries->salary;
                            }
                            else{
                                ManageUserBalance::create(['user_id'=>$userSALARY->id,
                                "user_name"=>$userSALARY->name,
                                'team_earning'=>$salaries->salary
                            ]);

                            $this->info("Added {$salaries->salary} to user {$userSALARY->name}'s wallet.");
                        }
                    }
                }

            // }
       
        DB::commit();
        return 0;
    }}
      catch (\Exception $e) {
            // Rollback the transaction if there is any error
            DB::rollBack();
            $this->error('Failed to update wallets: ' . $e->getMessage());
        }
    }
}
