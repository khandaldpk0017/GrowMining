<?php

namespace App\Http\Controllers\Api;

use App\Models\ReferCommission;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Services\AdminTaxesServiceAll;

class ReferCommissionController extends Controller
{
    // protected $taxService;

 

    
   

    public function index()
    {
        $data=ReferCommission::first();
        $salary = Salary::all();
        return response()->json(['data'=>$data,'salary'=>$salary,'success'=>true]);
    }

  
}
