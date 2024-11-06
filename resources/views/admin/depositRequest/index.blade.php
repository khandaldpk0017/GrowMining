@extends('admin.layout.app')
@section('title', 'Deposit Request')

@section('custom-css')
<style>
.modal-dialog {
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-body {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

#fullScreenImage {
  max-width: 100%; /* Image should not exceed the width of the modal */
  max-height: 80vh; /* Image should not exceed 80% of the viewport height */
}

.modal-header .btn-close {
  margin-left: auto; /* Move the close button to the right */
}
</style>
@endsection

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Deposit Request</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Deposit Request             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Deposit Request</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">List</a></li>
              </ul>
            </div>
          </div>
        </div>
      <!-- breadcrumb end-->
      <!-- theme body start-->
      <div class="theme-body codex-chat">
      <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center"> <!-- Center text including the image -->
      <div class="modal-header">
        <!-- Close Button -->
        <button type="button" class="btn-close " style="font-size: 1.5em;" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body d-flex justify-content-center align-items-center">
        <!-- Full Screen Image -->
        <img id="fullScreenImage" src="" alt="Screenshot" class="img-fluid" style="max-height: 80vh; max-width: 100%;">
      </div>
    </div>
  </div>
</div>
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
                        <th>UTR Number </th>
                        <th>QR CODE ID </th>
                        <th>Screen shot </th>
                        <th>Status</th>
                        <th>Actions</th>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function showImageModal(imageUrl) {
    // Set the image source in the modal
    document.getElementById('fullScreenImage').src = imageUrl;
    // Show the modal
    $('#imageModal').modal('show');
  }
</script>
<script>
  
  let table = null;
    $(document).ready(function() {


//Ajax Datatable JS
table = $('#datatbl-ajax').DataTable( {
    "scrollX": true,
       ajax : {
        url :'{{ route('admin.depositRequest') }}',
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
            data: 'user_id',
            name: 'user_id'
        },
        {
            data: 'amount',
            name: 'amount'
        },
        {
            data: 'utr_number',
            name: 'utr_number'
        },
        {
            data: 'qr_code_id',
            name: 'qr_code_id'
        },
        {
            data: 'ss',
            name: 'ss'
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

$('#datatbl-ajax').on('change', '.order-status-select', function() {
        const orderId = $(this).data('id');
        const newStatus = $(this).val();

        $.ajax({
            url: '{{route("admin.deposit.updateStatus") }}', // Replace with your route to update order status
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
