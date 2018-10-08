<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Errors - DaNangTravel</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('bundled/app.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini body-errors">
    <div class="error">
        Tài Khoản cần được xác thực qua email
    </div>
    <script src="{{ mix('bundled/app.js') }}"></script>
</body>
</html>
