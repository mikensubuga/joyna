<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\CommentReply;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = CommentReply::all();
        return view('admin.comments.replies.index',compact('replies'));
    
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
        //
    }

    public function createReply(Request $request)
    {
        
            $user = Auth::user();
            $this->validate($request,[
              'body' => 'required'
          ]);
      
            $data = [
              'comment_id'=>$request->comment_id,
              'author'=>$user->name,
              'email'=>$user->email,
              'body'=>$request->body,
              'photo'=>$user->photo['file']
            ];
            $comment = Comment::find($request->comment_id);
            $comment->replies()->create($data);
            $request->session()->flash('reply_message','Your Reply has been submitted and is waiting moderation');
            return redirect()->back()->with('success','Reply Submitted');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        $replies = $comment->replies()->get();
        return view('admin.comments.replies.show',compact('replies'));
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
            CommentReply::find($id)->update($request->all());
            return redirect()->route('replies.index')->with('success','Reply has been Unapproved ');
        }else{
            CommentReply::find($id)->update($request->all());
            return redirect()->route('replies.index')->with('success','Reply has been Approved ');
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
        CommentReply::destroy($id);
       return redirect()->route('replies.index')->with('success','Reply has been deleted');
    }
}
