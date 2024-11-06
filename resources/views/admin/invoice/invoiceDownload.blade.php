<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- Required meta tags-->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Omee admin is super flexible, powerful, clean &amp; modern responsive tailwind admin template with unlimited possibilities.">
      <meta name="keywords" content="admin template, Omee admin template, dashboard template, tailwind admin template, responsive admin template, web app">
      <meta name="author" content="codnictheme">
      <title>Invoice</title>
      <link href="{{ public_path('css/admin/vendor/themify-icons.css')}}" rel="stylesheet">
      <link href="{{ public_path('css/admin/vendor/icoicon/icoicon.css')}}" rel="stylesheet">
      <!-- morris chart-->
      <link href="{{ public_path('css/admin/vendor/chart/morris.css')}}" rel="stylesheet">
      <!-- Scrollbar-->
      <link href="{{ public_path('css/admin/vendor/simplebar.css')}}" rel="stylesheet">
      <!-- Custom css-->
      <link href="{{ public_path('css/admin/style.css')}}" id="customstyle" rel="stylesheet">
      <!-- Custom css-->
      <link href="{{ public_path('css/admin/style.css')}}" id="customstyle" rel="stylesheet">
      <!-- datatables
      <link href="{{public_path('css/admin/vendor/datatable/jquery.dataTables.css')}}" rel="stylesheet">
      <link href="{{public_path('css/admin/vendor/datatable/buttons.dataTables.css')}}" rel="stylesheet">
      <link href="{{public_path('css/admin/vendor/datatable/custom-datatable.css')}}" rel="stylesheet"> -->
      
    </head>
  <body class="">
     
     
      <!-- theme body start-->
      <div class="theme-body">
        <div class="grid grid-cols-12">
          <div class="col-span-12">
            <div class="card">
              <div class="card-body cdx-invoice">
                <div id="cdx-invoice">
                  <div class="head-invoice">                  
                    <div class="codex-brand" ><a class="codexbrand-logo" href="Javascript:void(0);"><img class="img-fluid" src="{{ public_path('images/logo/logo.png')}}"  alt="invoice-logo"></a></div>
                    
                  </div>
                  <div class="invoice-user">
                    <div class="left-user">
                      <h5>inovice to:</h5>
                      <ul class="detail-list">
                        <li>
                          <div class="icon-wrap"></div>{{ $payment->order->user_name }}
                        </li>
                        <!-- <li>
                          <div class="icon-wrap"><i class="fa fa-phone"></i></div>{{ $payment->order->user_email }}                   
                        </li> -->
                        <li>
                          <div class="icon-wrap"></div>{{ $payment->order->address }}
                        </li>
                      </ul>
                    </div>
                    <div class="right-user">
                      <ul class="detail-list">
                        <li>invoice date: <span> {{ $payment->created_at }}</span></li>
                        <li>invoice no: <span>{{ $payment->id }}</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="body-invoice">
                    <div class="overflow-x-auto">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Amout </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($payment->order->orderProducts as $index=> $orderProduct)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $orderProduct->product_name }}</td>
                                <td>{{ $orderProduct->product_quantity }}</td>
                                <td>{{ $orderProduct->product_unit_price }}</td>
                            </tr>
                        @endforeach
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="footer-invoice">                
                    <table class="table">
                      <tr>
                        <td>sub total</td>
                        <td>${{ $payment->amount-$payment->tax }}</td>
                      </tr>
                      <tr>
                        <td>tax</td>
                        <td>${{ $payment->tax }}</td>
                      </tr>
                      <tr>
                        <td>total</td>
                        <td>${{$payment->amount}}                 </td>
                      </tr>
                    </table>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- theme body end-->

    </body>
    </html>