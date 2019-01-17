@extends('layouts.admin')


@section('content')
<div class="well">  
    <h1>Replies </h1>
</div>
<table class="table table-bordered">
    <tr class="info">
        <th>id</th>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>created_at</th>
        <th>updated_at</th>
        
        <th>Comment Name</th>
        <th>Status</th>
        <th></th>


    </tr>
     @foreach($replies as $reply)
        <tr class="active">
            <td>{{$reply->id}}</td>

            
            <td>{{$reply->author}}</td> {{-- Reurns an array and should be accesed with [] instead of -> --}}
            <td>{{$reply->email}}</td>
            <td>{{$reply->body}}</td>
            <td>{{$reply->created_at->diffForHumans()}}</td>
            <td>{{$reply->updated_at->diffForHumans()}}</td>
        
            <td>{{str_limit($reply->comment['body'],10)}}</td>
            <td>
                @if($reply->is_active == 1)
                    {!! Form::open(['route' => ['replies.update',$reply->id], 'method' => 'PATCH']) !!}

                    <input type="hidden" name="is_active" value="0">
                    {{ Form::submit('Un-Approve', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['replies.update',$reply->id], 'method' => 'PATCH']) !!}

                    <input type="hidden" name="is_active" value="1">
                    {{ Form::submit('Approve', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}

                @endif
            </td>
            <td>
                    {!! Form::open(['route' => ['replies.destroy',$reply->id], 'method' => 'DELETE']) !!}

                    {{ Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
            </td>

        </tr>

    @endforeach
@endsection