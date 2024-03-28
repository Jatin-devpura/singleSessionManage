<?php

namespace App\Http\Middleware;
use Closure;

class BlockIp
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
        $user = auth()->user()->id ?? 0;
        if($user){
            $sessionKey = 'session-in-progress:' . $request->ip() . $user;

            if (session($sessionKey)) {
                throw new Exception("Error Processing Request", 1);
            }

            session([$sessionKey => true]);

            return $next($request);
        }else{
            return $next($request);
        }
    }
}
