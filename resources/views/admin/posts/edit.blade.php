@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Edit Post </h1>
</div>
<div class="row">
    <div class="col-sm-6">
        {!! Form::model($post,['route' => ['posts.update',$post->id], 'method' => 'PATCH','files'=>'true']) !!}
        <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title',null,['class' => 'form-control',])}}
        </div>


        <div class="form-group">
                {{Form::label('category_id', 'Category')}}
                {{Form::select('category_id',$categories,null,['class' => 'form-control',])}}
        </div>
        
            <div class="form-group">
            {{Form::label('photo_id', 'Photo')}}
            {{Form::file('photo_id',null,['class' => 'form-control',])}}
            </div>



        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body',null,['class' => 'form-control',])}}
    </div>
        
       
        {{ Form::submit('Update Post', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

        <br>
        {!! Form::open(['route' => ['posts.destroy',$post->id], 'method' => 'DELETE']) !!}
          
         {{ Form::submit('Delete Post', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
    </div>
    <div class="col-sm-6">

   @if ($post->photo)
                <img src="{{$post->photo['file']}}" alt="" class="img-responsive img-rounded">

                @else
                No Photo
                <img src="https://via.placeholder.com/400" alt="" class="img-responsive img-rounded">

                @endif
    </div>
    </div>


@endsection()