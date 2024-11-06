@extends('admin.layout.app')
@section('title', 'Edit Product')

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
            <h1>Edit Product</h1>
          </div>
          <div class="right-breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Product</a></li>
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
              <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Product description:</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $product->description) }}" required>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


       
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ old('status', $product->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $product->status) == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                        <label for="price">Perday Earning</label>
                        <input type="number" class="form-control" name="perday_earning" step="0.01" value="{{ old('perday_earning', $product->perday_earning) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Total Earning</label>
                        <input type="number" class="form-control" name="total_earning" step="0.01" value="{{ old('total_earning', $product->total_earning) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Expire date</label>
                        <input type="number" class="form-control" name="expire_days"  value="{{ old('expire_days', $product->expire_days) }}" required>
                    </div>
        <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail_image">Thumbnail Image</label>
                        <input type="file" class="form-control" name="thumbnail_image">
                        @if ($product->thumbnail_image)
                            <img src="{{ Storage::url('images/' . $product->thumbnail_image) }}" width="100">
                        @endif
                    </div>
       

        <button type="submit" class="btn btn-primary">Update Product</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let variantIndex = {{ count($product->variants) }};

        document.getElementById('add-variant').addEventListener('click', function () {
            const variantContainer = document.getElementById('variants');

            const variantDiv = document.createElement('div');
            variantDiv.classList.add('variant');
            variantDiv.innerHTML = `
                <h4>Variant ${variantIndex + 1}</h4>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" name="variants[${variantIndex}][size]" required>
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="color" class="form-control" name="variants[${variantIndex}][color]" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="variants[${variantIndex}][stock]" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="variants[${variantIndex}][price]" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="thumbnail_image">Thumbnail Image</label>
                    <input type="file" class="form-control" name="variants[${variantIndex}][thumbnail_image]">
                </div>
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control" name="variants[${variantIndex}][images][]" multiple>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-variant">Remove Variant</button>
            `;

            variantContainer.appendChild(variantDiv);
            variantIndex++;
        });

        // Event delegation for remove variant buttons
        document.getElementById('variants').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-variant')) {
                e.target.closest('.variant').remove();
            }
        });
    });
</script>
<!-- Add this in your Blade template's head section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
@endsection