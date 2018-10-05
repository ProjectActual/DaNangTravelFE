<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ $data['data']['profile']['data']['avatar'] }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ $data['data']['profile']['data']['full_name'] }}</p>
        <!-- Status -->
        <a href="javascript:"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview">
        <a href="javascript:">
          <i class="fa fa-link"></i>
          <span>Quản lý bài viết</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.posts.index') }}" title="">Danh sách</a></li>
          <li><a href="{{ route('admin.posts.create') }}" title="">Tạo bài viết</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="javascript:">
          <i class="fa fa-link"></i>
          <span>Quản lý danh mục</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.categories.index') }}" title="">Danh sách</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="javascript:">
          <i class="fa fa-link"></i>
          <span>Quản lý tag</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.tags.index') }}" title="">Danh sách</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="javascript:">
          <i class="fa fa-link"></i>
          <span>Quản lý feedback</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="" title="">Danh sách</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
