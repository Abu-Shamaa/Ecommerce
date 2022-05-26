@extends('layouts.front')

@section('title')
Checkout
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                        <label for="">Name</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" required placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                        <label for="">Email</label>
                            <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" required placeholder="Enter Email">
                        </div>
                        <div class="col-md-6">
                        <label for="">Phone Number</label>
                            <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" required placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                        <label for="">Address</label>
                            <input type="text" class="form-control" name="address" required placeholder="Enter Address">
                        </div>
                        <div class="col-md-6">
                        <label for="">City</label>
                            <input type="text" class="form-control" name="city" required placeholder="Enter City">
                        </div>
                        <div class="col-md-6">
                        <label for="">State</label>
                            <input type="text" class="form-control" name="state" required placeholder="Enter State">
                        </div>
                        <div class="col-md-6">
                        <label for="">Country</label>
                            <input type="text" class="form-control" name="country" required placeholder="Enter Country">
                        </div>
                        <div class="col-md-6">
                        <label for="">Postcode</label>
                            <input type="text" class="form-control" name="postcode" required placeholder="Enter Postcode">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
               <div class="card-body">
                   <h6> Order details</h6>
                   <hr>
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                               <th>Name</th>
                               <th>Qty</th>
                               <th>Price</th>
                           </tr>
                       </thead>
                       <tbody>
                       @foreach($cartitems as $item)
                           <tr>
                               <td> {{$item->product->name}}</td>
                               <td>{{$item->prod_qty}}</td>
                               <td> {{$item->product->selling_price}}</td>
                          
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   <hr>
                   <button type="submit" class="btn btn-primary w-100">Place Order | COD</button>     
               </div> 
            </div>
        </div>
    </div>
    </form>
</div>
@endsection