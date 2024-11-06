<?php
namespace App\Services;

use App\Models\WithdrawRequest;
use Auth;
use File;
use App\Models\Tax;
use App\Models\ConsumerRequest;
use Yajra\Datatables\Datatables;

class AdminWithdrawRequestServiceAll
{
    public function view()
    {
        $allTaxes = WithdrawRequest::with('user')->get();
        // dd($allTaxes);

        return DataTables::of($allTaxes)
            ->addIndexColumn()
          
            ->editColumn('created_at', function ($row) {
                return date('Y/m/d', strtotime($row->created_at));
            })
            ->editColumn('user_id', function ($row) {
                return $row->user->name;
            })
            ->addColumn('action', function ($row) {
                $statuses = ['pending', 'approved', 'rejected' ];
                
                $selectBox = '<select class=" border order-status-select" data-id="' . $row->id . '">';
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

