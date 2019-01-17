@extends('layouts.admin')


@section('content')
<div class="well">  
    <h1>Comments </h1>
</div>
<table class="table table-bordered">
    <tr class="info">
        <th>id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Post</th>
        <th>Post Name</th>
        <th>Status</th>
        <th></th>


    </tr>
     @foreach($comments as $comment)
        <tr class="active">
            <td>{{$comment->id}}</td>

            
            <td>{{$comment->author}}</td> {{-- Reurns an array and should be accesed with [] instead of -> --}}
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td>{{$comment->created_at->diffForHumans()}}</td>
            <td>{{$comment->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('front.post', $comment->post_id)}}">View Post</td>
            <td>{{$comment->post['title']}}</td>
            <td>
                @if($comment->is_active == 1)
                    {!! Form::open(['route' => ['comments.update',$comment->id], 'method' => 'PATCH']) !!}

                    <input type="hidden" name="is_active" value="0">
                    {{ Form::submit('Un-Approve', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['comments.update',$comment->id], 'method' => 'PATCH']) !!}

                    <input type="hidden" name="is_active" value="1">
                    {{ Form::submit('Approve', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}

                @endif
            </td>
            <td>
                    {!! Form::open(['route' => ['comments.destroy',$comment->id], 'method' => 'DELETE']) !!}

                    {{ Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
            </td>

        </tr>

    @endforeach
@endsection