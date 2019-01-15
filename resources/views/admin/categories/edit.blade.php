@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Create Post </h1>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::model($category,['route' => ['categories.store',$category->id], 'method' => 'POST','files'=>'true']) !!}
        <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name',null,['class' => 'form-control',])}}
        </div>
        {{ Form::submit('Update Category', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}

        <br>
        {!! Form::open(['route' => ['categories.destroy',$category->id], 'method' => 'DELETE']) !!}
          
         {{ Form::submit('Delete Category', ['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
    </div>


@endsection()