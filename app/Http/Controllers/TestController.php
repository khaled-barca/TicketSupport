<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    
    public function test(\App\Ticket $ticket, Illuminate\Http\Request $request){
        
               
               $ticket->update([
                   'support_id' => $request->id
               ]);
       
               
               return view('success');
    }
    
    
}

