<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\CommentReply;
use App\User;
use App\Role;
use App\Photo;

class FrontController extends Controller
{
   public function post($id){
       
      // $comments = Comment::all();
       $post = Post::find($id);
       $comments = $post->comments()->get();
      // $comments = $post->comments()->whereIsActive(1)->get();
        
       return view('front.post',compact('post','comments'));
   } 
   public function index(){
       $posts = Post::all();

       return view('front.home',compact('posts'));
   }
}
