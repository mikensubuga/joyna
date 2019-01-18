@extends('layouts.blog-post')

@section('content')


    <h1 class="page-header">
        Blog Section
        <small>Events</small>
    </h1>

    @forelse ($posts as $post)
        <!-- First Blog Post -->
    <h2>
        <a href="{{route('front.post',$post->id)}}">{{$post->title}}</a>
    </h2>
    <p class="lead">
        by <a href="#">{{$post->user['name']}}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
    <hr>
    <img class="img-responsive" src="{{$post->photo['file']}}" alt="">
    <hr>
    <p>{{$post->body}}</p>
    <a class="btn btn-primary" href="{{route('front.post',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
    @empty
        No Posts
    @endforelse
    
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

    {{-- <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul> --}}


@endsection()