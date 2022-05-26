@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col md-6"><h2> All Users</h2></div>
  </div>
  </div>
    <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $item)
        <tr>
          <td>{{ $item->id}}</td>
          <td>{{ $item->name}}</td>
          <td>{{ $item->email}}</td>
          <td>{{ $item->phone}}</td>
          <td>{{ $item->role_as == '0'? 'User':'Admin'}}</td>
    
          <td>
           
            <a href="{{route('deleteUser', $item->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
         
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection

