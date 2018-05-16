<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Role;

class Operator
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
    $roles = Roles::all();
    if (Auth::user()->rol_id != 4 || $role->role != ucfirst('operador')) {
      return redirect('/');
    }else{
      return $next($request);
    }
  }
}
