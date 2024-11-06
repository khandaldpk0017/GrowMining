<?php

namespace App\Http\Controllers\Api;

use App\Models\ManageUserBalance;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Services\AdminTaxesServiceAll;
use App\Services\AdminTransactionsServiceAll;
use App\Services\AdminWithdrawRequestServiceAll;

class TeamEarningController extends Controller
{
    // protected $taxService;

   

    public function index(Request $request)
    {
        $user =Auth::user();
        $data= ManageUserBalance::where('user_id',$user->id)->first();
        $amount=0;
        if($data){
        $amount =$data->team_earning;
        }
        return response()->json([
            'success' => 'true',
            'team_earning' => $amount,
        ], 200);
    }

   
}
