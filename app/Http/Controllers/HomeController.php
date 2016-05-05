<?php

namespace App\Http\Controllers;

use App\Project;
use App\Ticket;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\User;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allTickets = Ticket::all();
        $myTickets = Auth::user()->tickets()->get();
        if (strpos(redirect()->back()->getTargetUrl(), 'login') === false) {
            return view('home.index', compact('allTickets', 'myTickets'));
        } else {
            return view('home.index', compact('allTickets', 'myTickets'))->with('message', 'Welcome ' . Auth::user()->fullName());
        }
    }


}
