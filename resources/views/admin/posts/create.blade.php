@extends('admin.layouts.master')
@section('master.title', 'Tạo Bài Viết')
@section('master.body', 'posts-create')
@section('master.content')
<div class="container-posts">
  <div class="row">
    <h2 class="heading-2 col-sm-8">
      Tạo bài viết
    </h2>
    <ol class="breadcrumb text-right col-sm-4">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('admin.posts.index') }}"> Bài Viết</a></li>
      <li class="active">Tạo Bài Viết</li>
    </ol>
    <div class="col-sm-7">
      <div class="form-group col-sm-12">
        <label>Tiêu đề bài viết</label>
        <input id="title" class="form-control" placeholder="Nhập nội dung tiêu đề tại đây">
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
        <label>Danh mục</label>
        <select id="danh_muc" class="form-control">
        </select>
      </div>

      <div class="form-group col-sm-12">
        <label>Tag</label>
        <div>
          <input id="tag" class="form-control col-sm-12" placeholder="Nhập nội dung tiêu đề tại đây" data-role="tagsinput">
        </div>
      </div>

    </div>
    <div class="col-sm-5">
      <label class="col-sm-12">Ảnh bài viết</label>
      <div class="col-sm-12" style="padding: 5px 15px;">
        <input type="file" id="avt_post" name="avatar_post" value="{{ old('avatar_post') }}">
      </div>

      <div class="form-group col-sm-12">
        <input id="checkbox" type="checkbox" class="checkboxes" checked>
        <label for="checkbox">Hiện bài viết</label>
      </div>
    </div>

    <div class="col-sm-12">
      <label class="col-sm-12">Nội dung bài viết</label>
      <div class="col-sm-12">
        <textarea id="content" class="form-control" rows="30" placeholder="Nhập nội dung của bài viết"></textarea>
      </div>
    </div>

    <div class="col-sm-12 text-right">
      <div class="col-sm-12 form-button">
        <button type="submit" class="btn btn-info right" id="btnSubmit"><i class="fa fa-check"></i> Thêm bài viết</button>
        <button type="button" class="btn btn-default btnCancel" id="btnCancel">Hủy bỏ</button>
      </div>
    </div>
  </div>
</div>
@endsection
