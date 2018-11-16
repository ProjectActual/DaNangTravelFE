@extends('admin.layouts.master')
@section('master.title', 'Cộng Tác Viên')
@section('master.body', 'posts')
@section('master.content')
@php
  $profile = $data['data']['profile']['data'];
@endphp
<div class="container-posts">
  <div class="row">
    <div class="section col-md-12">
      <h2 class="heading-2 col-sm-12">
        Xác thực thông tin người dùng
      </h2>
      <div class="form-group col-md-12">
        <label>Họ và tên</label>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <input id="first_name" class="form-control" value="{{ $profile['attributes']['first_name'] }}" placeholder="Tên ...">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <input id="last_name" class="form-control" value="{{ $profile['attributes']['last_name'] }}" placeholder="Họ ...">
          </div>
        </div>
      </div>
      <div class="form-group col-md-12">
        <label>Số điện thoại</label>
        <input id="phone" class="form-control" value="+84" placeholder="Số điện thoại +84 ...">
      </div>
      <div class="form-group col-md-12">
        <label>Giới tính</label>
        <div>
          <label class="radio-inline">
            <input type="radio" name="gender" class="gender" {{ $profile['attributes']['gender'] == 'MALE' ? 'checked' : '' }} value="MALE">Nam
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" class="gender" {{ $profile['attributes']['gender'] == 'FEMALE' ? 'checked' : '' }} value="FEMALE">Nữ
          </label>
        </div>
      </div>
      <div class="form-group col-md-12">
        <label>Ngày sinh</label>
        <div class="input-group date">
          <input type='text' class="form-control" name="birthday" id="birthday" value="{{ $profile['attributes']['birthday'] }}" />
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
      </div>
      <div class="form-group col-md-5">
        <label>Ảnh đại diện</label>
        <div>
          <input type="file" id="avatar" name="avatar" data-default-file="{{ $profile['attributes']['avatar'] }}">
        </div>
      </div>
      <div class="col-md-12 text-right">
        <div class="col-md-12 form-button">
          <button type="submit" class="btn btn-info right" hash="{{ $profile['id'] }}" id="btnSubmit"><i class="fa fa-check"></i> Cập nhật</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
