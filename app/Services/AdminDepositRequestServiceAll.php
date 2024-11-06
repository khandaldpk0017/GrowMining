<?php
namespace App\Services;

use App\Models\DepositRequest;
use App\Models\WithdrawRequest;
use Auth;
use File;
use App\Models\Tax;
use App\Models\ConsumerRequest;
use Yajra\Datatables\Datatables;

class AdminDepositRequestServiceAll
{
    public function view()
    {
        $allTaxes = DepositRequest::with('user')->get();
        // dd($allTaxes);

        return DataTables::of($allTaxes)
            ->addIndexColumn()
            ->editColumn('ss', function ($row) {
                $url = asset('storage/images/' . $row->ss);
                return '<img src="' . $url . '" alt="' . $row->name . '" width="50" height="50" class="img-thumbnail" onclick="showImageModal(\'' . $url . '\')">';
            })
            ->editColumn('created_at', function ($row) {
                return date('Y/m/d', strtotime($row->created_at));
            })
            ->editColumn('user_id', function ($row) {
                return $row->user->name;
            })
            ->addColumn('action', function ($row) {
                $statuses = ['pending', 'completed', 'failed' ];
                
                $selectBox = '<select class=" border order-status-select" data-id="' . $row->id . '">';
                foreach ($statuses as $status) {
                    $selected = $row->status === $status ? 'selected' : '';
                    $selectBox .= '<option value="' . $status . '" ' . $selected . '>' . ucfirst($status) . '</option>';
                }
                $selectBox .= '</select>';
                
                return $selectBox;
            })
            ->rawColumns(['action','ss'])
            ->make(true);
    }
}

