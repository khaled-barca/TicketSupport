<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ticket;

class HomeController extends Controller
{
    //

    public function index(){
   
        return view('Auth.login');
    }

    public function index2(){
        //by Ayah to test claimTicket  , we have to list all ticket 
     $tickets = Ticket::all();

        return view('welcome', array('tickets' => $tickets));
    }
}
