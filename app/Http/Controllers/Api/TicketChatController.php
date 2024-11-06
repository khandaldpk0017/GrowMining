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
use Illuminate\Support\Facades\Validator;
use App\Services\UserSeedHistoryViewService;
use App\Services\AdminSupportTicketsServiceAll;


class TicketChatController extends Controller
{
    
    public function store(Request $request, Ticket $ticket)
    {
        // $this->authorize('view', $ticket);

        $request->validate([
            'message' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $chat = new TicketChat();
        $chat->ticket_id = $ticket->id;
        $chat->user_id = $request->user()->id;
        $chat->admin_id = null; // or set this if an admin is sending the message
        $chat->message = $request->message;
        $chat->sender = "user";

        if ($request->hasFile('image')) {
            // $chat->image = $request->file('image')->store('ticket_chats', 'public');
            $thumbnailImage = $request->file('image');
            $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
            $thumbnailImage->storeAs('public/images', $thumbnailImageName);
            $chat->image=$thumbnailImageName ?? null;
        }

        $chat->save();

        return response()->json(['message' => 'Message sent successfully'], 201);
    }
   
}
