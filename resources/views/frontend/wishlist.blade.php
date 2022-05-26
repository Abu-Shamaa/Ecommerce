@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')
<div class="py-3 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
           <a href="{{ url('/')}}">Home</a> / 
           <a href="{{ url('wishlist')}}"> Wishlist</a>
            
        </h6>
    </div>
</div>

<div class="container my-5">
<div class="card shadow">
@if($wishlist->count() > 0)
        <div class="card-body">
            @foreach($wishlist as $item)
            <div class="row product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/product/'.$item->product->image) }}" height="70px" width="60px" alt="img">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->product->name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>RM {{ $item->product->selling_price}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                @if($item->product->qty >= $item->prod_qty)
                            
                <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:120px;">
                                <button class="input-group-text decrement-btn"> - </button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                <button class="input-group-text increment-btn" > + </button>
                            </div>
                            @else
                            <h6>Out of Stock</h6>
                            @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCartBtn"> <i class="fa fa-shopping-cart"></i> Add to Cart</button>
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist"> <i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            
            @endforeach
        </div>

    @else
    <h4>There is no product in your wishlist</h4>
    @endif
    
</div>
</div>
@endsection
