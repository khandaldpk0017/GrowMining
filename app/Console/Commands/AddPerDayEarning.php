<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddPerDayEarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-per-day-earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add per day earnings to users wallet based on active orders';
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
        $today = Carbon::now();

        // Fetch all active (non-expired) orders
        $activeProducts = Product::select('id')->where('status',1)->get();
        
        $activeOrders = Order::whereIn('product_id', $activeProducts)->get();
        foreach ($activeOrders as $order) {
            // Get the user associated with the order
            $user = User::find($order->user_id);

            if ($user) {
                // Add per day earning to the user's wallet
                $user->wallet_balance += $order->perday_earning;
                $user->save();
                $transaction=Transaction::create(
                    ['user_id'=>$user->id,
                'user_name'=>$user->name,
                'amount'=>$order->perday_earning,
                'transaction_type'=>"Perday Earning",
                'type'=>"credit",
                'status'=>"completed",
                ]);

                $this->info("Added {$order->perday_earning} to user {$user->user_name}'s wallet.");
            }
        }
        DB::commit();
        return 0;
    }
      catch (\Exception $e) {
            // Rollback the transaction if there is any error
            DB::rollBack();
            $this->error('Failed to update wallets: ' . $e->getMessage());
        }
    }
}
