@extends('admin.layouts.master')
@section('master.title', 'Bài Viết')
@section('master.body', 'profile')
@section('master.content')
<ol class="breadcrumb text-right">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Profile</li>
</ol>

<div class="container-profile">
  <div class="row">
    <div class="section profile-left col-md-5">
      <h2 class="heading-2 col-sm-12">
        Thông Tin Người Dùng
      </h2>
      <div class="box-avatar text-center">
        <img  class="avatar_show">
      </div>
      <ul class="list-group">
        <li href="javascript:" class="list-group-item">
          <h4 class="list-group-item-heading">Họ và tên</h4>
          <p class="list-group-item-text text-right" id="full_name"></p>
        </li>

        <li href="javascript:" class="list-group-item">
          <h4 class="list-group-item-heading">Số điện thoại</h4>
          <p class="list-group-item-text text-right" id="phone_show"></p>
        </li>

        <li href="javascript:" class="list-group-item">
          <h4 class="list-group-item-heading">Giới tính</h4>
          <p class="list-group-item-text text-right" id="gender_show"></p>
        </li>

        <li href="javascript:" class="list-group-item">
          <h4 class="list-group-item-heading">Ngày sinh</h4>
          <p class="list-group-item-text text-right" id="birthday_show"></p>
        </li>

        <li href="javascript:" class="list-group-item">
          <h4 class="list-group-item-heading">Tổng số bài đăng</h4>
          <p class="list-group-item-text text-right" id="posts_count"></p>
        </li>

        <li href="javascript:" class="list-group-item">
          <h4 class="list-group-item-heading">Vai trò</h4>
          <p class="list-group-item-text text-right" id="role_name"></p>
        </li>
      </ul>
    </div>

    <div class="profile-right col-md-7">
      <div class="row">
        <div class="section col-md-12">
          <h2 class="heading-2 col-sm-12">
            Thay Đổi Mật Khẩu
          </h2>
          <div class="form-group col-md-12">
            <label>Mật khẩu hiện tại</label>
            <input type="password" id="old_password" class="form-control" placeholder="mật khẩu ...">
          </div>
          <div class="form-group col-md-12">
            <label>Mật khẩu mới</label>
            <input type="password" id="new_password" class="form-control" placeholder="mật khẩu mới ...">
          </div>
          <div class="form-group col-md-12">
            <label>Xác nhận mật khẩu mới</label>
            <input type="password" id="new_password_confirmation" class="form-control" placeholder="xác nhận mật khẩu mới ...">
          </div>

          <div class="col-md-12 text-right">
            <div class="col-md-12 form-button">
              <button type="submit" class="btn btn-info right" id="btnChange"><i class="fa fa-check"></i> Thay đổi mật khẩu</button>
              <button type="button" class="btn btn-default" id="btnCancel"> Hủy bỏ</button>
            </div>
          </div>
        </div>
        <div class="margin-20 col-md-12"></div>
        <div class="section col-md-12">
          <h2 class="heading-2 col-sm-12">
            Cập nhật thông tin
          </h2>
          <div class="form-group col-md-12">
            <label>Họ và tên</label>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input id="first_name" class="form-control" placeholder="Tên ...">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input id="last_name" class="form-control" placeholder="Họ ...">
              </div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>Số điện thoại</label>
            <input id="phone" class="form-control" placeholder="Số điện thoại +84 ...">
          </div>
          <div class="form-group col-md-12">
            <label>Giới tính</label>
            <div>
              <label class="radio-inline">
                <input type="radio" name="gender" class="gender" value="MALE">Nam
              </label>
              <label class="radio-inline">
                <input type="radio" name="gender" class="gender" value="FEMALE">Nữ
              </label>
            </div>
          </div>

          <div class="form-group col-md-12">
            <label>Ngày sinh</label>
            <div class="input-group date">
              <input type='text' class="form-control" name="birthday" id="birthday" value="{{ old('birthday') }}" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
          <div class="form-group col-md-5">
            <label>Ảnh đại diện</label>
            <div>
              <input type="file" id="avatar" name="avatar">
            </div>
          </div>

          <div class="col-md-12 text-right">
            <div class="col-md-12 form-button">
              <button type="submit" class="btn btn-info right" id="btnUpdate"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
