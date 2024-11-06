<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use App\Services\AdminOrdersServiceAll;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $timeFilter = $request->input('timeFilter', '');

        // Determine the date range based on the selected filter
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now();

        if ($timeFilter == '0') {
            // Last Week
            $startDate = Carbon::now()->startOfWeek();
        } elseif ($timeFilter == '1') {
            // Last Month
            $startDate = Carbon::now()->startOfMonth();
        } elseif ($timeFilter == '2') {
            // Last Year
            $startDate = Carbon::now()->startOfYear()->subYear();
        }
        

        // Get total sales and earnings
        $totalSales = Order::whereBetween('created_at', [$startDate, $endDate])->sum('total_amount');
        $totalEarnings = Order::whereBetween('created_at', [$startDate, $endDate])->sum('total_amount'); // Assuming total_amount is the revenue

        // Get total products sold
        $totalProductsSold = ProductVariant::whereBetween('created_at', [$startDate, $endDate])->sum('order_count');
            

        // Get recent orders
        $recentOrders = OrderProduct::whereBetween('created_at', [$startDate, $endDate])->with(['order.user'])->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get top 5 sold products
        $topProducts = ProductVariant::whereBetween('created_at', [$startDate, $endDate])->with(['product'])->orderBy('order_count', 'desc')->limit(5)
        ->get();
        $earningsData = Payment::whereBetween('created_at', [$startDate, $endDate])->selectRaw('DATE(created_at) as date, SUM(amount) as total')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get()
        ->map(function($item) {
            return [
                'date' =>  Carbon::parse($item->date)->format('Y-m-d'),
                'total' => $item->total
            ];
        });
        $products = OrderProduct::whereBetween('created_at', [$startDate, $endDate])->select('product_id', 'product_name')
            ->selectRaw('COUNT(*) as order_count')
            ->groupBy('product_id', 'product_name')
            ->get();

        // Transform data into a format suitable for ApexCharts
        $data = $products->map(function ($product) {
            return [
                'productName' => $product->product_name,
                'orders' => $product->order_count,
            ];
        });
        // dd($earningsData,$data);
        return view('admin.dashboard.dashboard', compact('data','earningsData','totalEarnings', 'totalProductsSold', 'recentOrders', 'topProducts'));
    }
}
