@extends('layouts.admin')
@section('title')
    Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Order View <a href="{{url('orders')}}" class="btn btn-warning float-right">Back</a></h4>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">Name</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label for="">Emali</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="">Contact No</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address}}, <br>
                                {{$orders->city}}, <br>
                                {{$orders->state}},
                                {{$orders->country}},
                            </div>
                            <label for="">Post Code</label>
                            <div class="border p-2">{{$orders->postcode}}</div>
                            
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders->orderitems as $item)
                    <tr>
                        <td>{{ $item->product->name}}</td>
                        <td>{{ $item->qty}}</td>
                        <td>{{ $item->price}}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/product/'.$item->product->image)}}" width="50px" alt="img">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="px-2">Grand Total:: <span class="float-right"> {{ $orders->total_price }} </span></h4>
                <div class="mt-5">
                    <label for="">Order Status</label>
                    <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                        @csrf
                        <select class="form-select" name="order_status">
                            <option {{$orders->ststus=='0'?'selected':''}} value="0">Pending</option>
                            <option  {{$orders->ststus=='1'?'selected':''}} value="1">Completed</option>
                        </select>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </form>
                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection