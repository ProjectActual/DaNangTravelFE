@extends('admin.layouts.master')
@section('master.title', 'Tag')
@section('master.body', 'tags')
@section('master.content')

@include ('admin/tags/update')

<div class="container-posts">

  <div class="row ">
    <h2 class="heading-2 col-sm-8">
      Quản Lý Tag
    </h2>
    <ol class="breadcrumb text-right col-sm-4">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Tag</li>
    </ol>
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
              <th class="text-center">#</th>
              <th class="text-center">Tên tag</th>
              <th class="text-center">Tổng bài viết trong tag</th>
              <th class="text-center">Ngày tạo, Hoạt động</th>
              <th class="text-center">Hoạt động</th>
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
</div>

@endsection
