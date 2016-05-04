<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\TicketReply;
use App\Http\Requests\CreateTicketRequest;
use App\Ticket;
use App\User;
use App\Customer;
use App\Notification;
use Auth;
class TicketsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('supervisor',['only' => 'claimTicket2']);
    }

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
            $notification = new Notification;
            $notification->body = "You have been assigned to a ticket";
            $notification->user_id = $request->support_id;
            $notification->type = 1;
            $notification->seen = "No";
            $notification->url = "tickets/" + $request->id;
            $notification->save();
        }
        if($ticket->status != $request->status && $request->status == 2)
        {
            $notification = new Notification;
            $notification->body = "You have a closed ticket";
            $notification->user_id = $request->support_id;
            $notification->type = 1;
            $notification->seen = "No";
            $notification->url = "tickets/" + $request->id;
            $notification->save();
        }
        if($ticket->urgency != $request->urgency)
        {
            $notification = new Notification;
            $notification->body = "You have a change in ticket's urgency";
            $notification->user_id = $request->support_id;
            $notification->type = 1;
            $notification->seen = "No";
            $notification->url = "tickets/" + $request->id;
            $notification->save();
        }
        $ticket->support_id = $request->support_id;
        $ticket->status = $request->status;
        $ticket->urgency = $request->urgency;
        $ticket->save();
        return redirect(action('HomeController@index'));
    }
    public function destroy(Ticket $ticket){
        $ticket->delete();
        return redirect(action('HomeController@index'));
    }
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

    public function claimTicket(Request $request) {

        if(Auth::user()->isSupportAgent() && Auth::user()->tickets()->get()->count() == 3){
            return redirect(action('HomeController@index'))->with("warning","You already have 3 tickets assigned");
        }
        else{
            $ticket = Ticket::find($request->TicketId);
            //$user = Auth::user();
            //will be automatic from current login user i  test  with 1
            //a $ticket->fill($request->all());
            $ticket->support_id = Auth::user()->id;
            $ticket->progress_date = Carbon::now();
            $ticket->save();
            $notification = new Notification;
            $notification->user_id = $ticket->support_id;
            $notification->body = "You have claimed a ticket";
            $notification->url = "tickets/".$ticket->id;
            $notification->seen = "No";
            $notification->type = 1;
            $notification->save();
            return redirect(action('HomeController@index'));
        }

    }
    public function claimTicket2(Request $request) {
        $ticket = Ticket::find($request->TicketId);
        //$user = Auth::user();
        //will be automatic from current login user i  test  with 1
        //a $ticket->fill($request->all());
        $ticket->support_id = $request->agent;
        $ticket->progress_date = Carbon::now();
        $ticket->save();
        $notification = new Notification;
        $notification->user_id = $ticket->support_id;
        $notification->body = "You have been assigned a ticket";
        $notification->url = "tickets/".$ticket->id;
        $notification->seen = "No";
        $notification->type = 1;
        $notification->save();
        $notification2 = new Notification;
        $notification2->user_id = Auth::user()->id;
        $notification2->body = "You have claimed a ticket for another agent";
        $notification2->url = "tickets/".$ticket->id;
        $notification2->seen = "No";
        $notification2->type = 1;
        $notification2->save();
        return redirect(action('HomeController@index'));
    }
}
