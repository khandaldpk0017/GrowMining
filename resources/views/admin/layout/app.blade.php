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


  @include('admin.layout.header')

  @include('admin.layout.sidebar')
        <!-- Page Sidebar Ends-->
        @yield('content')

        @include("admin.include.js")

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      toastr.options.timeOut = 3000; // 1.5s

      @if(session()->has('success'))  
          toastr.success('{{ session('success') }}', 'success');
        @endif

        @if(session()->has('error'))  
          toastr.error('{{ session('error') }}', 'error');
        @endif
      
      
    });
  </script>
  </body>
</html>