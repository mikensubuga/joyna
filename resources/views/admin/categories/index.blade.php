@extends('layouts.admin')

@section('content')
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
    <td>{{$category->name}}</td>
    <td>{{$category->created_at}}</td>
    <td>{{$category->updated_at}}</td>
    </tr>
    @empty
       No Categories Available 
    @endforelse
</table>


@endsection()