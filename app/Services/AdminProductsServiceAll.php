<?php
namespace App\Services;

use Auth;
use File;
use Yajra\Datatables\Datatables;
use App\Models\ConsumerRequest;
use App\Models\Product;

class AdminProductsServiceAll
{
    public function view()
    {
        $user = auth()->user();
        if ($user->hasRole('super-admin')) {
            $allTickets =  Product::with('tax')->get();
        }
        if ($user->hasRole('admin')) {
            $allTickets =  Product::where('admin_id',auth()->user()->id)->with('tax')->get();
        }


        return DataTables::of($allTickets)
            ->addIndexColumn()
           
            ->editColumn('thumbnail_image', function ($row) {
                $url = asset('storage/images/' . $row->thumbnail_image);
                return '<img src="' . $url . '" alt="' . $row->name . '" width="50" height="50">';
            })
            ->addColumn('action',function($row){
                $editButton ='<div style="display:flex;gap:10px;" >';
                $editButton .= '<a class="" href="' . route('admin.products.edit', $row->id) . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                
                // Other action buttons like Update and Delete
                $actionHtml = $editButton;
                
               
                $actionHtml .= '<button class=" delete-product" data-id="' . $row->id . '"><img src="'.asset('images/trash-icon.svg').'" class=""></button>';
                $actionHtml .='</div>';
                return $actionHtml;
            })

            ->editColumn('created_at',function($row){
                return date('Y/m/d',strtotime($row->created_at));
            })

            ->editColumn('raised_by',function($row){
                return $row->user->name ?? '-';
            })

            ->editColumn('status', function ($row) {
                $isChecked = $row->status === 1 ? 'checked' : '';
                return '<label class="switch">
                            <input type="checkbox" class="toggle-status" data-id="' . $row->id . '" ' . $isChecked . '>
                            <span class="slider round"></span>
                        </label>';
            })
           
            ->rawColumns(['thumbnail_image','action', 'status'])
            ->make(true);
    }
}

