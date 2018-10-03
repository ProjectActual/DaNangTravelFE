<header role="banner" class="header-custom">
  <div class="container logo-wrap">
    <div class="row pt-5">
      <div class="col-12 text-center">
        <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
        <h1 class="site-logo">

          <a href="index.html">DaNangTravel <i class="fa fa-globe"></i></a>
        </h1>
      </div>
    </div>
  </div>
  <div class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('viewer.home') }}">Trang Chủ</a>
          </li>
          @foreach($data['composerCategories']['data'] as $item)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('viewer.posts.index', $item['uri_category']) }}">{{ $item['name_category'] }}</a>
          </li>
          @endforeach
          <li class="nav-item">
            <a class="nav-link" href="{{ route('viewer.feedbacks') }}">Feedbacks</a>
          </li>
        </ul>

      </div>
    </div>
  </div>
</header>
