@extends('admin.layout.app')
@section('title', 'Refer Commission')


@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Refer Commission</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Refer Commission             </a></li>
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
             
                <form action="{{ route('update-referCommission', $tax->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Parent Commission in %</label>
            <input type="number" name="parent" class="form-control" id="parent" value="{{ $tax->parent }}" min="0" max="100"  required >
        </div>
        <div class="form-group">
            <label for="name">Parent of Parent Commission in %</label>
            <input type="number" name="parent_of_parent" class="form-control" id="parent_of_parent" value="{{ $tax->parent_of_parent }}" required min="0" max="100" step="0.01">
        </div>
        <div class="form-group">
            <label for="name">Grand Parent Commission in %</label>
            <input type="number" name="grand_parent" class="form-control" id="grand_parent" value="{{ $tax->grand_parent }}" required min="0" max="100" step="0.01">
        </div>

        <!-- <div class="form-group">
            <label for="rate">Tax Rate (%)</label>
            <input type="number" name="rate" class="form-control" id="rate" value="{{ $tax->rate }}" required min="0" max="100" step="0.01">
        </div> -->

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
<script>
    document.querySelector('input[name="parent"]').addEventListener('input', function(e) {
        let value = parseInt(e.target.value, 10);

        if (value < 1) {
            e.target.value = 1;
        } else if (value > 100) {
            e.target.value = 100;
        }
    });
    document.querySelector('input[name="parent_of_parent"]').addEventListener('input', function(e) {
        let value = parseInt(e.target.value, 10);

        if (value < 1) {
            e.target.value = 1;
        } else if (value > 100) {
            e.target.value = 100;
        }
    });
    document.querySelector('input[name="grand_parent"]').addEventListener('input', function(e) {
        let value = parseInt(e.target.value, 10);

        if (value < 1) {
            e.target.value = 1;
        } else if (value > 100) {
            e.target.value = 100;
        }
    });
</script>

@endsection
