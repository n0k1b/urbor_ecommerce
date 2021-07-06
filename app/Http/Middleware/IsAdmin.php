<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
      if (auth()->check()) {

            if(auth()->user()->role == 'admin' || auth()->user()->role == 'Product Editor' ){
                return $next($request);
            }

        }
        return redirect("admin_login")->with('error',"You do not have admin access");
    }
}
