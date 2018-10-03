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
          <h3 class="heading-3">Thay đổi mật khẩu</h3>
        </div>
        <div class="form-group">
          <input type="hidden" disabled class="form-control" id="forget_email" value="{{ $data['email'] }}">
        </div>
        <div class="form-group">
          <input type="hidden" disabled class="form-control" id="forget_token" value="{{ $data['token'] }}">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="forget_password" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="forget_password_confirmation" placeholder="Nhập lại mật khẩu mới">
        </div>
        <button type="submit" class="btn btn-primary d-inline-block" id="btnForgetChange">Submit</button>
        <button type="submit" class="btn btn-primary d-inline-block" id="btnForgetCancel">Cancel</button>
      </div>
    </div>
  </div>
  <script src="{{ mix('bundled/app.js') }}"></script>
</body>
</html>
