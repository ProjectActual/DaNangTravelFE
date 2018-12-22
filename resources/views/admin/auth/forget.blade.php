<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Quên mật khẩu - DaNangTravel</title>
  <link rel="stylesheet" type="text/css" href="{{ mix('bundled/app.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini login">
  <div class="container">
    <div class="box-login">
      <div class="main-div">
        <div class="panel">
          <h3 class="heading-3">Quên mật khẩu</h3>
          <p class="sub-heading">Nhập email của bạn để lấy lại mật khẩu</p>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" id="email" placeholder="Email Address">
        </div>

        <button type="submit" class="btn btn-primary d-inline-block" id="btnForget">Gửi</button>
      </div>
    </div>
  </div>
  <script src="{{ mix('bundled/app.js') }}"></script>
</body>
</html>
