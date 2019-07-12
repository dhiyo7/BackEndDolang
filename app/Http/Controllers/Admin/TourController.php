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
      //dd($request->all());
      $this->validate($request,[
        'title' => 'required|min:5',
        'address' => 'required|min:10',
        'region' => 'required|in:Ampelgading,Bantarbolang,Belik,Bodeh,Comal,Moga,Pemalang,Petarukan,Pulosari,Randudongkal,Taman,Ulujami,Warungpring,Watukumpul',
        'price' => 'required|min:2',
        'description' => 'required|min:50',
        'image' => 'required|mimes:jpeg,png,jpeg',
        'panorama1' => 'required|mimes:jpeg,png,jpeg',
        'panorama2' => 'required|mimes:jpeg,png,jpeg',
        'panorama3' => 'required|mimes:jpeg,png,jpeg',
      ]);

      $image = $request->file('image')->store('pictures');
      $panorama1 = $request->file('panorama1')->store('panorama');
      $panorama2 = $request->file('panorama2')->store('panorama');
      $panorama3 = $request->file('panorama3')->store('panorama');

      Tour::create([
        'title' => $request->title,
        'address' => $request->address,
        'region' => $request->region,
        'category' => $request->category,
        'price' => 'Rp. '.$request->price,
        'description' => $request->description,
        'image' => $image,
        'panorama1' => $panorama1,
        'panorama2' => $panorama2,
        'panorama3' => $panorama3,
        'longitude' => $request->longitude,
        'latitude' => $request->latitude
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
      // dd($request->all());
      $this->validate($request,[
        'title' => 'required|min:5',
        'address' => 'required|min:10',
        'region' => 'required|in:Ampelgading,Bantarbolang,Belik,Bodeh,Comal,Moga,Pemalang,Petarukan,Pulosari,Randudongkal,Taman,Ulujami,Warungpring,Watukumpul',
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
          if ($request->panorama1) {
            $panorama_path1 = $tour->panorama1;
            if (Storage::exists($panorama_path1)) {
              Storage::delete($panorama_path1);
            }
            $panorama1 = $request->file('panorama1')->store('panorama');
            if ($request->panorama2) {
              $panorama_path2 = $tour->panorama2;
              if (Storage::exists($panorama_path2)) {
                Storage::delete($panorama_path2);
              }
              $panorama2 = $request->file('panorama2')->store('panorama');
              if ($request->panorama3) {
                $panorama_path3 = $tour->panorama3;
                if (Storage::exists($panorama_path3)) {
                  Storage::delete($panorama_path3);
                }
                $panorama3 = $request->file('panorama3')->store('panorama');
                $tour->update([
                      'title' => $request->title,
                      'address' => $request->address,
                      'region' => $request->region,
                      'category' => $request->category,
                      'price' => 'Rp. '.$request->price,
                      'description' => $request->description,
                      'image' => $image,
                      'panorama1' => $panorama1,
                      'panorama2' => $panorama2,
                      'panorama3' => $panorama3,
                      'longitude' => $request->longitude,
                      'latitude' => $request->latitude
                    ]);
              }
              $tour->update([
                    'title' => $request->title,
                    'address' => $request->address,
                    'region' => $request->region,
                    'category' => $request->category,
                    'price' => 'Rp. '.$request->price,
                    'description' => $request->description,
                    'image' => $image,
                    'panorama1' => $panorama1,
                    'panorama2' => $panorama2,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude
                ]);
            }
            $tour->update([
                  'title' => $request->title,
                  'address' => $request->address,
                  'region' => $request->region,
                  'category' => $request->category,
                  'price' => 'Rp. '.$request->price,
                  'description' => $request->description,
                  'image' => $image,
                  'panorama1' => $panorama1,
                  'longitude' => $request->longitude,
                  'latitude' => $request->latitude
              ]);
          }
          $tour->update([
                'title' => $request->title,
                'address' => $request->address,
                'region' => $request->region,
                'category' => $request->category,
                'price' => 'Rp. '.$request->price,
                'description' => $request->description,
                'image' => $image,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude
            ]);
      }elseif ($request->panorama1) {
          $panorama_path1 = $tour->panorama1;
          if (Storage::exists($panorama_path1)) {
            Storage::delete($panorama_path1);
          }
          $panorama1 = $request->file('panorama1')->store('panorama');
          if ($request->panorama2) {
            $panorama_path2 = $tour->panorama2;
            if (Storage::exists($panorama_path2)) {
              Storage::delete($panorama_path2);
            }
            $panorama2 = $request->file('panorama2')->store('panorama');
            if ($request->panorama3) {
              $panorama_path3 = $tour->panorama3;
              if (Storage::exists($panorama_path3)) {
                Storage::delete($panorama_path3);
              }
              $panorama3 = $request->file('panorama3')->store('panorama');
              $tour->update([
                    'title' => $request->title,
                    'address' => $request->address,
                    'region' => $request->region,
                    'category' => $request->category,
                    'price' => 'Rp. '.$request->price,
                    'description' => $request->description,
                    'panorama1' => $panorama1,
                    'panorama2' => $panorama2,
                    'panorama3' => $panorama3,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude
                  ]);
            }
            $tour->update([
                  'title' => $request->title,
                  'address' => $request->address,
                  'region' => $request->region,
                  'category' => $request->category,
                  'price' => 'Rp. '.$request->price,
                  'description' => $request->description,
                  'panorama1' => $panorama1,
                  'panorama2' => $panorama2,
                  'longitude' => $request->longitude,
                  'latitude' => $request->latitude
              ]);
          }
          $tour->update([
                'title' => $request->title,
                'address' => $request->address,
                'region' => $request->region,
                'category' => $request->category,
                'price' => 'Rp. '.$request->price,
                'description' => $request->description,
                'panorama1' => $panorama1,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude
            ]);
        }elseif ($request->panorama2) {
            $panorama_path2 = $tour->panorama2;
            if (Storage::exists($panorama_path2)) {
              Storage::delete($panorama_path2);
            }
            $panorama2 = $request->file('panorama2')->store('panorama');
            if ($request->panorama3) {
              $panorama_path3 = $tour->panorama3;
              if (Storage::exists($panorama_path3)) {
                Storage::delete($panorama_path3);
              }
              $panorama3 = $request->file('panorama3')->store('panorama');
              $tour->update([
                    'title' => $request->title,
                    'address' => $request->address,
                    'region' => $request->region,
                    'category' => $request->category,
                    'price' => 'Rp. '.$request->price,
                    'description' => $request->description,
                    'panorama2' => $panorama2,
                    'panorama3' => $panorama3,
                    'longitude' => $request->longitude,
                    'latitude' => $request->latitude
                  ]);
            }
            $tour->update([
                  'title' => $request->title,
                  'address' => $request->address,
                  'region' => $request->region,
                  'category' => $request->category,
                  'price' => 'Rp. '.$request->price,
                  'description' => $request->description,
                  'panorama2' => $panorama2,
                  'longitude' => $request->longitude,
                  'latitude' => $request->latitude
              ]);
          }elseif ($request->panorama3) {
            $panorama_path3 = $tour->panorama3;
            if (Storage::exists($panorama_path3)) {
              Storage::delete($panorama_path3);
            }
            $panorama3 = $request->file('panorama3')->store('panorama');
            $tour->update([
                  'title' => $request->title,
                  'address' => $request->address,
                  'region' => $request->region,
                  'category' => $request->category,
                  'price' => 'Rp. '.$request->price,
                  'description' => $request->description,
                  'panorama3' => $panorama3,
                  'longitude' => $request->longitude,
                  'latitude' => $request->latitude
                ]);
          }else {
            $tour->update([
                  'title' => $request->title,
                  'address' => $request->address,
                  'region' => $request->region,
                  'category' => $request->category,
                  'price' => 'Rp. '.$request->price,
                  'description' => $request->description,
                  'longitude' => $request->longitude,
                  'latitude' => $request->latitude
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
      $panorama_path1 = $tour->panorama1;
      if (Storage::exists($panorama_path1)) {
          Storage::delete($panorama_path1);
      }
      $panorama_path2 = $tour->panorama2;
      if (Storage::exists($panorama_path2)) {
          Storage::delete($panorama_path2);
      }
      $panorama_path3 = $tour->panorama3;
      if (Storage::exists($panorama_path3)) {
          Storage::delete($panorama_path3);
      }
      $tour->delete();
      return redirect()->route('tour')->with('success','Wisata berhasil dihapus');
    }
}
