<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $users = User::orderBy('id','DESC')->get();
      return view('home.user.index', compact('users'));
    }

    public function activation(User $user){
      if($user->status){
        $user->update([
          'api_token' => null,
          'status' => false
        ]);
        return redirect()->back()->with('message','Pengguna Berhasil di Non Aktifkan');
      }else{
        $user->update([
          'api_token' => bcrypt($user->email),
          'status' => true
        ]);
        return redirect()->back()->with('message','Pengguna Berhasil di Aktifkan');
      }
    }

    public function edit(User $user){
      return view('home.user.edit',compact('user'));
    }

    public function update(Request $request, User $user){
      $this->validate($request,[
        'name' => 'string|min:5',
        'email' => "email|unique:users,email,$user->id",
        'avatar' => 'image|mimes:jpg,jpeg,png|max:2048'
      ]);

      if ($request->password) {
        if ($request->avatar) {
          $avatar = $request->file('avatar')->store('avatar');
          if ($user->avatar == 'avatar/default.png') {
            $user->update([
              'name' => $request->name,
              'email' => $request->email,
              'password' => $request->password,
              'avatar' => $avatar
            ]);
          }else {
            $avatar_path = $user->avatar;
            if (Storage::exists($avatar_path)) {
              Storage::delete($avatar_path);
            }
            $user->update([
              'name' => $request->name,
              'email' => $request->email,
              'password' => $request->password,
              'avatar' => $avatar
            ]);
          }
        }
        $this->validate($request,[
          'password' => 'string|min:5',
        ]);
        $user->update([
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password
        ]);
      }elseif($request->avatar) {
          $avatar = $request->file('avatar')->store('avatar');
          if ($user->avatar == 'avatar/default.png') {
            $user->update([
              'name' => $request->name,
              'email' => $request->email,
              'avatar' => $avatar
            ]);
          }else {
            $avatar_path = $user->avatar;
            if (Storage::exists($avatar_path)) {
              Storage::delete($avatar_path);
            }
            $user->update([
              'name' => $request->name,
              'email' => $request->email,
              'avatar' => $avatar
            ]);
          }
        }else {
          $user->update([
            'name' => $request->name,
            'email' => $request->email,
          ]);
        }

        return redirect()->route('user')->with('message','Pengguna Berhasil di ubah');
  }
}
