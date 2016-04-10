<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Ticket;
use App\User;
class UsersController extends Controller {

    
    public function claimTicket(Request $request) {

        $ticket = Ticket::find($request->TicketId);
        //$user = Auth::user();
        //will be automatic from current login user i  test  with 1
        $ticket->support_id = 1;
        $ticket->save();

      
        return view('success');
    }

}
