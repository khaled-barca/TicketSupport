<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests;
use App\Customer;
use App\Ticket;
use App\User;
class CustomersController extends Controller
{
    //
       public function store(CreateCustomerRequest $request){
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->first_name;
        $customer->phone = 123456;
        $customer->save();
        $ticket = new Ticket;
        $ticket->customer_id = $customer->id;
        $ticket->project_id = 1;
        $ticket->body = $request->body;
        $ticket->status_id = $request->status_id;
        $agents = User::all();
        return view('tickets.create',[
        'ticket' => $ticket,
        'agents' => $agents
    ]);
    }
}
