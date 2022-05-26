@extends('layouts.admin')

@section('content')
<div class="card">
<div class="card-header">
    <h4>Add Product</h4>
</div>
<div class="card-body">
      <form action="{{route('stored')}}" method="POST" enctype="multipart/form-data">
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
           <select class="form-select" name="cate_id">
               <option value="">Select a Category</option>
               @foreach($category as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
               @endforeach
           </select>    
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Name</label>
             <input type="text" class="form-control" name="name"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Slug</label>
             <input type="text" class="form-control" name="slug"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Title</label>
             <input type="text" class="form-control" name="title"> 
          </div>
          <div class="col-md-6 mb-3">
          <label for="">Description</label>
          <textarea name="description"  rows="3" class="form-control"></textarea>
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Original Price</label>
             <input type="text" class="form-control" name="original_price"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Selling Price</label>
             <input type="text" class="form-control" name="selling_price"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Quantity</label>
             <input type="number" class="form-control" name="qty"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Tax</label>
             <input type="text" class="form-control" name="tax"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Status</label>
             <input type="checkbox"  name="status"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Trending</label>
             <input type="checkbox" name="trending"> 
          </div>
          <div class="col-md-6 mb-3">
          <label for="">Image</label>
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