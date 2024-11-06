@extends('admin.layout.app')
@section('title', 'QR')


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
                <li class="breadcrumb-item"><a href="javascript:void(0);">QR             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">QR</a></li>
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
                          
                <form action="{{ route('admin.qr_codes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="upi_id" class="form-label">UPI ID</label>
        <input type="text" class="form-control" id="upi_id" name="upi_id" required>
        </div>

        <div class="form-group">
        <label for="qr_image" class="form-label">QR Image</label>
        <input type="file" class="form-control" id="qr_image" name="qr_image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Create QR Code</button>
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
