<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('master.viewer.title') - DaNangTravel</title>
  <link rel="stylesheet" type="text/css" href="{{ mix('bundled/viewer.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini @yield('master.viewer.body')">
  <div class="wrapper">
    @include('viewer.layouts.partials.header')
    {{-- @yield('master.viewer.slider') --}}

    {{-- @include('viewer.layouts.partials.rightbar') --}}

    @yield('master.viewer.content')

    @include('viewer.layouts.partials.footer')
  </div>
  <script src="{{ mix('bundled/viewer.js') }}"></script>
</body>
</html>
