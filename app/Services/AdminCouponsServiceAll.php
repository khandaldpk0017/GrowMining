<?php
namespace App\Services;

use Auth;
use File;
use Yajra\Datatables\Datatables;
use App\Models\ConsumerRequest;
use App\Models\Coupon;

class AdminCouponsServiceAll
{
    public function view()
    {
        $allCoupons = Coupon::all();

        return DataTables::of($allCoupons)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editButton ='<div style="display:flex;gap:10px;" >';
                $editButton .= '<a  href="' . route('coupons.edit', $row->id) . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                
                $actionHtml = $editButton;
                $actionHtml .= '<button  class="  delete-coupon" data-id="' . $row->id . '"><img src="'.asset('images/trash-icon.svg').'" class=""></button>';
                $actionHtml .='</div>';
                return $actionHtml;
            })
            ->editColumn('expiration_date', function ($row) {
                return date('Y/m/d', strtotime($row->expiration_date));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

