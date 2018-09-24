<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Errors - DaNangTravel</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('bundled/app.css') }}">
    <link rel="stylesheet" type="text/css" href="/template/toastr/toastr.css">
    <link rel="stylesheet" href="/template/sweetalert2/sweetalert2.css">
</head>
<body class="hold-transition skin-blue sidebar-mini body-errors">
    <div class="error">
        Error 404 Not found
    </div>
    <script src="{{ mix('bundled/app.js') }}"></script>
    <script src="/template/toastr/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="/template/sweetalert2/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-template-engine@1.0.1"></script>
</body>
</html>
