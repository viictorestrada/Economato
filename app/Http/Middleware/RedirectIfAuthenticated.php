<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @param  string|null  $guard
  * @return mixed
  */
  public function handle($request, Closure $next, $guard = null)
  {
    if (Auth::guard($guard)->check()) {
      if (Auth::user()->rol_id == 1){
        return redirect('/panel');
      }else if (Auth::user()->rol_id == 2) {
        return redirect('reports');
      } else if (Auth::user()->rol_id == 3) {
        return redirect('orders');
      }else if (Auth::user()->rol_id == 4) {
        return redirect('/panel');
      }else if (Auth::user()->rol_id == 5) {
        return redirect('Production_orders');
      }
    }else{
      return $next($request);
    }
  }

}
