<?php

namespace App\Http\Controllers\Api;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Services\AdminTaxesServiceAll;
use App\Services\AdminTransactionsServiceAll;
use App\Services\AdminWithdrawRequestServiceAll;

class TransactionsController extends Controller
{
    // protected $taxService;

   

    public function index(Request $request)
    {
        $user =Auth::user();
        $data= Transaction::where('user_id',$user->id)->get();

        return response()->json([
            'success' => 'true',
            'data' => $data,
        ], 200);
    }

   
}
