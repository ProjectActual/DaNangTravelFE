@extends('admin.layouts.master')
@section('master.title', 'Danh mục')
@section('master.body', 'categories')
@section('master.content')

@include('admin.categories.update')

<ol class="breadcrumb text-right">
  <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Danh Mục</li>
</ol>
<div class="container-profile">
  <div class="row">
    <div class="section profile-left col-sm-7">
      <h2 class="heading-2 col-sm-8">
        Quản Lý Danh Mục
      </h2>
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Tiêu đề</th>
                <th class="text-center">Link</th>
                <th class="text-center">Mô tả</th>
                <th class="text-center text-nowrap">Tổng bài viết</th>
                <th class="text-center text-nowrap">Hoạt động</th>
              </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="profile-right col-sm-5">
      <div class="section row">
        <h2 class="heading-2 col-sm-12">
          Tạo Danh Mục
        </h2>
        <div class="form-group col-sm-12">
          <label>Tên danh mục</label>
          <input type="text" id="name_category" class="form-control" placeholder="tên danh mục ...">
        </div>
        <div class="form-group col-sm-12">
          <label>Link bài viết</label>
          <div class="input-group">
            <input id="link" class="form-control" placeholder="Dữ liệu được sinh từ tiêu đề" disabled>
            <span class="input-group-btn">
              <button id="edit_link" type="button" class="btn btn-success">Chỉnh sửa link bài viết</button>
              <button id="cancel_link" type="button" class="btn btn-default" style="display: none;">Huỷ bỏ</button>
            </span>
          </div>
        </div>
        <div class="form-group col-sm-12">
          <label>Mô tả ngắn</label>
          <textarea id="description" class="form-control" cols="50" placeholder="mô tả ..." rows="5"></textarea>
        </div>

        <div class="col-sm-12 text-right">
          <div class="col-sm-12 form-button">
            <button type="submit" class="btn btn-info right" id="btnAdd"><i class="fa fa-check"></i> Thêm danh mục</button>
            <button type="button" class="btn btn-default" id="btnCancel"> Hủy bỏ</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
