<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;

class TestController extends Controller
{
    
    public function test(\App\Ticket $ticket, \Illuminate\Http\Request $request){

        $ticket= \App\Ticket::find($request->id);
               
               $ticket->support_id=9;
               $ticket->save();
                       
       //it work now :) and ticket assigned to user with id 9
               return view('success');
    }
    
    
}
*/

namespace App\Http\Controllers;


use App\Ticket;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests;

class TestController extends Controller
{
    //here u use request and update by id 
    public function test(Request $request){
        
        $ticket= Ticket::find($request->id);
        $u = User::find(1);// userid=1 will replaced by login system from sesstion so this should be dynamic by login user id
               $ticket->support_id=$u->id;
               $ticket->save();
                       
  
               return view('success');
    }
    
    
}