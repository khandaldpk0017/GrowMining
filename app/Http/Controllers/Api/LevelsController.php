<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DepositRequest;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use App\Services\AdminTaxesServiceAll;
use App\Services\AdminDepositRequestServiceAll;
use App\Services\AdminWithdrawRequestServiceAll;

class LevelsController extends Controller
{
    // protected $taxService;

    
    public function getLevel1Referrals()
{
    // Fetch direct referrals (Level 1)
    $userId=Auth()->user();
    $referrals = User::where('referel_by', $userId->id)->get();
    $totalWalletBalance = $referrals->sum('wallet_balance');
    return response()->json(['data'=>$referrals,'balance'=>$totalWalletBalance]);
}

public function getLevel2Referrals()
{
    // Fetch Level 1 referrals first
    $userId=Auth()->user();
    $level1Referrals = User::where('referel_by', $userId->id)->pluck('id');

    // Fetch Level 2 referrals (referred by Level 1 users)
    $level2Referrals = User::whereIn('referel_by', $level1Referrals)->get();
    $totalWalletBalance = $level2Referrals->sum('wallet_balance');
    return response()->json(['data'=>$level2Referrals,'balance'=>$totalWalletBalance]);
}

public function getLevel3Referrals()
{
    // Fetch Level 1 referrals
    $userId=Auth()->user();
    $level1Referrals = User::where('referel_by', $userId->id)->pluck('id');

    // Fetch Level 2 referrals
    $level2Referrals = User::whereIn('referel_by', $level1Referrals)->pluck('id');

    // Fetch Level 3 referrals (referred by Level 2 users)
    $level3Referrals = User::whereIn('referel_by', $level2Referrals)->get();
    $totalWalletBalance = $level3Referrals->sum('wallet_balance');
    return response()->json(['data'=>$level3Referrals,'balance'=>$totalWalletBalance]);
}


   
}
