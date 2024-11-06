<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketChat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserSeedHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Services\UserSeedHistoryViewService;
use App\Services\AdminSupportTicketsServiceAll;


class TicketController extends Controller
{
   

    
    public function index(Request $request)
    {
        $tickets = Ticket::where('user_id', $request->user()->id)->get();
        return response()->json($tickets);
    }

    // Create a new ticket
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ticket = new Ticket();
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->status = 'open';
        $ticket->user_id = $request->user()->id;

        if ($request->hasFile('image')) {
            // $ticket->image = $request->file('image')->store('tickets', 'public');
            $thumbnailImage = $request->file('image');
            $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
            $thumbnailImage->storeAs('public/images', $thumbnailImageName);
            $ticket->image=$thumbnailImageName ?? null;
        }

        $ticket->save();

        return response()->json(['message' => 'Ticket created successfully'], 201);
    }

    // Fetch a specific ticket and its related messages
    public function show(Ticket $ticket)
    {
       

        // Load the ticket with its messages
        $ticket->load('ticketChats');
        if ($ticket->image) {
            $ticket->image_url = Storage::url('images/' . $ticket->image);
        }
        return response()->json($ticket);
    }
   
}
