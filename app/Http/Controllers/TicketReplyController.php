<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TicketReply;

class TicketReplyController extends Controller
{
    //

	/**
	 * Create a new reply.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request,$ticketId)
	{
	    $this->validate($request, [
		'reply' => 'required|max:255',
	    ]);
	    #$ticket = Ticket::find($ticketId)

	    $ticketReply = new TicketReply;
	    $ticketReply-> reply = $request->reply;
	    $ticketReply-> ticket_id = $ticketId;
	    $ticketReply-> user_id = $request->user_id;
	    #$request->Ticket()->TicketReply()->create([
		#'reply' => $request->reply,
	    #    'ticket_id' => $request->ticket_id,
		#'user_id' => $request->user_id,
	    #]);
	    $ticketReply->save();
	    return $ticketReply;
	}
}
