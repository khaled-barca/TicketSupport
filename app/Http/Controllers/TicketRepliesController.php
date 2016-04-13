<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\TicketReply;
use App\Http\Requests;
use App\Http\Requests\CreateTicketReplyRequest;
use Auth;

class TicketRepliesController extends Controller
{
    //
    public function store(CreateTicketReplyRequest $request, Ticket $ticket){
        $ticketReply = new TicketReply;
        $ticketReply->reply = $request->reply;
        $ticketReply->ticket_id = $ticket->id;
        $ticketReply->user_id = Auth::user()->id;
        $ticketReply->save();
        return redirect(action('TicketsController@show',$ticket));
    }
     public function create(Ticket $ticket){
        return view('ticket_replies.create')->with('ticket', $ticket);
    }
    public function index(){
        $ticket_replies = TicketReply::orderBy('created_at', 'asc')->get();

        return view('ticket_replies.index', [
        'ticket_replies' => $ticket_replies
    ]);
    }
}
