@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-sm-6">
            <div class="well">  
                    <h1>Create Category </h1>
                </div>
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST','files'=>'true']) !!}
        <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name',null,['class' => 'form-control',])}}
        </div>


       
        {{ Form::submit('Create Category', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    <div>
        <div class="col-sm-6">
            <div class="well">  
                    <h1>Categories </h1>
                </div>
            <table class="table table-bordered">
                    <tr class="info">
                        <th>id</th>
                        <th>Name</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                    @forelse ($categories as $category)
                    <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</td>
                
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    </tr>
                    @empty
                       No Categories Available 
                    @endforelse
                </table>
        </div>
                
    </div>
    </div>


@endsection()