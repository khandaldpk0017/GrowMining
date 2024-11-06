<?php
namespace App\Services;

use Auth;
use File;
use Yajra\Datatables\Datatables;
use App\Models\OrderTransaction;

class AllOrderTransactionViewService
{
    public function view($request)
    {
        $users = OrderTransaction::get();
        if($request->filled('from_date') && $request->filled('to_date')){
            $users = $users->whereBetween('created_at',[$request->from_date,$request->to_date]);
            // dd($agents);
            
        }

        return DataTables::of($users)
            ->addIndexColumn()
            
            ->editColumn('created_at',function($row){
                return date('d M Y',strtotime($row->created_at));
            })

                   
             
            
            
            ->make(true);
    }
}

