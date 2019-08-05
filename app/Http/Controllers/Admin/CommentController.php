<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
  public function __construct(){
    $this->middleware('auth:admin');
  }

  public function index(){
    $comments = Comment::orderBy('id', 'DESC')->get();
    return view('home.comment.index', compact('comments'));
  }

  public function destroy(Comment $comment){
    $comment->delete();
    return redirect()->route('comment')->with('message','Komentar Berhasil Dihapus');
  }

}
