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
       $post = Post::find($id);
       return view('front.post',compact('post'));
   } 
   public function index(){
       return view('front.home');
   }
}
