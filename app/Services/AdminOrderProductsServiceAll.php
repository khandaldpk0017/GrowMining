<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderProduct;
use Yajra\Datatables\Datatables;

class AdminOrderProductsServiceAll
{
    public function view($status)
    {
        $user = auth()->user();
        
           
                $orderProducts = Order::get();
           
        

        return DataTables::of($orderProducts)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $statuses = ['pending', 'completed', 'cancel'];
            
            $selectBox = '<select class=" border order-status-select" data-order-id="' . $row->id . '">';
            foreach ($statuses as $status) {
                $selected = $row->status === $status ? 'selected' : '';
                $selectBox .= '<option value="' . $status . '" ' . $selected . '>' . ucfirst($status) . '</option>';
            }
            $selectBox .= '</select>';
            
            return $selectBox;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
