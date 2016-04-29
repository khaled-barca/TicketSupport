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

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $tickets = Ticket::all();
        $agents = User::where('role','Support Agent')->lists('first_name', 'id');
        if(strpos(redirect()->back()->getTargetUrl(),'login') === false){
            return view('home.index',compact('tickets','agents'));
        }
        else{
            return view('home.index',compact('tickets','agents'))->with('message','Welcome '. Auth::user()->fullName());
        }
    }


}
