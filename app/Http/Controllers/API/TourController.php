<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Comment;
use DB;

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

      $comments = DB::table('comments')
            ->join('users','users.id','=','comments.user_id')
            ->select('users.name as name','comments.message','comments.created_at')
            ->where('comments.tour_id',$tour->id)
            ->get();
      return response()->json([
        'status' => true,
        'message' => 'Berhasil',
        'data' => [
          'id' => $tour->id,
          'title' => $tour->title,
          'address' => $tour->category,
          'region' => $tour->region,
          'price' => $tour->price,
          'description' => $tour->description,
          'image' => $tour->image,
          'panorama' => $tour->panorama,
          'longitude' => $tour->longitude,
          'latitude' => $tour->latitude,
          'comment' => $comments
        ]
      ], 200);
    }

    public function category($category){
      $tour = Tour::where('category',$category)->get();
      if ($tour->isEmpty()) {
        return response()->json([
          'status' => true,
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
