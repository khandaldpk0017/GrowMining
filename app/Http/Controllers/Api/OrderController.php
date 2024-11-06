<?php

namespace App\Http\Controllers\Api;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ReferCommission;
use App\Models\ManageUserBalance;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)->get();
        
        // return response()->json($orders);
        return response()->json($orders->map(function($order) {
            return [
                'id' => $order->id,
                'user_id' => $order->user_id,
                'user_name' => $order->user_name,
                'total_amount' => $order->total_amount,
                'perday_earning' => $order->perday_earning,
                'total_earning' => $order->total_earning,
                'expire_days' => $order->expire_days,
                'product_name' => $order->product_name,
                'created_at' => $order->formatted_created_at, // Use accessor here
                'status' => $order->status,
                // Add other fields you want to include
            ];
        }));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'productDetails.name' => 'required|',
            'productDetails.id' => 'required|',
            'productDetails.perday_earning' => 'required|',
            'productDetails.total_earning' => 'required|',
            'productDetails.expire_days' => 'required|',
            'productDetails.price' => 'required|',
            
        ]);
        $user=Auth::user();
        
        // dd($user->name);
        if($user->wallet_balance >= $request->productDetails['price']){
            $order = Order::create([
                'user_id' => $validatedData['user_id'],
                'user_name'=>$user->name,
                'total_amount'=> $request->productDetails['price'],
                'product_id'=>$request->productDetails['id'],
                'product_name'=>$request->productDetails['name'],
                'perday_earning'=>$request->productDetails['perday_earning'],
                'total_earning'=>$request->productDetails['total_earning'],
                'expire_days'=>$request->productDetails['expire_days'],
            ]);
            $user->wallet_balance -=$request->productDetails['price'];
            $user->save();
            $transaction=Transaction::create([
                'user_id'=>$validatedData['user_id'],
                'user_name'=>$user->name,
                'amount'=>$request->productDetails['price'],
                'transaction_type'=>"product purshase",
                'type'=>"debit",
                'status'=>"completed",
            ]);
        
            $commissionPercent=ReferCommission::first();
        
            if ($user->referel_by) {
                $parent = User::where('id', $user->referel_by)->first();
                $commission = $request->productDetails['price'] * ($commissionPercent->parent/100); // 2% commission for parent
    
                // Credit the parent wallet
                $parent->wallet_balance += $commission;
                $parent->save();
                $checktransaction= ManageUserBalance::where('user_id',$parent->id)->first();
                if($checktransaction){
                    $checktransaction->team_earning+=$commission;
                    $checktransaction->save();
                }
                else{
                    ManageUserBalance::create(['user_id'=>$parent->id,
                    "user_name"=>$parent->name,
                    'team_earning'=>$commission
                    ]);
                }
            }
                // Check if the parent has a referer (sub-parent) for another 2% commission
            if ($parent->referel_by) {
                $subParent = User::where('id',$parent->referel_by)->first();
                $subParentCommission = $request->productDetails['price'] * ($commissionPercent->parent_of_parent/100); // 2% commission for sub-parent

                // Credit the sub-parent wallet
            
                $subParent->wallet_balance += $subParentCommission;
                $subParent->save();
                $checktransaction= ManageUserBalance::where('user_id',$subParent->id)->first();
                if($checktransaction){
                    $checktransaction->team_earning+=$subParentCommission;
                    $checktransaction->save();
                }
                else{
                    ManageUserBalance::create(['user_id'=>$subParent->id,
                    "user_name"=>$subParent->name,
                    'team_earning'=>$subParentCommission
                    ]);
                }
            }
            if ($subParent->referel_by) {
                $childParent = User::where('id',$subParent->referel_by)->first();
                $childParentCommission = $request->productDetails['price'] * ($commissionPercent->grand_parent/100); // 2% commission for sub-parent

                // Credit the sub-parent wallet
                
                $childParent->wallet_balance += $childParentCommission;
                $childParent->save();
                $checktransaction= ManageUserBalance::where('user_id',$childParent->id)->first();
                    if($checktransaction){
                        $checktransaction->team_earning+=$childParentCommission;
                        $checktransaction->save();
                    }
                    else{
                        ManageUserBalance::create(['user_id'=>$childParent->id,
                        "user_name"=>$childParent->name,
                        'team_earning'=>$childParentCommission
                        ]);
                    }
            }
               
                return response()->json(['message' => "order created successfully","success"=>true], 201);
        }
        else{
            return response()->json(['message' => "insufficient balance","success"=>false], 400);
        }
    }
}
