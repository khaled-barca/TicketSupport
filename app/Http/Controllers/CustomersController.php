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
        $name = $request->name;
        $names = explode(" ", $name);
        $customer = Customer::firstOrCreate(['first_name' => $names[0],'last_name' => $names[1],'screen_name'=> $request->screen_name,'phone'=>123456]);
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
