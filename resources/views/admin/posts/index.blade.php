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
        <th>User ID</th>
        <th>created_at</th>
        <th>updated_at</th>
        


    </tr>
     @foreach($posts as $post)
        <tr class="active">
            <td>{{$post->id}}</td>
            <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</td>
            <td>{{$post->body}}</td>
{{-- 
            @if ($post->photo_id)
            <td> <img  width = "100" height = "100" src="{{$post->photo['file']}}" /></td>   {{--add /images before the image path works incase theres no mutator --}}
            {{-- @else
            <td>          
         <img src="https://via.placeholder.com/100" alt="">
            </td>

            @endif --}}


            
            {{-- <td> <img width = "200" src="/photos/{{$user->photo['file']}}"/></td> --}}
            <td>{{$post->category_id}}</td>
            <td>{{$post->user_id}}</td> {{-- Reurns an array and should be accesed with [] instead of -> --}}
           
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>

    @endforeach
</table>


@endsection()