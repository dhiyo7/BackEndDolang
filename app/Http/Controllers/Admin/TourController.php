<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use Storage;

class TourController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $tours = Tour::all();
      return view('home.tour.index', compact('tours'));
    }

    public function create()
    {
        return view('home.tour.create-tour');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'title' => 'required|min:5',
        'description' => 'required|min:10',
        'image' => 'required|mimes:jpeg,png,jpeg',
      ]);
      $image = $request->file('image')->store('pictures');

      Tour::create([
        'title' => $request->title,
        'category' => $request->category,
        'description' => $request->description,
        'image' => $image,
      ]);

      return redirect()->route('tour')->with('success','Wisata berhasil ditambahkan');

    }
}
