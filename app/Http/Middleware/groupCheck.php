<?php

namespace App\Http\Middleware;

use App\Mail\welcomeMil;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'body' => 'This is for testing email using smtp'
            ];
            Mail::to('oladayoahmod112@gmail.com')->send(new welcomeMil($details));
            return redirect('homes');
        }
        return $next($request);
    }
}
