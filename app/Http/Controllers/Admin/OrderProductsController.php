<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminOrderProductsServiceAll;

class OrderProductsController extends Controller
{
    public function __construct(AdminOrderProductsServiceAll $adminOrderProductsServiceAll)
    {
        $this->adminOrderProductsServiceAll = $adminOrderProductsServiceAll;
    }
    public function view($orderId)
    {
        return view('admin.order-transaction.orderProducts', ['orderId' => $orderId]);
    }

    // public function fetchOrderProducts(Request $request,$orderId)
    // {
    //     return $this->adminOrderProductsServiceAll->view($orderId,$request->status);
    // }
    public function fetchOrderProducts(Request $request)
    {
        return $this->adminOrderProductsServiceAll->view($request->status);
    }

    public function updateOrderStatus(Request $request)
{
    $order = Order::find($request->order_id);

    if ($order) {
        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => 'Order status updated successfully!']);
    } else {
        return response()->json(['error' => 'Order not found!'], 404);
    }
}

}
