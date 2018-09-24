<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('master.title') - DaNangTravel</title>
  <link rel="stylesheet" type="text/css" href="{{ mix('bundled/app.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini @yield('master.body')">
  <div class="wrapper">
    @include('admin.layouts.partials.header')
    @include('admin.layouts.partials.sidebar')
    <main class="content-wrapper">
      <div class="content">
        @yield('master.content')
      </div>
    </main>
    @include('admin.layouts.partials.footer')
  </div>
  <script src="{{ mix('bundled/app.js') }}"></script>
  {{-- <script src="/template/cktemplate/ckeditor/ckeditor.js"></script> --}}
  <script src="/template/cktemplate/ckfinder/ckfinder.js"></script>
</body>
</html>
