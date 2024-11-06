@extends('admin.layout.app')
@section('title', 'Profile')


@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Profile</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Profile</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
      <!-- breadcrumb end-->
      <!-- theme body start-->
      <div class="theme-body codex-chat">
        <div class="custom-container">       
          <div class="row">
            <div class="col-12">
              <div class="card">  
                <div class="card-body">
                          
                <form action="{{ route('admin.updateProfile') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="rate">Email</label>
            <input type="email" name="email" value="{{$data->email}}" class="form-control" id="email" required >
        </div>
       

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
      <!-- theme body end-->
    </div>
   
@endsection
@section('custom-js')


@endsection
