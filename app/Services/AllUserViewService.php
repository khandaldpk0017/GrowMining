<?php
namespace App\Services;

use Auth;
use File;
use App\Models\User;
use App\Models\Admin;
use Yajra\Datatables\Datatables;

class AllUserViewService
{
    public function view($request)
    {
        $users = User::get();
        if($request->filled('from_date') && $request->filled('to_date')){
            $users = $users->whereBetween('created_at',[$request->from_date,$request->to_date]);
            // dd($agents);
            
        }

        return DataTables::of($users)
            ->addIndexColumn()
            
            ->editColumn('created_at',function($row){
                return date('d M Y',strtotime($row->created_at));
            })

                   
             
            
            ->addColumn('action',function($row){
              
                $actionHtml = '<div class="crancy-table__customer-img flex gap-2">
                <a href="'.route('admin.editUser', ['id' => $row->id]).'"><img src="'.asset('images/edit-icon.svg').'"> </a>
                    <form method="POST" action="'.route('admin.deleteUser',["id" => $row->id] ).'" style="display: inline;">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="custom-btn" onclick="return confirm(\'Are you sure you want to delete this User?\')">
                        <img src="'.asset('images/trash-icon.svg').'">
                        </button>
                    </form>
            </div>';
    
                    $actionHtml .= ' 
                                    <div
                                        class="crancy-default__modal crancy-payment__success modal fade"
                                        id="popup_modal_import-'.$row->id.'"
                                        tabindex="-1"
                                        aria-labelledby="popup_modal_import-'.$row->id.'"
                                        aria-hidden="true"
                                        >
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div
                                            class="modal-content crancy-preview__modal-content crancy-preview__modal-content--large p-0"
                                        >
                                            <div class="crancy-flex-between crancy-popup-heading">
                                            <h3 class="crancy-popup__title m-0">User Details</h3>
                                            <a
                                                id="crancy-main-form__close"
                                                type="initial"
                                                class="crancy-preview__modal--close btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                            >
                                                <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                >
                                                <g clip-path="url(#clip0_989_10425)">
                                                    <circle cx="12" cy="12" r="12" fill="#EDF2F7"></circle>
                                                    <path
                                                    d="M16.9498 7.05029L7.05033 16.9498"
                                                    stroke="#5D6A83"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    ></path>
                                                    <path
                                                    d="M7.05029 7.05029L16.9498 16.9498"
                                                    stroke="#5D6A83"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    ></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_989_10425">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                                </svg>
                                            </a>
                                            </div>
                                
                                            <div class="crancy-popup-body">
                                            <div class="crancy-product-card__img mg-top-form-20">
                                            <table
                                            id="crancy-table__main"
                                            class="crancy-table__main crancy-table__main-v3"
                                            >
                                            <!-- crancy Table Head -->
                                            
                                            <!-- crancy Table Body -->
                                            <tbody class="crancy-table__body">
                                                <tr class="odd">
    
                                                    <td class="crancy-table__column-4 crancy-table__data-4">
                                                        <h4 class="crancy-table__product-title">
                                                            Name
                                                        </h4>
                                                    </td>
                                                    <td class="crancy-table__column-4 crancy-table__data-4">
                                                        <h4 class="crancy-table__product-title">
                                                        '.$row->name.'
                                                        </h4>
                                                    </td>
                                                    
                                                </tr>
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            Email
                                                        </h4>
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                        '.$row->email.'
                                                        </h4>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                            <!-- End crancy Table Body -->
                                          </table>
                                            </div>
    
                                            </div>
                                            <div class="crancy-flex-between crancy-popup-bottom">
                                                <div class="crancy-popup-buttons">
                                                <a href="#" class="crancy-btn crancy-btn__default m0 " data-bs-dismiss="modal"
                                                aria-label="Close">Close</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>';
    
                    return $actionHtml;
                })

           
            ->rawColumns(['action'])
            ->make(true);
    }
}

