@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Create Post </h1>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::open(['route' => 'posts.store', 'method' => 'POST','files'=>'true']) !!}
        <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title','',['class' => 'form-control',])}}
        </div>


        <div class="form-group">
                {{Form::label('category_id', 'Category')}}
                {{Form::select('category_id',$categories,'',['class' => 'form-control',])}}
        </div>
        
            <div class="form-group">
            {{Form::label('photo_id', 'Photo')}}
            {{Form::file('photo_id',['class' => 'form-control',])}}
            </div>



        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body',null,['class' => 'form-control',])}}
    </div>
        
       
        {{ Form::submit('Create Post', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    </div>


@endsection()