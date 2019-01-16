@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-sm-6">
            <div class="well">  
                    <h1>Upload media </h1>
            </div>
        {!! Form::open(['route' => 'media.store', 'method' => 'POST','files'=>'true']) !!}
        <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name',null,['class' => 'form-control',])}}
        </div>


       
        {{ Form::submit('Upload Media', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}    
        
    </div>
</div>


@endsection()