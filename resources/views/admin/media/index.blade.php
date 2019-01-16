@extends('layouts.admin')

@section('content')
<div class="well">  
    <h1>Media </h1>
</div>

<div class="row">
    <div class="col-sm-12">
            <table class="table table-bordered">
                    <tr class="info">
                        <th>id</th>
                        <th>Name</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                    @forelse ($photos as $photo)
                    <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height = "100" src="{{$photo->file}}" /> </td>
                    <td>{{$photo->created_at}}</td>
                    <td>{{$photo->updated_at}}</td>
                    </tr>
                    @empty
                       No Photos Available 
                    @endforelse
                </table>
    </div>
    </div>


@endsection()