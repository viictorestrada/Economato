<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest')->only('showLoginForm');
  }

  public function showLoginForm()
  {
    return view('login');
  }

  public function login()
  {
    $credentials = $this->validate(request(), [
      'email' => 'required|email|string',
      'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
      if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2){
        return redirect('panel');
      }else{
        return redirect('/');
      }
    }else{
      return back()->withErrors(['email' => trans('auth.failed')])
      ->withInput(request(['email']));
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }

  protected function credentials(Request $request)
  {
    $credentials = $request->only($this->username(), 'password');
    $credentials['status'] = 1;
    return $credentials;
  }

}
