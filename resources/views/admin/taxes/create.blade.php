@extends('admin.layout.app')
@section('title', 'Taxes')


@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Taxes</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Taxes             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Tax</a></li>
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
                          
                <form action="{{ route('store-tax') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tax Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="rate">Tax Rate (%)</label>
            <input type="number" name="rate" class="form-control" id="rate" required min="0" max="100" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
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
