<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ticket;
use App\TicketReply;
use App\User;

class TicketsController extends Controller
{
    //
    public function show(Ticket $ticket){
    	$ticket_replies = TicketReply::where('ticket_id',$ticket->id)->get();
    	$users = array();
    	foreach($ticket_replies as $ticketReply){
    		$user = User::find($ticketReply->user_id);
    		 array_push($users,$user);
    	}
        return view('tickets.show', [
        'ticket_replies' => $ticket_replies,
        'ticket' => $ticket,
        'users' => $users
    ]);
    }
}
