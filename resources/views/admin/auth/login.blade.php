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
      <title>Omee - Admin Dashboard Html 5 Tailwind Responsive Template</title>
      <!-- Favicon icon-->
      <link rel="icon" href="{{ asset('images/logo/favicon.png')}}" type="image/x-icon">
      <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png')}}" type="image/x-icon">
      <!-- Fonts css-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
      <!-- icon fonts-->
      <link href="{{ asset('css/admin/vendor/font-awesome.css')}}" rel="stylesheet">
      <link href="{{ asset('css/admin/vendor/themify-icons.css')}}" rel="stylesheet">
      <link href="{{ asset('css/admin/vendor/icoicon/icoicon.css')}}" rel="stylesheet">
      <!-- morris chart-->
      <link href="{{ asset('css/admin/vendor/chart/morris.css')}}" rel="stylesheet">
      <!-- Scrollbar-->
      <link href="{{ asset('css/admin/vendor/simplebar.css')}}" rel="stylesheet">
      <!-- Custom css-->
      <link href="{{ asset('css/admin/style.css')}}" id="customstyle" rel="stylesheet">
    </head>
  <body class="bg-auth">
    <!-- Login Start-->
    <div class="auth-main">
      <div class="codex-authbox">
        <div class="auth-header">
          <div class="codex-brand"><a href="index.html"><img class="img-fluid light-logo" src="{{ asset('images/logo/logo.png')}}" alt=""><img class="img-fluid dark-logo" src="{{ asset('images/logo/dark-logo.png')}}" alt=""></a></div>
          <h3>welcome to omee</h3>
          <!-- <h6>don't have an account? <a class="text-primary" href="register.html">creat an account</a></h6> -->
        </div>
        <form action="{{ route('admin.ManageSignIn') }}"  method="post" >
        @csrf
          <div class="form-group">
            <label class="form-label">Email</label>
            <input class="form-control" type="text"name="email" value="{{ old('email') }}" required placeholder="Enter Your Email">
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="Password">Password</label>
            <div class="input-group group-input">
              <input class="form-control showhide-password" type="password" name="password" placeholder="Enter Your Password" required=""><span class="input-group-text toggle-show fa fa-eye"></span>
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
          </div>
          <div class="form-group mb-0">
            <div class="auth-remember">                    
              <div class="form-check custom-chek">
                <!-- <input class="form-check-input" id="agree" name="remember" type="checkbox"  required=""> -->
                <!-- <label class="form-check-label" for="agree">Remember me</label> -->
              </div><a class="text-primary f-pwd" href="forgot-password.html">Forgot your password?</a>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> Login</button>
          </div>
        </form>
        <div class="auth-footer">
          <h5 class="auth-with">Or login in with     </h5>
          <ul class="login-list">
            <li><a class="bg-fb" href="javascript:void(0);"> <img class="img-fluid" src="{{ asset('images/auth/1.png')}}" alt="facebook">facebook</a></li>
            <li><a class="bg-google" href="javascript:void(0);"> <img class="img-fluid" src="{{ asset('images/auth/2.png')}}" alt="google">google</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Login End-->
      <!-- main jquery-->
      <script src="{{ asset('js/jquery-3.6.0.js')}}"></script>
      <!-- Feather iocns js-->
      <script src="{{ asset('js/icons/feather-icon/feather.js')}}"></script>
      <!-- customizer-->
      <script src="{{ asset('js/customizer.js')}}"></script>
      <!-- Scrollbar-->
      <script src="{{ asset('js/vendors/simplebar.js')}}"></script>
      <!-- Custom script-->
      <script src="{{ asset('js/custom-script.js')}}"></script>
  </body>
</html>