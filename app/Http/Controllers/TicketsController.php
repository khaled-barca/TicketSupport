<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateTicketRequest;
use App\Ticket;
use App\User;
use Auth;
class TicketsController extends Controller
{
    //










    public function edit(Ticket $ticket){
        $agents = User::all();
        return view('tickets.edit',[
        'ticket' => $ticket,
        'agents' => $agents
    ]);
    }
    public function update(CreateTicketRequest $request, Ticket $ticket){
        $ticket->support_id = $request->support_id;
        $ticket->status = $request->status;
        $ticket->urgency = $request->urgency;
        $ticket->save();
        return redirect(action('HomeController@index'));
    }

}
