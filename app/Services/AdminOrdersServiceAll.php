<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AdminOrdersServiceAll
{
    public function view($status)
    {
        if ($status) {
            $allOrders = Order::with('orderProducts')->where('status', $status)->get();
        }
        else{
            $allOrders = Order::with('orderProducts')->get();
        }
        return DataTables::of($allOrders)
            ->addIndexColumn()
           
            ->addColumn('total_amount', function ($row) {
                return '$' . number_format($row->total_amount, 2);
            })
            ->addColumn('deliver_fee', function ($row) {
                return '$' . number_format($row->deliver_fee, 2);
            })
            ->addColumn('action', function ($row) {
                $viewProductsButton = '<a href="' . route('admin.orders.products', $row->id) . '" class=" p-5 py-2 btn-info"><i class="fa fa-eye"></i></a>';
                $statuses = ['Pending', 'Completed', 'Cancel'];
            
            $viewProductsButton .= '<select class=" border p-2 ml-5 order-status-select" data-id="' . $row->id . '">';
            foreach ($statuses as $status) {
                $selected = $row->status === $status ? 'selected' : '';
                $viewProductsButton .= '<option value="' . $status . '" ' . $selected . '>' . ucfirst($status) . '</option>';
            }
            $viewProductsButton .= '</select>';
            
            // return $selectBox;
                return $viewProductsButton;
            })
            ->editColumn('created_at', function ($row) {
                return date('Y/m/d', strtotime($row->created_at));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
