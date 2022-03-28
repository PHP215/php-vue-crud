<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class groupCheck
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
        if ($request->age < 10) {
            # code...
            return redirect('homes');
        }
        return $next($request);
    }
}
