@extends('admin.layout.app')
@section('title', 'Salary')


@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Salary</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Salary             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Salary</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">List</a></li>
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
             
                <form action="{{ route('update-salary', $tax->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Refer Count</label>
            <input type="text" name="refer_count" class="form-control" id="name" value="{{ $tax->refer_count }}" required>
        </div>

        <div class="form-group">
            <label for="rate">Salary</label>
            <input type="number" name="salary" class="form-control" id="rate" value="{{ $tax->salary }}" required >
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
