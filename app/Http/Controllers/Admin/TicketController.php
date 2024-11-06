<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketChat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserSeedHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\UserSeedHistoryViewService;
use App\Services\AdminSupportTicketsServiceAll;


class TicketController extends Controller
{
    protected $adminSupportTicketsServiceAll;

    
    public function __construct(AdminSupportTicketsServiceAll $adminSupportTicketsServiceAll)
    {
        $this->adminSupportTicketsServiceAll = $adminSupportTicketsServiceAll;
    }

    public function allTickets(Request $request)
    {

        if ($request->ajax()) {
            return $this->adminSupportTicketsServiceAll->view('request');
        }
        
        $tickets = Ticket::with('user')->get();
        
        $data = [
            'menuTicket' => 'active',
            'menuTicketView' => 'active',
            'menuTicketCollapsed' => 'show',
        ];

        return view('admin.ticket.list', $data);
    }
    public function viewTickets($id)
    {   
        $ticket = Ticket::where('id', $id)->with('ticketChats')->first();
        $ticketChat = $ticket->ticketChats;
        $cuser = User::find($ticket->user_id);
        $admin = Auth::user();
        // dd($data['ticket']);

        $data = [
            'ticket' => $ticket,
            'cuser' => $cuser,
            'ticketChat' => $ticketChat,
            'admin' => $admin,
            'menuSupportTickets' => 'active',
            'menuSupportTicketsAll' => 'active'
        ];
        return view('admin.ticket.ticket-chat', $data);
    }
    public function replyChat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'message' => 'required|string',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::guard('admin')->user();
        // dd($user);
        $imagePath = null;

        if ($request->hasFile('image')) {
            // $chat->image = $request->file('image')->store('ticket_chats', 'public');
            $thumbnailImage = $request->file('image');
            $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
            $thumbnailImage->storeAs('public/images', $thumbnailImageName);
            $imagePath=$thumbnailImageName ?? null;
        }
        
        $ticket_chat = new TicketChat();
        $ticket_chat->admin_id = $user->id;
        // $ticket_chat->agent_id = $user->id;
        $ticket_chat->message = $request->input('message');
        if($request->hasfile('image')){
        $ticket_chat->image = $imagePath; 
        $ticket_chat->sender = "admin"; 
        }
        $ticket_chat->ticket_id = $request->input('ticket_id'); 
        $ticket_chat->save();
       return $this->viewTickets($request->input('ticket_id'));
        // return redirect()->back();
        
    }

    public function managetTicketStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'ticket_status' => 'required|string|max:255',
           
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $requestId = $request->post('ticket_id');
        $ticket = Ticket::find($requestId);
        // dd($request->post('ticket_status'),$requestId);
        $ticket->status = $request->post('ticket_status');
        $ticket->save();
    

        return redirect()->back()->with('success', 'Ticket Status updated successfully.');
    }
}
