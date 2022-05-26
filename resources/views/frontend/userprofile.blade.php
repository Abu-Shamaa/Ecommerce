@extends('layouts.front')

@section('title')
User Profile
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h4>My Profile</h4>
                    
                </div>
                <div class="card-body">
                    
                            <h4>Profile Details</h4>
                            <hr>
                            <label class="mt-2" for="">Name</label>
                            <div class="border p-2 mt-2">{{$users->name}}</div>
                            <label class="mt-2" for="">Emali</label>
                            <div class="border p-2 mt-2">{{$users->email}}</div>
                            <label class="mt-2" for="">Contact No</label>
                            <div class="border p-2 mt-2">{{$users->phone}}</div>
                            
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection