@extends('layouts.admin')

@section('content')
<div class="card">
<div class="card-header">
    <h4>Update Category</h4>
</div>
<div class="card-body">
      <form action="{{route('updateCategory',$category->id)}}" method="POST" enctype="multipart/form-data">
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
          <div class="col-md-6 mb-3">
              <label for="">Name</label>
             <input type="text" value="{{$category->name}}" class="form-control" name="name"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Slug</label>
             <input type="text" value="{{$category->slug}}" class="form-control" name="slug"> 
          </div>
          <div class="col-md-6 mb-3">
          <label for="">Description</label>
          <textarea name="description"  rows="3" class="form-control">{{$category->description}}</textarea>
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Status</label>
             <input type="checkbox" {{$category->status== "1"? 'checked':''}} name="status"> 
          </div>
          <div class="col-md-6 mb-3">
              <label for="">Popular</label>
             <input type="checkbox" {{$category->popular== "1"? 'checked':''}} name="popular"> 
          </div>
          
          <div class="col-md-6 mb-3">
          <label for="">Image</label>
          @if($category->image)
          <img src="{{asset('assets/uploads/category/'.$category->image)}}" style="width:100px;" alt="Image here">
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