<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

use App\TicketReply;
use App\Http\Requests;
use App\Http\Requests\CreateTicketReplyRequest;
use Auth;
use \Twitter;
use App\Customer;

class TicketRepliesController extends Controller
{
    //
    public function store(CreateTicketReplyRequest $request, Ticket $ticket){
        $ticketReply = new TicketReply;
        $ticketReply->reply = $request->reply;
        $ticketReply->ticket_id = $ticket->id;
        $ticketReply->user_id = Auth::user()->id;
        $ticketReply->save();
        $customer = Customer::find($ticket->customer_id);
        $tweet = '@'. $customer->screen_name . ' ' . $request->reply;
        Twitter::postTweet(['status' => $tweet, 'format' => 'json','in_reply_to_status_id'=>$ticket->status_id]);
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
