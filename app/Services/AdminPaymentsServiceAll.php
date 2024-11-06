<?php
namespace App\Services;

use Auth;
use File;
use App\Models\Tax;
use App\Models\Payment;
use App\Models\ConsumerRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\URL;

class AdminPaymentsServiceAll
{
    public function view()
    {
        $allTaxes = Payment::with('order')->get();

        return DataTables::of($allTaxes)
            ->addIndexColumn()
          
            ->editColumn('created_at', function ($row) {
                return date('Y/m/d', strtotime($row->created_at));
            })
            ->addColumn('action', function ($row) {
                $invoiceUrl = URL::route('admin.invoice', ['id' => $row->id]);
                return '<a href="' . $invoiceUrl . '" class="btn btn-info">Invoice</a>';
            })
            ->rawColumns(['action']) 
            ->make(true);
    }
}

