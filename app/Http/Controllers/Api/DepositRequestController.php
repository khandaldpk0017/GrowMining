<?php

namespace App\Http\Controllers\Api;

use App\Models\Tax;
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

   

    public function index(Request $request)
    {
        $user=Auth::user();
       $data= DepositRequest::where('user_id',$user->id)->get();

       return response()->json(['data' => $data,"success"=>true], 201);
    }

   
}
