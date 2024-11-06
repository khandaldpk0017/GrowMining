@extends('admin.layout.app')
@section('title', 'Order Products')

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Orders Products</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">application</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Order Products</a></li>
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
            <div class="status-filter my-3 mb-5 pb-5">
<label for="orderStatus">Filter by Status:</label>
<select id="orderStatus" class="border p-2">
  <option value="">All</option>
  <option value="Received">Received</option>
    <option value="Dispatched">Dispatched</option>
    <option value="Shipped">Shipped</option>
    <option value="Out for Delivery">Out for Delivery</option>
    <option value="Delivered">Delivered</option>
 
</select>
</div>
              <div class="card">  
                <div class="card-body">
                  <table class="display dataTable cell-border" id="datatbl-ajax" style="width:100%">
                    <thead>
                      <tr>
                                <th>Serial No</th>
                                <th>Order id</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                          <th>Tax</th>
                          <th>Total Price</th>
                          <th>Order Status</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    
                  </table>
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
  
  let table = null;
    $(document).ready(function() {

//Ajax Datatable JS
table = $('#datatbl-ajax').DataTable( {
    "scrollX": true,
       ajax : {
        url :'{{route("admin.fetch.orders.products", $orderId) }}',
        data : function(data){
            data.from_date = $('#from').val();
            data.to_date = $('#to').val();
            data.status = $('#orderStatus').val();
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
            data: 'order_id',
            name: 'order_id'
        },
        {
            data: 'product_name',
            name: 'product_name'
        },
        {
            data: 'product_quantity',
            name: 'product_quantity'
        },
        {
            data: 'product_unit_price',
            name: 'product_unit_price'
        },
        {
            data: 'tax',
            name: 'tax'
        },
        {
            data: 'total_price',
            name: 'total_price'
        },
        {
            data: 'order_status',
            name: 'order_status'
        },
        {
            data: 'action',
            name: 'action'
        }
        
       
    ],
    scrollCollapse: true,
        
   
});

$('#orderStatus').on('change', function() {
        table.ajax.reload();
    });

$('#datatbl-ajax').on('change', '.order-status-select', function() {
        const orderId = $(this).data('order-id');
        const newStatus = $(this).val();

        $.ajax({
            url: '{{route("admin.orders.updateStatus") }}', // Replace with your route to update order status
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                order_id: orderId,
                status: newStatus
            },
            success: function(response) {
                alert('Order status updated successfully!');
                $('#datatbl-ajax').DataTable().ajax.reload(null, false);
            },
            error: function(xhr) {
                alert('An error occurred while updating the status.');
            }
        });
    });
});

</script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
