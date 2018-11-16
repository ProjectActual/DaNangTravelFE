@extends('admin.layouts.master')
@section('master.title', 'Cộng Tác Viên')
@section('master.body', 'posts')
@section('master.content')

@include('admin.cong_tac_vien.update')
@include('admin.cong_tac_vien.information')

<ol class="breadcrumb text-right">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Cộng Tác Viên</li>
</ol>
<div class="container-posts">
  <div class="row ">
    <h2 class="heading-2 col-sm-12">
      Quản Lý Cộng Tác Viên
    </h2>
    <div class="col-sm-9 posts-header">
      <div class="input-group">
        <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm"/>
        <span class="input-group-addon">
          <a href="javascript:" id="btnSearch"><i class="fa fa-search"></i></a>
        </span>
      </div>
    </div>
    <div class="col-sm-3">
      <select id="status" class="form-control">
          <option value=''>Lọc theo trạng thái ...</option>
          <option value="AUTHENTICATION">chưa xác thực</option>
          <option value="APPROVE">Đợi phê duyệt</option>
          <option value="ACTIVE">Đang hoạt động</option>
          <option value="LOCKED">Đã vô hiệu hóa</option>
      </select>
    </div>
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">#</th>
              <th class="text-center text-nowrap">Họ và tên</th>
              <th class="text-center text-nowrap">Trạng thái</th>
              <th class="text-center text-nowrap">Ngày đăng kí</th>
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
</div>

@endsection
