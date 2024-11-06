<?php
namespace App\Services;

use Auth;
use File;
use Yajra\Datatables\Datatables;
use App\Models\ConsumerRequest;
use App\Models\Ticket;

class AdminSupportTicketsServiceAll
{
    public function view()
    {
        $allTickets = Ticket::with('user')->get();


        return DataTables::of($allTickets)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                
            $actionHtml= '<button class="btn btn-primary modal-action" data-id="'.$row->id.'">Update</button>
                
                <div class="modal "  id="statusModal-'.$row->id.'" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel-'.$row->id.'" aria-hidden="true">
                    <div class="modal-dialog "  style="display: flex;align-items: center;min-height: calc(100% - 1rem);" role="document" >
                        <div class="modal-content" style="margin:auto" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="statusModalLabel-'.$row->id.'">Change Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="statusForm-'.$row->id.'" action="'.route('admin.managetTicketStatus').'" method="POST">
                                '.csrf_field().'
                                <div class="modal-body">
                                    <div class="form-group">
                                     <input type="hidden" name="ticket_id" value="'.$row->id.'">
                                     <input type="text" style="display:none" name="request_id" value="'.$row->id.'">
                                   
                                                 <select class="form-control basic-select" name="ticket_status" id="ticket_status" required>
                                                     <option value="">Select Status</option>
                                                     <option value="close">Close</option>
                                                     <option value="pending">Pending</option>
                                                 </select>
                                             
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            // $actionHtml = '<a  href="#" data-bs-toggle="modal" data-bs-target="#popup_modal_import-'.$row->id.'" class="btn btn-primary">Update</a>';
            // $actionHtml .= ' 
            // <div
            //     class="crancy-default__modal crancy-payment__success modal fade"
            //     id="popup_modal_import-'.$row->id.'"
            //     tabindex="-1"
            //     aria-labelledby="popup_modal_import-'.$row->id.'"
            //     aria-hidden="true"
            //     >
            //     <div class="modal-dialog modal-dialog-centered">
            //     <div
            //         class="modal-content crancy-preview__modal-content crancy-preview__modal-content--large p-0"
            //     >
            //         <div class="crancy-flex-between crancy-popup-heading">
            //         <h3 class="crancy-popup__title m-0">Change Status</h3>
            //         <a
            //             id="crancy-main-form__close"
            //             type="initial"
            //             class="crancy-preview__modal--close btn-close"
            //             data-bs-dismiss="modal"
            //             aria-label="Close"
            //         >
            //             <svg
            //             xmlns="http://www.w3.org/2000/svg"
            //             width="24"
            //             height="24"
            //             viewBox="0 0 24 24"
            //             fill="none"
            //             >
            //             <g clip-path="url(#clip0_989_10425)">
            //                 <circle cx="12" cy="12" r="12" fill="#EDF2F7"></circle>
            //                 <path
            //                 d="M16.9498 7.05029L7.05033 16.9498"
            //                 stroke="#5D6A83"
            //                 stroke-width="1.5"
            //                 stroke-linecap="round"
            //                 stroke-linejoin="round"
            //                 ></path>
            //                 <path
            //                 d="M7.05029 7.05029L16.9498 16.9498"
            //                 stroke="#5D6A83"
            //                 stroke-width="1.5"
            //                 stroke-linecap="round"
            //                 stroke-linejoin="round"
            //                 ></path>
            //             </g>
            //             <defs>
            //                 <clipPath id="clip0_989_10425">
            //                 <rect width="24" height="24" fill="white"></rect>
            //                 </clipPath>
            //             </defs>
            //             </svg>
            //         </a>
            //         </div>
        
            //         <div class="crancy-popup-body">
            //         <div class="crancy-product-card__img ">
            //     <form action="'.route('admin.managetTicketStatus').'" method="POST">
            //                         '.csrf_field().'
            //                         <input type="hidden" name="ticket_id" value="'.$row->id.'">
            //                         <div class="form-group">
            //                             <input type="hidden" name="request_id" value="'.$row->id.'">
                                       
            //                             <div class="input-group">
            //                                 <select class="form-control basic-select" name="ticket_status" id="ticket_status">
            //                                     <option value="">Select Status</option>
            //                                     <option value="close">Close</option>
            //                                     <option value="pending">Pending</option>
            //                                 </select>
            //                             </div>
            //                         </div>
            //                         <div id="action-buttons"  style="margin-top:25px">
            //                             <button type="submit" class="btn py-0 btn-primary w-25">Submit</button> 
            //                         </div>
            //                     </form>
            //         </div>

            //         </div>
                    
            //     </div>
            //     </div>
            // </div>';





              
                $actionHtml .=       '<a class="menu-item " href="'.route('admin.viewTickets', ['id' => $row->id]).'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                    </a>';
                return $actionHtml;
            })

            ->editColumn('created_at',function($row){
                return date('Y/m/d',strtotime($row->created_at));
            })

            ->editColumn('raised_by',function($row){
                return $row->user->name ?? '-';
            })

            ->editColumn('status', function ($row) {
                $badgeClass = '';
                switch ($row->status) {
                    case 'pending':
                        $badgeClass = 'warning';
                        break;
                    case 'close':
                        $badgeClass = 'danger';
                        break;
                    case 'open':
                        $badgeClass = 'primary';
                        break;
                    default:
                        $badgeClass = 'info';
                }
                $status = '<span style="width:50px" class="badge text-white p-2 rounded-pill bg-' . $badgeClass . '">' . ucfirst($row->status) . '</span>';
                
                return $status;
            })

            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}

