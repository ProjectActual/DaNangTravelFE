@extends('admin.layouts.master')
@section('master.title', 'Feedback')
@section('master.body', 'posts feedbacks')
@section('master.content')

@include('admin.feedbacks.show')

<ol class="breadcrumb text-right">
  <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Feedbacks</li>
</ol>
<div class="container-posts">
  <div class="row ">
    <h2 class="heading-2 col-sm-8">
      Quản Lý Feedbacks
    </h2>
    <div class="col-sm-12 posts-header">
      <div class="input-group">
        <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm"/>
        <span class="input-group-addon">
          <a href="javascript:" id="btnSearch"><i class="fa fa-search"></i></a>
        </span>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">#</th>
              <th class="text-center text-nowrap">Người gửi</th>
              <th class="text-center text-nowrap">Email người gửi</th>
              <th class="text-center text-nowrap">Tiêu đề</th>
              <th class="text-center text-nowrap">Ngày gửi</th>
              <th class="text-center text-nowrap">Hoạt động</th>
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
  @include('admin.feedbacks.send')
</div>

@endsection
