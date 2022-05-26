@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col md-6"><h2> All Product</h2></div>
    <div class="col md-6"><a class="btn btn-primary pull-right" href="{{route('addP')}}" role="button">Add Product</a> </div>
  </div>
  </div>
    <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Category</th>
          <th>Name</th>
          <th>Title</th>
          <th>Description</th>
          <th>Original Price</th>
          <th>Selling Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($product as $item)
        <tr>
          <td>{{ $item->id}}</td>
          <td>{{ $item->category->name}}</td>
          <td>{{ $item->name}}</td>
          <td>{{ $item->title}}</td>
          <td>{{ $item->description}}</td>
          <td>{{ $item->original_price}}</td>
          <td>{{ $item->selling_price}}</td>
          <td><img src="{{asset('assets/uploads/product/'.$item->image)}}" style="width:100px;" alt="Image here"></td>
          <td>
            <a href="{{route('editP',$item->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('deleteProduct',$item->id)}}" class="btn btn-danger">Delete</a>
         
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection