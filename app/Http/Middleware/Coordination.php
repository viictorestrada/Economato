<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Role;
use Session;

class Coordination
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
      $rol = Role::all();
      if (Auth::user()->rol_id != 4 && $rol->role != 'Coordinacion') {
        return redirect('/')->with(Session::flash('flash', 'No tiene permisos para acceder a esta página'));
      } else {
        return $next($request);
      }
    }
}
