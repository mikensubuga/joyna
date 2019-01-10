@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Edit User </h1>
    </div>
<div class="col-sm-3">

                @if ($user->photo)
                <img src="{{$user->photo['file']}}" alt="" class="img-responsive img-rounded">

                @else
                No Photo
                <img src="https://via.placeholder.com/400" alt="" class="img-responsive img-rounded">

                @endif
    
       {{-- <img src="{{$user->photo['file']}}" alt="" class="img-responsive img-rounded"> --}}

</div>
   
        <div class="col-sm-9">
            {!! Form::model($user,['route' => ['users.update',$user->id], 'method' => 'PATCH','files'=>'true']) !!}
            <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name',null,['class' => 'form-control',])}}
            </div>

            <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email',null,['class' => 'form-control',])}}
            </div>

            <div class="form-group">
                    {{Form::label('role_id', 'Role')}}
                    {{Form::select('role_id',$roles,null,['class' => 'form-control',])}}
            </div>
            
                <div class="form-group">
                {{Form::label('photo_id', 'Photo')}}
                {{Form::file('photo_id',null,['class' => 'form-control',])}}
                </div>

            <div class="form-group">
                    {{Form::label('is_active', 'Status')}}
                    {{Form::select('is_active', array(1=>'Active',0=>'Not Active'),null,['class' => 'form-control',])}}
            </div>

            <div class="form-group">
                    {{Form::label('password', 'Password')}}
                    {{Form::password('password',['class' => 'form-control',])}}
        </div>
            
           
            {{ Form::submit('Edit User', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
        
    



@endsection()
