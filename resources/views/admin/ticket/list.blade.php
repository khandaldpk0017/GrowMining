@extends('admin.layout.app')
@section('title', 'Tickets')

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Ticket list</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">application</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Tickets</a></li>
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
                        <th>Raised By</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Raised on</th>
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
        url :'{{ route("admin.allTickets") }}',
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
            data: 'raised_by',
            name: 'raised_by'
        },
        {
            data: 'subject',
            name: 'subject'
        },
        {
            data: 'description',
            name: 'description'
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
$(document).on('click', '.modal-action', function() {
                var userId = $(this).data('id');
                $('#statusModal-' + userId).modal('show');
            });
// var dtRequstTbl = $('#datatbl-ajax');
// dtRequstTbl.on('click', '.modal-action', function (e) {
//     var modelId = $(this).data('modal');
//     // console.log('model',modelId)
//     $("#" + modelId).show();
//     $("body").addClass('overflow-hidden');
// });

// dtRequstTbl.on('click', '.modal-close', function (e) {
//     var modelId = $(this).data('modal');
//     // console.log('model',modelId)
//     $("#" + modelId).hide();
//     $("body").addClass('overflow-hidden');
// });

});

</script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
