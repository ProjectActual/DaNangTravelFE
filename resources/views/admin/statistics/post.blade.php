@extends('admin.layouts.master')
@section('master.title', 'Thống kê bài viết')
@section('master.body', 'posts')
@section('master.content')

<ol class="breadcrumb text-right">
  <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Thống kê bài viết</li>
</ol>
<div class="container-posts">
  <div class="row ">
    <h2 class="heading-2 col-sm-12">
      Bài viết theo tháng của cộng tác viên
    </h2>
    <div class="col-sm-12 posts-header">
      <div class="input-group">
        <input type="text" class="form-control" id="date" placeholder="Ngày tìm kiếm ..."/>
        <span class="input-group-addon">
          <a href="javascript:" id="btnSearch"><i class="fa fa-search"></i></a>
        </span>
      </div>
    </div>
    <div class="col-sm-12 row">
      <p class="col-sm-6">
        Bài viết cao nhất: <span class="max" id="count"></span><span class="user" id="count_user"></span>
      </p>
      <p class="col-sm-6">
        Tương tác cao nhất: <span class="max" id="sum"></span><span class="user" id="sum_user"></span>
      </p>
    </div>
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">#</th>
              <th class="text-center text-nowrap">Họ và tên</th>
              <th class="text-center text-nowrap">Email</th>
              <th class="text-center text-nowrap">Ngày tham gia</th>
              <th class="text-center text-nowrap">Tổng bài viết</th>
              <th class="text-center text-nowrap">Lượt tương tác</th>
            </tr>
          </thead>
          <tbody id="table-body">
          </tbody>
        </table>
      </div>
      <div class="row pagination-js">

      </div>
    </div>
  </div>
  <div>
    <canvas id="chart1" height="150"></canvas>
  </div>
</div>

@endsection
