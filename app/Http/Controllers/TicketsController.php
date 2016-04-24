<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TicketReply;
use App\Http\Requests\CreateTicketRequest;
use App\Ticket;
use App\User;
use App\Customer;
use Auth;
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

    public function edit(Ticket $ticket){
        $agents = User::all();
        return view('tickets.edit',[
        'ticket' => $ticket,
        'agents' => $agents
    ]);
    }

    public function update(CreateTicketRequest $request, Ticket $ticket){
        if($ticket->support_id != $request->support_id)
        {
            $ticket->support_id = $request->support_id;
            $notification->user_id = $request->support_id;
            $notification->body = "You have been assigned to an issue";
            $notification->type = 1;
            $notification->save();
        }
        //$ticket->support_id = $request->support_id;
        if($ticket->status != $request->status && $request->status == 'Closed')
        {
            $ticket->status = $request->status;
            $notification->user_id = $request->support_id;
            $notification->body = "You have a closed issue";
            $notification->type = 2;
            $notification->save();
        }
        // $ticket->status = $request->status;
        if($ticket->urgency != $request->urgency)
        {
            $ticket->urgency = $request->urgency;
            $notification->user_id = $request->support_id;
            $notification->body = "You have a change in issue's urgency";
            $notification->type = 3;
            $notification->save();
        }
        //$ticket->urgency = $request->urgency;
        $ticket->save();
        // $notification->user_id = $request->support_id;
        // $notification->body = "You have been assigned to an issue";
        // $notification->type = 1;
        // $notification->save();
        // $user = Auth::user();
        // $notifications = DB::select('select * from notifications where user_id = :id', ['id' => $user->id]);
        return redirect(action('HomeController@index';
    }

    public function destroy(Ticket $ticket){
        $ticket->delete();
        return redirect(action('HomeController@index'));
    }

    
    // public function index() {
    // 	return view('tickets.ticket_index');
    // }

    // public function store() {
    // 	$input = Request::all();
    // 	$ticket = new Ticket;
    // 	$ticket -> body = $input['body'];
    // 	$ticket -> urgency = $input['urgency'];
    // 	$ticket -> project_id = $input['project'];
    // 	$ticket -> customer_id = $input['customer'];
    // 	$ticket -> support_id = 1;
    // 	$ticket -> save();
    // 	return redirect('tickets');
    // }

    // public function create() {
    // 	return view('tickets.ticket_form');
    // }
    public function store(CreateTicketRequest $request,Ticket $ticket){
        $ticket->project_id = $request->project_id;
        $ticket->customer_id = $request->customer_id;
        $ticket->support_id = $request->support_id;
        $ticket->status = $request->status;
        $ticket->urgency = $request->urgency;
        $ticket->body = $request->body;
        $ticket->status_id = $request->status_id;
        $ticket->save();
        return redirect(action('HomeController@index'));
    }
}
