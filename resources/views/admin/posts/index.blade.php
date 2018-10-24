@extends('admin.layouts.master')
@section('master.title', 'Bài Viết')
@section('master.body', 'posts')
@section('master.content')

<ol class="breadcrumb text-right">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li class="active">Bài Viết</li>
</ol>
<div class="container-posts">
  <div class="row ">
    <h2 class="heading-2 col-sm-12">
      Quản Lý Bài Viết
    </h2>
    <div class="col-sm-7 posts-header">
      <div class="input-group">
        <input type="text" class="form-control" id="input_search" placeholder="Tìm kiếm"/>
        <span class="input-group-addon">
          <a href="javascript:" id="btnSearch"><i class="fa fa-search"></i></a>
        </span>
      </div>
    </div>

    <div class="col-sm-2">
      <select id="sort" class="form-control">
          <option class="weight" value=''>Sắp xếp theo ...</option>
          <option value="title_asc">Tiêu đề (A - Z)</option>
          <option value="title_desc">Tiêu đề (Z - A)</option>
          <option value="created_asc">Ngày tạo &#xf176;</option>
          <option value="created_desc">Ngày tạo &#xf175;</option>
          <option value="slider">Slider đang hoạt động</option>
          <option value="hot">Bài viết đang Hot</option>
      </select>
    </div>
    <div class="col-sm-3">
      <select id="search-category" class="form-control">
          <option class="weight" value=''>LỌC THEO TẤT CẢ DANH MỤC</option>
        @foreach($categories['data']['categories']['data'] as $item)
          <option value="{{ $item['id'] }}">LỌC THEO {{ $item['attributes']['name_category'] }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center text-nowrap">#</th>
              <th class="text-center text-nowrap">Tiêu đề</th>
              <th class="text-center text-nowrap">Ảnh</th>
              <th class="text-center text-nowrap">Link</th>
              <th class="text-center text-nowrap">Trạng thái</th>
              <th class="text-center text-nowrap">Hiển thị slider</th>
              <th class="text-center text-nowrap">Nổi bật</th>
              <th class="text-center text-nowrap">Ngày tạo</th>
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
