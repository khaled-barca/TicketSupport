<?php

namespace App\Http\Middleware;

use Closure;

class SupportSupervisorMiddleware
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
        if($user->isSupportSupervisor()){
            return $next($request);
        }
        return view('errors.401');
    }
}
