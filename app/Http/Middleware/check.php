<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if ('1' ==='11') {
        //     # code...
        //     return redirect('logouts');
        // }
        // else{
        //     return redirect('home');
        // }
        return $next($request);
    }
}
