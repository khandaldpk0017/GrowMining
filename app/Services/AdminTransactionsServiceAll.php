<?php
namespace App\Services;

use App\Models\DepositRequest;
use App\Models\Transaction;
use App\Models\WithdrawRequest;
use Auth;
use File;
use App\Models\Tax;
use App\Models\ConsumerRequest;
use Yajra\Datatables\Datatables;

class AdminTransactionsServiceAll
{
    public function view()
    {
        $allTaxes = Transaction::get();
        // dd($allTaxes);

        return DataTables::of($allTaxes)
            ->addIndexColumn()
          
            ->editColumn('created_at', function ($row) {
                return date('Y/m/d', strtotime($row->created_at));
            })
            // ->addColumn('action', function ($row) {
            //     $statuses = ['pending', 'completed', 'failed' ];
                
            //     $selectBox = '<select class=" border order-status-select" data-id="' . $row->id . '">';
            //     foreach ($statuses as $status) {
            //         $selected = $row->status === $status ? 'selected' : '';
            //         $selectBox .= '<option value="' . $status . '" ' . $selected . '>' . ucfirst($status) . '</option>';
            //     }
            //     $selectBox .= '</select>';
                
            //     return $selectBox;
            // })
            // ->rawColumns(['action'])
            ->make(true);
    }
}

