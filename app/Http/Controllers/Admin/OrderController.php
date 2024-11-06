<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminOrdersServiceAll;

class OrderController extends Controller
{
    public function __construct(AdminOrdersServiceAll $adminOrdersServiceAll)
    {
        $this->adminOrdersServiceAll = $adminOrdersServiceAll;
    }
       protected function index(Request $request)
    {
        if ($request->ajax()) {
                
            return $this->adminOrdersServiceAll->view($request->status);
         }   

        $data = [
            'menuUsers' => 'active',
            'menuUsersView' => 'active',
            'menuUsersCollapsed' => 'show',
        ];
        return view('admin.order-transaction.list',$data);
    }

    public function showOrderProducts( $orderId)
    {
        $order = Order::with('orderProducts')->find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
    
        return response()->json($order);
    }

    public function updateOrderStatus(Request $request)
    {
        $order = Order::find($request->id);

        if ($order) {
            $order->status = $request->status;
            $order->save();

            return response()->json(['success' => 'Order status updated successfully!']);
        } else {
            return response()->json(['error' => 'Order not found!'], 404);
        }
    }

}
