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
        'address' => 'required|min:10',
        'region' => 'required|in:Ampelgading,Bantarbolang,Belik,Bodeh,Comal,
        Moga,Pemalang,Petarukan,Pulosari,Randudongkal,Taman,Ulujami,Warungpring,Watukumpul',
        'price' => 'required|min:2',
        'description' => 'required|min:50',
        'image' => 'required|mimes:jpeg,png,jpeg',
        'panorama' => 'required|mimes:jpeg,png,jpeg',
      ]);
      $image = $request->file('image')->store('pictures');
      $panorama = $request->file('panorama')->store('panorama');

      Tour::create([
        'title' => $request->title,
        'address' => $request->address,
        'region' => $request->region,
        'category' => $request->category,
        'price' => 'Rp. '.$request->price,
        'description' => $request->description,
        'image' => $image,
        'panorama' => $panorama,
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
        'address' => 'required|min:10',
        'region' => 'required|in:Ampelgading,Bantarbolang,Belik,Bodeh,Comal,
        Moga,Pemalang,Petarukan,Pulosari,Randudongkal,Taman,Ulujami,Warungpring,Watukumpul',
        'price' => 'required|min:2',
        'description' => 'required|min:50',
        'image' => 'mimes:jpeg,png,jpeg',
        'panorama' => 'mimes:jpeg,png,jpeg',
      ]);
      if ($request->image) {
        $image_path = $tour->image;
        if (Storage::exists($image_path)) {
          Storage::delete($image_path);
        }
        $image = $request->file('image')->store('pictures');
        if ($request->panorama) {
          $panorama_path = $tour->panorama;
          if (Storage::exists($panorama_path)) {
            Storage::delete($panorama_path);
          }
          $panorama = $request->file('panorama')->store('panorama');
            $tour->update([
              'title' => $request->title,
              'address' => $request->address,
              'region' => $request->region,
              'category' => $request->category,
              'price' => 'Rp. '.$request->price,
              'description' => $request->description,
              'image' => $image,
              'panorama' => $panorama,
          ]);
        }else{
          $tour->update([
            'title' => $request->title,
            'address' => $request->address,
            'region' => $request->region,
            'category' => $request->category,
            'price' => 'Rp. '.$request->price,
            'description' => $request->description,
            'image' => $image,
        ]);
      }
      }elseif ($request->panorama) {
        $panorama_path = $tour->panorama;
        if (Storage::exists($panorama_path)) {
          Storage::delete($panorama_path);
        }
        $panorama = $request->file('panorama')->store('panorama');
          $tour->update([
          'title' => $request->title,
          'address' => $request->address,
          'region' => $request->region,
          'category' => $request->category,
          'price' => 'Rp. '.$request->price,
          'description' => $request->description,
          'panorama' => $panorama,
        ]);
      }else{
        $tour->update([
        'title' => $request->title,
        'address' => $request->address,
        'region' => $request->region,
        'category' => $request->category,
        'price' => 'Rp. '.$request->price,
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
      $panorama_path = $tour->panorama;
      if (Storage::exists($panorama_path)) {
          Storage::delete($panorama_path);
      }
      $tour->delete();
      return redirect()->route('tour')->with('success','Wisata berhasil dihapus');
    }
}
