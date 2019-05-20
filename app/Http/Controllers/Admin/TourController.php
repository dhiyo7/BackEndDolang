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

    public function show(Tour $tour)
    {
        return view('home.tour.detail-tour',compact('tour'));
    }

    public function edit(Tour $tour)
    {
        return view('home.tour.update-tour',compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
      $this->validate($request,[
        'title' => 'required|min:5',
        'description' => 'required|min:50',
        'image' => 'mimes:jpeg,png,jpeg',
      ]);

      if ($request->image) {
        $image_path = $tour->image;
        if (Storage::exists($image_path)) {
          Storage::delete($image_path);
        }
        $image = $request->file('image')->store('pictures');
          $tour->update([
          'title' => $request->title,
          'category' => $request->category,
          'description' => $request->description,
          'image' => $image,
        ]);
      }else{
        $tour->update([
        'title' => $request->title,
        'category' => $request->category,
        'description' => $request->description,
      ]);
      }
      return redirect()->route('tour')->with('success','Wisata berhasil diubah');
    }

    public function destroy(Tour $tour)
    {
      $image_path = $tour->image;
      if (Storage::exists($image_path)) {
          Storage::delete($image_path);
      }
      $tour->delete();
      return redirect()->route('tour')->with('success','Wisata berhasil dihapus');
    }
}
