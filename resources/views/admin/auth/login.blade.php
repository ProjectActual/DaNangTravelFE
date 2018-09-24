<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login - DaNangTravel</title>
  <link rel="stylesheet" type="text/css" href="{{ mix('bundled/app.css') }}">
  <link rel="stylesheet" type="text/css" href="/template/toastr/toastr.css">
  <link rel="stylesheet" href="/template/sweetalert2/sweetalert2.css">
</head>
<body class="hold-transition skin-blue sidebar-mini login">
  <div class="container">
    <div class="box-login">
      <div class="main-div">
        <div class="panel">
          <h3 class="heading-3">Admin Login</h3>
          <p class="sub-heading">Please enter your email and password</p>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" id="email" placeholder="Email Address">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>

        <div class="text-right">
          <a href="javascript:" id="logout">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-primary d-inline-block" id="btnLogin">Login</button>
      </div>
    </div>
  </div>
  <script src="{{ mix('bundled/app.js') }}"></script>
  <script src="/template/toastr/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
  <script src="/template/sweetalert2/sweetalert2.all.js"></script>
</body>
</html>
