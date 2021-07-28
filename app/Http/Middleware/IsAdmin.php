<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
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
      if (Auth::guard('admin')->check()) {

            if(Auth::guard('admin')->user()->role != 'customer'){
                return $next($request);
            }
            else{
                return redirect("admin_login")->with('error',"You do not have admin access");
            }

        }
        else
        {
            return redirect("admin_login");
        }

    }
}
