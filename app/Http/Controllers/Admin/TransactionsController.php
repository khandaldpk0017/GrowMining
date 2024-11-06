<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\WithdrawRequest;
use App\Http\Controllers\Controller;
use App\Services\AdminTaxesServiceAll;
use App\Services\AdminTransactionsServiceAll;
use App\Services\AdminWithdrawRequestServiceAll;

class TransactionsController extends Controller
{
    // protected $taxService;

    public function __construct(AdminTransactionsServiceAll $AdminWithdrawRequest)
    {
        $this->AdminWithdrawRequest = $AdminWithdrawRequest;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->AdminWithdrawRequest->view();
        }

        return view('admin.transactions.index');
    }

    public function updateStatus(Request $request)
{
    $order = WithdrawRequest::find($request->id);

    if ($order) {
        $order->status = $request->status;
        $order->save();
        

        return response()->json(['success' => 'Request status updated successfully!']);
    } else {
        return response()->json(['error' => 'Request not found!'], 404);
    }
}
}
