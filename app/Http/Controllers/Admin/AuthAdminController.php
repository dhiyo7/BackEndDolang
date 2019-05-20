<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function __construct(){
      $this->middleware('guest:admin')->except('logoutAdmin');
    }

    public function showLoginForm(){
      return view('auth.login');
    }

    public function login(Request $request){
      $this->validate($request,[
        'username' => 'required',
        'password' => 'required|min:6'
      ]);

      $credential = [
        'username' => $request->username,
        'password' => $request->password
      ];

      if (Auth::guard('admin')->attempt($credential, $request->member)) {
        return redirect()->route('home');
      }
      return redirect()->back()
              ->withInput($request->only('username','remember'))
              ->with('error','Gagal Login');
    }

    public function logoutAdmin(){
      Auth::guard('admin')->logout();
      return redirect('/');
    }
}
