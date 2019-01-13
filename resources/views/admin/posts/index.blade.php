@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Posts </h1>
</div>
<table class="table table-bordered">
    <tr class="info">
        <th>id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Category ID</th>
        <th>Owner</th>
        <th>Photo ID</th>
        <th>created_at</th>
        <th>updated_at</th>
        


    </tr>
     @foreach($posts as $post)
        <tr class="active">
            <td>{{$post->id}}</td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</td>
            <td>{{$post->body}}</td>
            
            {{-- <td> <img width = "200" src="/photos/{{$user->photo['file']}}"/></td> --}}
            <td>{{$post->category_id}}</td>
            <td>{{$post->user['name']}}</td> {{-- Reurns an array and should be accesed with [] instead of -> --}}
            <td>{{$post->photo_id}}</td>

            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>

    @endforeach
</table>


@endsection()