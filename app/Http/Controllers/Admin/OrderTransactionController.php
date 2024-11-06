<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AllOrderTransactionViewService;
use Illuminate\Routing\Controller as BaseController;

class OrderTransactionController extends BaseController
{
    public function __construct(AllOrderTransactionViewService $allOrderTransactionViewService)
    {
        $this->allOrderTransactionViewService = $allOrderTransactionViewService;
    }
       protected function index(Request $request)
    {
        if ($request->ajax()) {
                
            return $this->allOrderTransactionViewService->view($request);
         }   

        $data = [
            'menuUsers' => 'active',
            'menuUsersView' => 'active',
            'menuUsersCollapsed' => 'show',
        ];
        return view('admin.order-transaction.list',$data);
    }
}
