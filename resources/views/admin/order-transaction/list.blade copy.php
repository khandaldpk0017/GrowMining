@extends('admin.layout.app')
@section('title', 'Order Transactions')

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Orders</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">application</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Orders</a></li>
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
  <option value="pending">Pending</option>
  <option value="completed">Completed</option>
  <option value="cancel">Cancel</option>
 
</select>
</div>
              <div class="card">  
                <div class="card-body">
                  <table class="display dataTable cell-border" id="datatbl-ajax" style="width:100%">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <!-- <th>Product</th> -->
                        <th>Total Amount</th>
                        <th>Delivery Fee</th>
                        <th>Status</th>
                        <th>Created At</th>
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
    <div  class="modal fade" id="orderProductsModal" tabindex="-1" role="dialog" aria-labelledby="orderProductsModalLabel" aria-hidden="true">
          <div style="position: absolute; left:50%;top:50%; transform:translate(-50%,-50%);" class="modal-dialog  modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="orderProductsModalLabel">Order Products</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <table id="order-products-table" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>S.no</th>
                                  <th>Product Name</th>
                                  <th>Quantity</th>
                                  <th>Unit Price</th>
                                  <th>Tax</th>
                              </tr>
                          </thead>
                          <tbody></tbody>
                      </table>
                  </div>
              </div>
          </div>
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
        url :'{{ route("admin.AllOrders") }}',
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
            data: 'user_name',
            name: 'user_name'
        },
        {
            data: 'total_amount',
            name: 'total_amount'
        },
        {
            data: 'delivery_fee',
            name: 'delivery_fee'
        },
        {
            data: 'status',
            name: 'status'
        },
        {
            data: 'created_at',
            name: 'created_at'
        },
        {
            data: 'action',
            name: 'action'
        },
        
       
    ],
    scrollCollapse: true,
   
});
$('#orderStatus').on('change', function() {
        table.ajax.reload();
    });
$('#datatbl-ajax').on('change', '.order-status-select', function() {
        const orderId = $(this).data('id');
        const newStatus = $(this).val();

        $.ajax({
            url: '{{route("admin.updateOrderStatus") }}', // Replace with your route to update order status
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: orderId,
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
