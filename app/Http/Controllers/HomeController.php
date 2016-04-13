<?php

namespace App\Http\Controllers;

use App\Project;
use App\Ticket;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class HomeController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $tickets = Ticket::all();
        if(strpos(redirect()->back()->getTargetUrl(),'login') === false){
            return view('home.index',compact('tickets'));
        }
        else{
            return view('home.index',compact('tickets'))->with('message','Welcome '. Auth::user()->fullName());
        }
    }


}
