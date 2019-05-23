<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;

class TourController extends Controller
{
    public function __construct(){

    }

    public function index(){
      $tours = Tour::all();
      return response()->json([
        'status' => true,
        'message' => 'Berhasil',
        'data' => $tours
      ], 200);
    }

    public function show(Tour $tour){
      return response()->json([
        'status' => true,
        'message' => 'Berhasil',
        'data' => $tour
      ], 200);
    }

    public function category($category){
      $tour = Tour::where('category',$category)->get();
      if ($tour->isEmpty()) {
        return response()->json([
          'status' => false,
          'message' => 'Not Found',
        ], 404);
      }
      return response()->json([
        'status' => true,
        'message' => 'Berhasil',
        'data' => $tour
      ], 200);
    }
}
