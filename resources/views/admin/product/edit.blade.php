@extends('layouts.admin')

@section('content')
<div class="card">
<div class="card-header">
    <h4>Update Product</h4>
</div>
<div class="card-body">
      <form action="{{route('updateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="row">
      <div class="col-md-12 mb-3">
      <label for="">Category</label>
           <select class="form-select">
               <option value="">{{$product->category->name}}</option>
           </select>    
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Name</label>
             <input type="text" class="form-control" value="{{ $product->name}}" name="name"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Slug</label>
             <input type="text" class="form-control" value="{{ $product->slug}}" name="slug"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Title</label>
             <input type="text" class="form-control" value="{{ $product->title}}" name="title"> 
          </div>
          <div class="col-md-6 mb-3">
          <label for="">Description</label>
          <textarea name="description"  rows="3" class="form-control">{{$product->description}}</textarea>
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Original Price</label>
             <input type="text" class="form-control" value="{{ $product->original_price}}" name="original_price"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Selling Price</label>
             <input type="text" class="form-control" value="{{ $product->selling_price}}" name="selling_price"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Quantity</label>
             <input type="number" class="form-control" value="{{ $product->qty}}" name="qty"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Tax</label>
             <input type="text" class="form-control" value="{{ $product->tax}}" name="tax"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Status</label>
             <input type="checkbox" {{$product->status== "1"? 'checked':''}} name="status"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Trending</label>
             <input type="checkbox" {{$product->trending== "1"? 'checked':''}} name="trending"> 
          </div>
          <div class="col-md-6 mb-3">
          <label for="">Image</label>
          @if($product->image)
          <img src="{{asset('assets/uploads/product/'.$product->image)}}" style="width:100px;" alt="Image here">
          @endif
             <input type="file" class="form-control" name="image"> 
          </div>
          <div class="col-md-6 mb-3">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>

      </div>

      </form>
    </div>
</div>
@endsection