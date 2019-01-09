@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Create User </h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['route' => 'users.store', 'method' => 'POST','files'=>'true']) !!}
            <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name','',['class' => 'form-control',])}}
            </div>

            <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email','',['class' => 'form-control',])}}
            </div>

            <div class="form-group">
                    {{Form::label('role_id', 'Role')}}
                    {{Form::select('role_id',$roles,'',['class' => 'form-control',])}}
            </div>
            
                <div class="form-group">
                {{Form::label('photo_id', 'Photo')}}
                {{Form::file('photo_id',['class' => 'form-control',])}}
                </div>

            <div class="form-group">
                    {{Form::label('is_active', 'Status')}}
                    {{Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class' => 'form-control',])}}
            </div>

            <div class="form-group">
                    {{Form::label('password', 'Password')}}
                    {{Form::password('password',['class' => 'form-control',])}}
        </div>
            
           
            {{ Form::submit('Create User', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
        </div>
    



@endsection()
