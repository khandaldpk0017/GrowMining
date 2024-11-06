@extends('admin.layout.app')
@section('title', 'Users')

@section('content')
<div class="themebody-wrap">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Use Add</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">application</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">User Add</a></li>
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
                <form action="{{ route('admin.createUser') }}" method="POST" role="form" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">                  
                    <input class="form-control" type="text" placeholder="Name" id="name" name="name"  required="required">
                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                  </div>
                  <div class="form-group">                  
                    <input class="form-control" type="email" placeholder="Email" id="email" name="email"  required="required">
                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror 
                  </div>
                  <div class="form-group">                  
                    <input class="form-control" type="password" placeholder="Password" id="password" name="password"  required="required">
                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror 
                  </div>
                  
                  <button class="btn btn-primary" type="submit">Submit</button>
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
        url :'{{ route("admin.users") }}',
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
            data: 'email',
            name: 'email'
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
    // columnDefs: [
    //         {
    //             targets: -1, // Target the last column (edit button)
    //             render: function(data, type, row, meta) {
    //               var editButton = '<button class="btn-edit" data-bs-toggle="modal" data-bs-target="#exampleModalgetbootstrap" data-whatever="@getbootstrap" data-id="' + row.id + '"><i class="icon-pencil-alt text-success"></i></button>';
    //                 var deleteButton = '<button class="btn-delete" data-id="' + row.id + '"><i class="icon-trash text-danger"></i></button>';
    //                 return editButton+' '+deleteButton;
    //             }
    //         },
            
    //     ]
});


});

</script>
@endsection
