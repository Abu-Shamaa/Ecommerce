@extends('layouts.front')

@section('title')
Welcome to E-Shop
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
   <div class="container">
       <div class="row">
           <h2>Featured Products</h2>
       <div class="owl-carousel featured-carousel owl-theme">
       @foreach($feature_produtcts as $product)
           <div class="item">
               <div class="card">
                   <img src="{{asset('assets/uploads/product/'.$product->image)}}"  alt="img" width="150" height="100">
                   <div class="card-body">
                       <h5>{{$product->name}}</h5>
                       <span class="float-start">{{$product->selling_price}}</span>
                       <span class="float-end"> <s>{{$product->original_price}}</s></span>
                   </div>
               </div>
           </div>
           @endforeach
</div>
          
       </div>
   </div> 
</div>

<div class="py-5">
   <div class="container">
       <div class="row">
           <h2>Trending Category</h2>
       <div class="owl-carousel featured-carousel owl-theme">
       @foreach($trending_category as $tcategory)
           <div class="item">
               <a href="{{url('view-category/'.$tcategory->slug)}}">
               <div class="card">
                   <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}"  alt="img" width="150" height="100">
                   <div class="card-body">
                       <h5>{{$tcategory->name}}</h5>
                       <p>{{$tcategory->description}}</p>
                   </div>
               </div>
               </a>
           </div>
           @endforeach
</div>
          
       </div>
   </div> 
</div>

@endsection

@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>

@endsection