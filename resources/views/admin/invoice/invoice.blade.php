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
      <title>@yield('title')</title>
      @include("admin.include.css")
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    </head>
  <body class="">
     
     <!-- <div class="themebody-wrap"> -->
      <!-- breadcrumb start-->
        <!-- <div class="codex-breadcrumb">
          <div class="breadcrumb-contain">
            <div class="left-breadcrumb">
              <h1>Invoice</h1>
            </div>
            <div class="right-breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard             </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Ecommerce</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Invoice</a></li>
              </ul>
            </div>
          </div>
        </div> -->
      <!-- breadcrumb end-->
      <!-- theme body start-->
      <div class="theme-body">
        <div class="grid grid-cols-12">
          <div class="col-span-12">
            <div class="card">
              <div class="card-body cdx-invoice">
                <div id="cdx-invoice">
                  <div class="head-invoice">                  
                    <div class="codex-brand"><a class="codexbrand-logo" href="Javascript:void(0);"><img class="img-fluid" src="{{ asset('images/logo/logo.png')}}" alt="invoice-logo"></a></div>
                    <ul class="contact-list">
                      <li>                    
                        <div class="icon-wrap"></div>+12345647859
                      </li>
                      <li>                    
                        <div class="icon-wrap"></div>omee@example.com
                      </li>
                      <li>                    
                        <div class="icon-wrap"></div>omee Store
                      </li>
                    </ul>
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
                <div class="invoice-action"><a href="{{ route('admin.invoice.download', $payment->id) }}"  class="btn btn-success mt-3 mr-2 download-btn">
                        Download Invoice
                    </a>
                <a href="{{ route('admin.allPayments') }}" class="btn btn-primary mt-3 download-btn" >Back to Payments</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- theme body end-->
    <!-- </div> -->
    @include("admin.include.js")

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    </body>
    </html>