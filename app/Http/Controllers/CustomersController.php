<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests;
use App\Customer;
use App\Ticket;
use App\User;
use App\Project;
class CustomersController extends Controller
{
    //
       public function store(CreateCustomerRequest $request){
        $customer = new Customer;
        $name = $request->name;
        $names = explode(" ", $name);
        $customer->first_name = $names[0];
        $customer->last_name = $names[1];
        $customer->screen_name = $request->screen_name;
        $customer->phone = 123456;
        $customer->save();
        $ticket = new Ticket;
        $ticket->customer_id = $customer->id;
        $ticket->body = $request->body;
        $ticket->status_id = $request->status_id;
        $agents = User::all();
        $projects = Project::all();
        return view('tickets.create',[
        'ticket' => $ticket,
        'agents' => $agents,
        'projects'=> $projects
    ]);
    }
}
