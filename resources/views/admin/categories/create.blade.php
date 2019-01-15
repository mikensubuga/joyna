@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Create Post </h1>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST','files'=>'true']) !!}
        <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name',null,['class' => 'form-control',])}}
        </div>


       
        {{ Form::submit('Create Category', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    </div>


@endsection()