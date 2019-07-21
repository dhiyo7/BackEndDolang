<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\User;
use App\Comment;

class HomeController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $tours = Tour::all();
      $users = User::all();
      $comments = Comment::all();

      return view('home.dashboard', compact('tours','users','comments'));
    }
}
