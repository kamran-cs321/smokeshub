<?php

namespace App\Http\Middleware;
use App\Models\User;
use Session;
use Closure;

class VerifyAdmin
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
        
        if ( Session::get('user') ) {
            
            // user value cannot be found in session
                return $next($request);
            
        }else{
            
                return redirect('/admin')->with('error','Please Login First');
            
        }
    }
}
