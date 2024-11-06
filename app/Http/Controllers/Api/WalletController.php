<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\QrCode;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    //
    public function getRandomQrOrUpi()
    {
        $qrCodes = QrCode::all();
    
        if ($qrCodes->isEmpty()) {
            return response()->json(null);
        }
    
        $randomQrCode = $qrCodes->random();
        return response()->json($randomQrCode);
    }
    // Get current wallet balance
    public function getWalletBalance()
    {
        $user = Auth::user();
        return response()->json([
            'wallet_balance' => $user->wallet_balance,
            'account_number' => $user->account_number,
            'account_holder_name' => $user->account_holder_name,
            'bank_name' => $user->bank_name,
            'ifsc_code' => $user->ifsc_code,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
        ]);
    }

    // Add money to wallet
    public function addMoney(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'utr_number' => 'required',
                'qr_code_id' => 'required',
                'ss' => 'required',
        ]);
        $imageName="";
        if ($request->hasFile("ss")) {
            $thumbnailImage = $request->file("ss");
            // $thumbnailImagePath = $thumbnailImage->store('public/products/variants');
            $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
                    $thumbnailImage->storeAs('public/images', $thumbnailImageName);
            $imageName = $thumbnailImageName;
        }
        $user = Auth::user();
        DepositRequest::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'utr_number' => $request->utr_number,
            'qr_code_id' => $request->qr_code_id,
            'ss' => $imageName,
        ]);

        // $user->wallet_balance += $request->amount;
        // $user->save();

        return response()->json([
            'message' => 'Money add Request successfully',
            'wallet_balance' => $user->wallet_balance,
        ], 200);
    }

    // Withdraw money from wallet
    public function withdrawMoney(Request $request)
    {
        $user = Auth::user();
        $withdrawalsToday = WithdrawRequest::where('user_id', $user->id)
        ->whereDate('created_at', Carbon::today())
        ->count();
        if ($withdrawalsToday >= 3) {
            return response()->json([
                'message' => 'You have reached your daily withdrawal limit of 3 requests.'
            ], 403);  // Forbidden status
        }
        // If the user doesn't have account details, validate and store them
        if (!$user->account_number || !$user->ifsc_code) {
            $request->validate([
                'amount' => 'required|numeric|min:1',
                'total_amount' => 'required|numeric|min:1',
                'account_number' => 'required|string',
                'ifsc_code' => 'required|string',
                'account_holder_name' => 'required|string',
            ]);

            // Store account details
            $user->account_number = $request->account_number;
            $user->ifsc_code = $request->ifsc_code;
            $user->account_holder_name = $request->account_holder_name;
            $user->save();
        } else {
            // Validate only the amount if account details already exist
            $request->validate([
                'amount' => 'required|numeric|min:1',
                'total_amount' => 'required|numeric|min:1',
            ]);
        }

        // Check if user has sufficient balance
        if ($user->wallet_balance >= $request->amount) {
            // Process withdrawal (for now, just subtract the amount)
            WithdrawRequest::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'account_number' => $user->account_number,
                'ifsc_code' => $user->ifsc_code,
            ]);
            $user->wallet_balance -= $request->total_amount;
            
            $user->save();
            $transaction=Transaction::create(
                ['user_id'=>$user->id,
            'user_name'=>$user->name,
            'amount'=>$request->total_amount,
            'transaction_type'=>"Withdraw money",
            'type'=>"debit",
            'status'=>"completed",
            ]);

            return response()->json([
                'message' => 'Money withdrawl request successfully',
                'wallet_balance' => $user->wallet_balance,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Insufficient funds',
            ], 400);
        }
    }
    public function getWalletAndAccountDetails()
    {
        $user = Auth::user();

        return response()->json([
            'wallet_balance' => $user->wallet_balance,
            'account_number' => $user->account_number,
            'ifsc_code' => $user->ifsc_code,
        ]);
    }
    
    public function updateACdetails(Request $request)
    {
        $user = Auth::user();
        $user->account_number = $request->account_number;
        $user->ifsc_code = $request->ifsc_code;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => "Account details Update successfully",
            'account_number' => $user->account_number,
            'ifsc_code' => $user->ifsc_code,
            'name' => $user->ifsc_code,
            'email' => $user->email,
            'mobile' => $user->mobile,
        ]);
    }
}
