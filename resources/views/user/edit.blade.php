@extends('layout.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic form elements</h4>
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" action="{{route('admin.user.update',$User->id)}}" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="name" value="{{$User->name}}" class="form-control" id="exampleInputName1" placeholder="Name">
            @error('name')
              <small>{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Email address</label>
            <input type="email" name="email" value="{{$User->email}}" class="form-control" id="exampleInputEmail3" placeholder="Email">
            @error('email')
              <small>{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" name="password" value="" class="form-control" id="exampleInputPassword4" placeholder="Password">
            @error('password')
              <small>{{$message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleSelectrole">role</label>
            <select class="form-control" name="role" value="{{$User->role}}" id="exampleSelectrole">
              <option value="Admin">Admin</option>
              <option value="User" >User</option>
            </select>
            @error('role')
              <small>{{$message}}</small>
            @enderror
            <button type="submit" class="btn btn-primary mr-2">Submit</button></button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection