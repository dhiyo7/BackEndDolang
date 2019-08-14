<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Panorama;
use Storage;

class TourController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $tours = Tour::orderBy('id','DESC')->paginate(8);
      return view('home.tour.index', compact('tours'));
    }

    public function create()
    {
        return view('home.tour.create-tour');
    }

    public function store(Request $request)
    {
      //dd($request->file("panorama"));

      $this->validate($request,[
        'name' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:25',
        'address' => 'required|min:10',
        'region' => 'required|in:Ampelgading,Bantarbolang,Belik,Bodeh,Comal,Moga,Pemalang,Petarukan,Pulosari,Randudongkal,Taman,Ulujami,Warungpring,Watukumpul',
        'price' => 'required|numeric|between:5.000,1000.000',
        'description' => 'required|min:50',
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'panorama.*' => 'required|image|mimes:jpg,png,jpeg|max:2048'
      ]);
      $slug = str_slug($request->name);
      $tour = Tour::where('slug',$slug)->get();
      $open = str_replace('0','',substr($request->open, 0,2));
      $closed = str_replace('0','',substr($request->closed, 0,2));
      if (!$tour->isEmpty()) {
        return back()->with('errorName','Nama sudah ada')->withInput();
      }
      if($closed < $open){
        return back()->with('errorOperational','Jam operasional tidak benar')->withInput();
      }
      $price = str_replace('.','',$request->price);
      $image = $request->file('image')->store('pictures');
      $tour = Tour::create([
        'name' => $request->name,
        'slug' => str_slug($request->name),
        'address' => $request->address,
        'region' => $request->region,
        'category' => $request->category,
        'price' => $price,
        'operational' => $request->open.' Sampai '.$request->closed.' WIB',
        'description' => $request->description,
        'image' => $image,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude
      ]);

      foreach ($request->file('panorama') as $panorama) {
        $path = $panorama->store('panorama');
        Panorama::create([
          'path' => $path,
          'tour_id' => $tour->id
        ]);
      }



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
        'name' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:25',
        'address' => 'required|min:10',
        'region' => 'required|in:Ampelgading,Bantarbolang,Belik,Bodeh,Comal,Moga,Pemalang,Petarukan,Pulosari,Randudongkal,Taman,Ulujami,Warungpring,Watukumpul',
        'price' => 'required|numeric|between:5.000,1000.000',
        'description' => 'required|min:50',
        'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        'panorama.*' => 'image|mimes:jpg,png,jpeg|max:2048'
      ]);
      $open = str_replace('0','',substr($request->open, 0,2));
      $closed = str_replace('0','',substr($request->closed, 0,2));
      if($closed < $open){
        return back()->with('errorOperational','Jam operasional tidak benar')->withInput();
      }
      $image = $tour->image;
      if($request->image){
        $image = $request->file('image')->store('pictures');
      }
      $price = str_replace('.','',$request->price);
      $tour->update([
        'name' => $request->name,
        'slug' => str_slug($request->name),
        'address' => $request->address,
        'region' => $request->region,
        'category' => $request->category,
        'price' => $price,
        'operational' => $request->open.' Sampai '.$request->closed.' WIB',
        'description' => $request->description,
        'image' => $image,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude
       ]);
      if($request->panorama){
        foreach ($request->file('panorama') as $panorama) {
          $path = $panorama->store('panorama');
          Panorama::create([
            'path' => $path,
            'tour_id' => $tour->id
          ]);
        }
      }

      return redirect()->route('tour')->with('success','Wisata berhasil diubah');
    }

    public function destroy(Tour $tour)
    {
      $image_path = $tour->image;
      if (Storage::exists($image_path)) {
          Storage::delete($image_path);
      }
      foreach ($tour->panoramas as $panorama) {
        $panorama_path = $panorama->path;
        if (Storage::exists($panorama_path)) {
            Storage::delete($panorama_path);
        }
      }
      $tour->delete();
      return redirect()->route('tour')->with('success','Wisata berhasil dihapus');
    }

    public function panoramaDestroy(Panorama $panorama){
      // dd($panorama);
      $panorama_path = $panorama->path;
      if (Storage::exists($panorama_path)) {
          Storage::delete($panorama_path);
      }
      $panorama->delete();

      return redirect()->back()->with('success','Panorama berhasil dihapus');
    }
}
