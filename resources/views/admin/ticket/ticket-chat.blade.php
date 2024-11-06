@extends('admin.layout.app')
@section('title', 'Ticket Chat')

@section('content')
<div class="themebody-wrap  ">
      <!-- breadcrumb start-->
        <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Ticket Chat</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">application</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Ticket Chat</a></li>
              </ul>
            </div>
          </div>
        </div>
      <!-- breadcrumb end-->
      <!-- theme body start-->
      <div class="theme-body codex-chat ">
        <div class="custom-container">       
        <div class="container-fluid">
                  <div class="row">
                      <div class="col-12">
                          <div class="col-span-12 2xl:col-span-9 md:col-span-7">
                              <div class="chat-body">
                                  
                              <div class="col-xxl-12 col-xl-8 col-md-7 box-col-7">
                
                  <div class="right-sidebar-Chats"> 
                    <div class="msger">
                    <div class="msger-chat">
                      @foreach($ticketChat as $chat)

                      @if($chat->sender=="user")
                        <div class="msg left-msg">
                          <div class="msg-img"></div>
                          <div class="msg-bubble bg-white">
                            <div class="msg-info">
                              <div class="msg-info-name">{{$cuser->name}}</div>
                              <div class="msg-info-time">{{$chat->created_at}}</div>
                            </div>
                            <div class="msg-text">{{$chat->message}}</div>
                          </div>
                        </div>
                        @if($chat->image!=null)
                        <div class="msg left-msg">
                          <div class="msg-img"></div>
                          <div class="msg-bubble">
                            <div class="msg-info">
                              <div class="msg-info-name">{{$cuser->name}}</div>
                              <div class="msg-info-time">{{$chat->created_at}}</div>
                            </div>
                            <div class="msg-text"><img src="{{ asset('storage/images/'.$chat->image) }}" alt="Image Description" style="width:100px;"></div>
                          </div>
                        </div>
                        @endif
                        @else
                        @if($chat->message!=null)
                        <div class="msg right-msg">
                          <div class="msg-img"></div>
                          <div class="msg-bubble">
                            <div class="msg-info">
                              <div class="msg-info-name">{{$chat->sender}}</div>
                              <div class="msg-info-time">{{$chat->created_at}}</div>
                            </div>
                            <div class="msg-text">{{$chat->message}}.</div>
                          </div>
                        </div>
                        @endif
                        @if($chat->image!=null)
                        <div class="msg right-msg">
                          <div class="msg-img"></div>
                          <div class="msg-bubble">
                            <div class="msg-info">
                              <div class="msg-info-name">{{$chat->sender}}</div>
                              <div class="msg-info-time">{{$chat->created_at}}</div>
                            </div>
                            <div class="msg-text"><img src="{{ asset('storage/images/'.$chat->image) }}" alt="Image Description" style="width:100px;"></div>
                          </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                     
                      </div>
                      <form class="msger-inputarea"  method="post" action="{{ route('admin.replyChat') }}" onsubmit="return validateForm()"  enctype="multipart/form-data">
                      @csrf
                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}"> 
                                        <div class="w-full h-screen bg-white">
                                            <div class="container mx-auto h-full flex flex-col justify-center items-center">
                                                <div id="images-container"></div>
                                                
                                                <input type="file" name="image" id="multi-upload-input" style="display: none;" required onchange="checkFields()" />
                                            </div>
                                        </div>
                                        <input class="msger-input  two uk-textarea" required oninput="checkFields()" name="message" value="" type="text" placeholder="Type Message here..">
                         
                                        <label for="multi-upload-input" class="msger-send-btn" ><i class="fa fa-photo"></i></label>
                                        <button class="msger-send-btn" type="submit"><i class="fa fa-location-arrow"></i></button>
                                      </form>
                                      <!-- <input type="file" name="image" id="multi-upload-input" style="display:none" />
                                      
                                      <label class="second-btn uk-button" for="multi-upload-input"><i class="fa fa-folder-o"></i></label>
                                       -->
                    </div>
                  </div>
                </div>
              </div>
                                  <!-- <form method="post" action="{{ route('admin.replyChat') }}"  enctype="multipart/form-data">  
                                      @csrf
                                      <input type="hidden" name="ticket_id" value="{{$ticket->id}}"> 
                                     <input type="hidden" name="user_id" value="{{$ticket->user_id}}"> 

                                      <div class="w-full h-screen bg-white">
                                          <div class="container mx-auto h-full flex flex-col justify-center items-center">
                                              <div id="images-container"></div>
                                              
                                              <input type="file" name="image" id="multi-upload-input" class="hidden" style="visibility:hidden"/>
                                          </div>
                                      </div>
                                      <div class="userchat-typebox flex">
                                          <input class="form-control" required type="text" placeholder="Write your message" name="message" value=""
                                              autocomplete="off" />
                                          <button type="button" class="btn btn-icon-border mr-5" id="multi-upload-button">
                                              <i data-feather="camera"></i>
                                          </button>
                                          <button type="submit" class="btn btn-icon-border">
                                              <i data-feather="send"></i>
                                          </button>
                                      </div>
                                  </form> -->
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
function checkFields() {
    var messageInput = document.querySelector('input[name="message"]');
    var imageInput = document.querySelector('input[name="image"]');

    if (messageInput.value.trim() !== '' || imageInput.files.length > 0) {
        messageInput.required = false;
        imageInput.required = false;
    } else {
        messageInput.required = true;
        imageInput.required = true;
    }
}

function validateForm() {
    checkFields(); // Ensure fields are checked before submission
    return true; // Allow form submission if validation passes
}
</script>
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
