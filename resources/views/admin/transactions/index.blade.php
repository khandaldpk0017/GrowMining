@extends('admin.layout.app')
@section('title', 'Transactions')


@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Transactions</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Transactions             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Transactions</a></li>
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
                  <table class="display dataTable cell-border" id="datatbl-ajax" style="width:100%">
                    <thead>
                      <tr>
                        <th>S no.</th>
                        <th>Name </th>
                        <th>Amount </th>
                        <th>Transaction type </th>
                        <th>type </th>
                        <th>Status</th>
                       
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
        url :'{{ route('admin.transactions') }}',
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
            data: 'amount',
            name: 'amount'
        },
        {
            data: 'transaction_type',
            name: 'transaction_type'
        },
        {
            data: 'type',
            name: 'type'
        },
        {
            data: 'status',
            name: 'status'
        },
        
       
    ],
    scrollCollapse: true,
   
});

$('#datatbl-ajax').on('change', '.order-status-select', function() {
        const orderId = $(this).data('id');
        const newStatus = $(this).val();

        $.ajax({
            url: '{{route("admin.withdraw.updateStatus") }}', // Replace with your route to update order status
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: orderId,
                status: newStatus
            },
            success: function(response) {
                alert('Request status updated successfully!');
                $('#datatbl-ajax').DataTable().ajax.reload(null, false);
            },
            error: function(xhr) {
                alert('An error occurred while updating the status.');
            }
        });
    });
});

</script>

@endsection
