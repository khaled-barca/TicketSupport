<?php

namespace App\Http\Middleware;

use Closure;

class CanReplytoTicketMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $ticket = $request->tickets;
        if($ticket->support()->get()->first()->id == $user->id){
            return $next($request);
        }
        return view('errors.401');
    }
}
