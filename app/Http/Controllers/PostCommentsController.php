<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();
      $this->validate($request,[
        'body' => 'required'
    ]);

      $data = [
        'post_id'=>$request->post_id,
        'author'=>$user->name,
        'email'=>$user->email,
        'body'=>$request->body,
        'photo'=>$user->photo['file']
      ];
      $post = Post::find($request->post_id);
      $post->comments()->create($data);
      $request->session()->flash('comment_message','Your message has been submitted and is waiting moderation');
      return redirect()->back()->with('success','Comment Submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
       $comments = $post->comments()->get();
       return view('admin.comments.show',compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $request->is_active;
        if($result == 0){
            Comment::find($id)->update($request->all());
            return redirect()->route('comments.index')->with('success','Comment has been Unapproved ');
        }else{
            Comment::find($id)->update($request->all());
            return redirect()->route('comments.index')->with('success','Comment has been Approved ');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
       return redirect()->route('comments.index')->with('success','Comment has been deleted');
    }
}
