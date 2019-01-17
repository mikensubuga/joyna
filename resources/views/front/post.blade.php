@extends('layouts.blog-post')

@section('content')

 <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user['name']}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo['file']}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>
                <hr>
                @if(Session::has('comment_message'))
                <p class="bg-info">  {{session('comment_message')}}</p>
                @endif
                <!-- Blog Comments -->

                <!-- Comments Form -->
            @if(Auth::check())
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['route' => 'comments.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                   
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                    {{Form::textarea('body','',['class' => 'form-control','rows'=>'3'])}}
                    </div>

                    {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                    {{-- <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> --}}
                </div>
                 @endif
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @forelse ($comments as $comment)
                    @if($comment->is_active)
                     <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" width = "64" height= "64" src="{{$comment->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$comment->body}}
                            <!--replies-->
                            @if(Session::has('reply_message'))
                            <p class="bg-info">  {{session('reply_message')}}</p>
                            @endif
                            @forelse ($comment->replies as $reply)
                    
                           
                        
                                <div id="nested-comment" class="media">
                                    <a class="pull-left" href="#">
                                            <img class="media-object" width = "64" height= "64" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                                {{$reply->body}}
                                    </div>
                                    
                                </div>
                            
                            @empty
                            <br>
                                No Replies
                            @endforelse
                            <br>
                            <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                <div class="comment-reply">

                                    {!! Form::open(['route' => 'replies.createReply', 'method' => 'POST']) !!}
                                    <div class="form-group">
                                   
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    {{Form::textarea('body','',['class' => 'form-control','rows'=>'1'])}}
                                    </div>
                
                                    {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                    {!! Form::close() !!}

                                 </div>
                            </div>
                        </div>
                    </div>
                    @endif

                @empty
                    No Comments
                @endforelse
               
@endsection()
@section('scripts')
<script type="text/javascript">
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });
</script>
@endsection