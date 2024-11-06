<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\AdminTaxesServiceAll;
use App\Services\AdminDepositRequestServiceAll;
use App\Services\AdminWithdrawRequestServiceAll;

class DepositRequestController extends Controller
{
    // protected $taxService;

    public function __construct(AdminDepositRequestServiceAll $AdminDepositRequest)
    {
        $this->AdminDepositRequest = $AdminDepositRequest;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->AdminDepositRequest->view();
        }

        return view('admin.depositRequest.index');
    }

    public function updateStatus(Request $request)
{
    $order = DepositRequest::find($request->id);
    $user=User::where('id',$order->user_id)->first();

    if ($order) {
        if($request->status=="completed"){
        $user->wallet_balance += $order->amount;
        $user->save();
        $transaction=Transaction::create(
            ['user_id'=>$user->id,
        'user_name'=>$user->name,
        'amount'=>$order->amount,
        'transaction_type'=>"Deposit money",
        'type'=>"credit",
        'status'=>"completed",
        ]);
        }
        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => 'Request status updated successfully!']);
    } else {
        return response()->json(['error' => 'Request not found!'], 404);
    }
}
}
