<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateTicketReplyRequest;

class TicketRepliesController extends Controller
{
    //
    public function store(CreateTicketReplyRequest $request, Ticket $ticket){
        $ticketReply = new TicketReply;
        $ticketReply-> reply = $request->reply;
        $ticketReply-> ticket_id = $ticket->id;
        $ticketReply-> user_id = Auth::user();
        $ticketReply->save();
        return $ticketReply;
    }
}
