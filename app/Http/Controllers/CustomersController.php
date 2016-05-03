<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests;
use App\Customer;
use App\Ticket;
use App\User;
//use App\Project;

class CustomersController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['except' => ['show']]);
    }
    public function store(CreateCustomerRequest $request)
    {
        $customer=new Customer;
        $customer->first_name = $request->first_name;
           $customer->screen_name = $request->screen_name;
           
        $customer->save();
       
        return view('customers.show', [
            'customer' => $customer
        ]);
    }
        public function create()
    {
        return view('customers.create');
    }
        public function show(Customer $customer)
    {
        $tickets = Ticket::where('customer_id', $customer->id)->get();
        $users = array();
        foreach ($tickets as $ticket) {
            $user = User::find($ticket->support_id);
            array_push($users, $user);
        }
        return view('customers.show', [
            'tickets' => $tickets,
            'customer' => $customer,
            'users' => $users
        ]);
    }
      public function update(CreateCustomerRequest $request, Customer $customer)
    {
        $customer->first_name = $request->first_name;
           $customer->screen_name = $request->screen_name;
           
        $customer->save();
       
        return view('customers.show', [
            'customer' => $customer
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(action('HomeController@index'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit')
            ->with('customer', $customer);
    }
}
