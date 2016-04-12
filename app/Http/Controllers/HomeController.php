<?php

namespace App\Http\Controllers;

use App\Project;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $projects = Project::all();
        $tickets = Ticket::all();
        return view('home.index',compact('projects','tickets'));
    }


}
