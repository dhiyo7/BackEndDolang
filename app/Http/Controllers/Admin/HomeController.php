<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\User;
use Mapper;

class HomeController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $tours = Tour::all();
      $users = User::all();
      Mapper::map(-6.879704, 109.125595, ['zoom' => 10,'symbol' => 'circle', 'scale' => 1000]);
      //Mapper::map(-6.959179, 108.902679, ['symbol' => 'circle', 'scale' => 1000]);
      return view('home.dashboard', compact('tours','users'));
    }
}
