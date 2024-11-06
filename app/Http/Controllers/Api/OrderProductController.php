<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderProductController extends Controller
{

    public function index(Request $request)
    {
        $order_id=$request->orderId;
        // Ensure user is authorized to view the order
        // dd($request->orderId);
        $orderProducts = OrderProduct::where('order_id', $order_id)->get();
        return response()->json($orderProducts);
    }
}
