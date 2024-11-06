@extends('admin.layout.app')
@section('title', 'Taxes')


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
                <li class="breadcrumb-item"><a href="javascript:void(0);">Taxes             </a></li>
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
                        <th>S no.</th>
                        <th>Name </th>
                        <th>Rate (%)</th>
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
<script>
  
  let table = null;
    $(document).ready(function() {


//Ajax Datatable JS
table = $('#datatbl-ajax').DataTable( {
    "scrollX": true,
       ajax : {
        url :'{{ route('tax') }}',
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
            data: 'name',
            name: 'name'
        },
        {
            data: 'rate',
            name: 'rate'
        },
        {
            data: 'action',
            name: 'action'
        },
        
       
    ],
    scrollCollapse: true,
   
});

$('#datatbl-ajax').on('click', '.delete-tax', function() {
        var taxId = $(this).data('id');
        if (confirm('Are you sure you want to delete this tax?')) {
            $.ajax({
                url: '{{ route('delete-tax', '') }}/' + taxId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    table.ajax.reload();
                    alert(response.success);
                },
                error: function(response) {
                    alert('Failed to delete tax.');
                }
            });
        }
    });
           
});

</script>

@endsection
