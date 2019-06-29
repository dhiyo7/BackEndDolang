<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Tour;
use Auth;

class UserController extends Controller
{
    public function register(Request $request){
      $this->validate($request,[
        'name' => 'required|min:5',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'api_token' => bcrypt($request->email),
      ]);

      return response()->json([
        'message' => 'berhasil',
        'status' => true,
        'data' => $user
      ], 201);
    }

    public function login(Request $request){

      $credential =[
          'email' => $request->email,
          'password' => $request->password,
      ];

      if(!Auth::guard('web')->attempt($credential, $request->member))
      {
          return response()->json([
              'message' => 'Gagal Login',
              'status' => false
          ], 200);
      }
      $user = User::find(Auth::user()->id);
      return response()->json([
          'message' => 'Berhasil',
          'status' => true,
          'data' => $user
      ], 200);
    }

    public function comment(Request $request){
      $this->validate($request,[
        'message' => 'required|min:2',
        'tour_id' => 'required'
      ]);

      $tour = Tour::where('id',$request->tour_id)->first();
      $user = User::find(Auth::user()->id);
      if($tour == null){
        return response()->json([
          'message' => 'Pariwisata tidak ada',
          'status' => false
        ], 404);
      }

      $comment = Comment::create([
        'user_id' => $user->id,
        'tour_id' => $request->tour_id,
        'message' => $request->message
      ]);

      return response()->json([
        'message' => 'Berhasil',
        'status' => true,
        'data' => $comment
      ], 201);

    }

}
