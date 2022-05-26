@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col md-6"><h2> All Category</h2></div>
    <div class="col md-6"><a class="btn btn-primary pull-right" href="{{route('addcat')}}" role="button">Add Category</a> </div>
  </div>
  </div>
    <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($category as $item)
      
        <tr>
          <td>{{ $item->id}}</td>
          <td>{{ $item->name}}</td>
          <td>{{ $item->description}}</td>
          <td><img src="{{asset('assets/uploads/category/'.$item->image)}}" style="width:100px;" alt="Image here"></td>
          <td>
            <a href="/edit/{{$item->id}}" class="btn btn-primary">Edit</a>
            <a href="/delete/{{$item->id}}" class="btn btn-danger">Delete</a>
         
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection