<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      return view('home.user.index');
    }
}
