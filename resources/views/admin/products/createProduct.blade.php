@extends('admin.layout.app')
@section('title', 'Create Product')

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
            <h1>Create Product</h1>
          </div>
          <div class="right-breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
              <li class="breadcrumb-item active"><a href="javascript:void(0);">Create Product</a></li>
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
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
                  <div class="form-group">
            <label for="name">Product description:</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
            @error('description')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price') }}" required>
            @error('price')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="1" >Active</option>
                <option value="0" >Inactive</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                    <label for="thumbnail_image">Thumbnail Image</label>
                    <input type="file" class="form-control" name="thumbnail_image" required>
        </div>
        <div class="form-group">
            <label for="name">Perday Earning</label>
            <input type="text" name="perday_earning" class="form-control" value="{{ old('perday_earning') }}" required>
            @error('perday_earning')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Total Earning</label>
            <input type="text" name="total_earning" class="form-control" value="{{ old('total_earning') }}" required>
            @error('total_earning')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Expires in days </label>
            <input type="number" name="expire_days" class="form-control" value="{{ old('expire_days') }}" required>
            @error('expire_date')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div id="variants">
            <div class="variant">
                <h4>Variant 1</h4>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" name="variants[0][size]" value="{{ old('variants.0.size') }}" required>
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="color" class="form-control" name="variants[0][color]" value="{{ old('variants.0.color') }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" name="variants[0][stock]" value="{{ old('variants.0.stock') }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="variants[0][price]" step="0.01" value="{{ old('variants.0.price') }}" required>
                </div>

                <div class="form-group">
                    <label for="thumbnail_image">Thumbnail Image</label>
                    <input type="file" class="form-control" name="variants[0][thumbnail_image]">
                </div>

                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control" name="variants[0][images][]" multiple>
                </div>

                <button type="button" class="btn btn-danger  btn-sm remove-variant" style="display: none;">Remove Variant</button>
            </div>
        </div>
                 <button type="button" class="btn mt-5 btn-secondary" id="add-variant">Add Variant</button> -->
                  <button class="btn btn-primary mt-5" type="submit">Submit</button>
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
  
  let table = null;
    $(document).ready(function() {


//Ajax Datatable JS
table = $('#datatbl-ajax').DataTable( {
    "scrollX": true,
       ajax : {
        url :'{{ route("admin.products") }}',
        data : function(data){
            data.from_date = $('#from').val();
            data.to_date = $('#to').val();
        }
    },
    lengthMenu: [
        [10, 25, 50, 100, -1],
        ['10', '25', '50', '100', 'all']
        ],
        // info: true,
          lengthChange: true, // Enable the ability to change the number of records per page
          pageLength: 10,
    language: {
            paginate: {
              next: 'Next',
              previous: 'Previous',
            },
            lengthMenu: "Show result: _MENU_ ", // Customize the "Show entries" text
          },
      
    // dom: 'rt<"crancy-table-bottom"flp><"clear">', 
    columns: [{
            data: 'DT_RowIndex',
            name: 'id',
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'thumbnail_image',
            name: 'thumbnail_image'
        },
        {
            data: 'description',
            name: 'description'
        },
        {
            data: 'price',
            name: 'price'
        },
        {
            data: 'stock',
            name: 'stock'
        },
        {
            data: 'category',
            name: 'category'
        },
        {
            data: 'status',
            name: 'status'
        },
        {
            data: 'action',
            name: 'action'
        },
        
       
    ],
    scrollCollapse: true,
   
});
$(document).on('change', '.toggle-status', function() {
    var productId = $(this).data('id');
    var status = $(this).is(':checked') ? '1' : '0';

    $.ajax({
        url: '{{ route('admin.productUpdateStatus') }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: productId,
            status: status
        },
        success: function(response) {
            alert('Status updated successfully');
        },
        error: function(response) {
            alert('Failed to update status');
        }
    });
});
$(document).on('click', '.delete-product', function() {
    let productId = $(this).data('id');
    let deleteUrl = '{{ route("admin.product.destroy", ":id") }}';
        deleteUrl = deleteUrl.replace(':id', productId);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: deleteUrl,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'Your product has been deleted.',
                        'success'
                    );
                    // Reload the DataTable
                    $('#datatbl-ajax').DataTable().ajax.reload();
                },
                error: function(response) {
                    Swal.fire(
                        'Failed!',
                        'There was a problem deleting the product.',
                        'error'
                    );
                }
            });
        }
    });
});



});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let variantIndex = 1;

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
                e.target.parentElement.remove();
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