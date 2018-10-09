<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Register - DaNangTravel</title>
  <link rel="stylesheet" type="text/css" href="{{ mix('bundled/app.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini login">
  <div class="container">
    <div class="box-login">
      <div class="main-div">
        <div class="panel">
          <h3 class="heading-3">Đăng kí</h3>
          <p class="sub-heading">Nhập thông tin đăng ký vào bên dưới</p>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="first_name" placeholder="Tên">
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="last_name" placeholder="Họ">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" id="email" placeholder="Email">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="password" placeholder="Mật khẩu">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="password_confirmation" placeholder="Xác nhận mật khẩu">
        </div>

        <button type="submit" class="btn btn-primary d-inline-block" id="btnRegister">Đăng kí</button>
        <button type="submit" class="btn btn-default d-inline-block" id="btnBack">Trở Lại</button>
      </div>
    </div>
  </div>
  <script src="{{ mix('bundled/app.js') }}"></script>
</body>
</html>
