<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>DN</b>T</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>DaNang</b>Travel</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="{{ $data['data']['profile']['data']['avatar'] }}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ $data['data']['profile']['data']['full_name'] }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ $data['data']['profile']['data']['avatar'] }}" class="img-circle" alt="User Image">

              <p>
                {{ $data['data']['profile']['data']['full_name'] }} - {{ $data['data']['profile']['data']['roles'][0]['display_name'] }}
              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('admin.profile.index') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="javascript:" class="btn btn-default btn-flat" id="btnLogout">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
