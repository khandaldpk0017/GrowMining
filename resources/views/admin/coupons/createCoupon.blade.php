@extends('admin.layout.app')
@section('title', 'Create Coupon')

@section('custom-css')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 34px;
  height: 20px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  transition: .4s;
  border-radius: 20px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 12px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:checked + .slider:before {
  transform: translateX(14px);
}
</style>
@endsection

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
      <div class="codex-breadcrumb">
        <div class="breadcrumb-contain">
          <div class="left-breadcrumb">
            <h1>Create Coupon</h1>
          </div>
          <div class="right-breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Coupons</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0);">Create Coupon</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- breadcrumb end-->
      <!-- theme body start-->
      <div class="theme-body codex-calendar">
        <div class="grid grid-cols-12 page-gap">          
          <div class="col-span-6">
            <div class="card">
              <!-- <div class="card-header">
                <h4>default form</h4>
              </div> -->
              <div class="card-body"> 
              <form action="{{ route('coupons.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="coupon">Coupon Code</label>
                <input type="text" name="code" id="code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" step="0.01" name="discount" id="discount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="expiration_date">Expiration Date</label>
                <input type="date" name="expiration_date" id="expiration_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Coupon</button>
        </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <!-- theme body end-->
    </div>
@endsection

@section('custom-js')

<!-- Add this in your Blade template's head section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
@endsection