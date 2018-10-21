@extends('admin.layouts.master')
@section('master.title', 'Dashboard')
@section('master.content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-paste"></i></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TỔNG BÀI VIẾT</span>
          <span class="info-box-number">{{ $data['data']['postAll']['count'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-paste"></i></i></span>

        <div class="info-box-content">
          <span class="info-box-text">BÀI VIẾT TRONG THÁNG</span>
          <span class="info-box-number">{{ $data['data']['postMonth']['countInMonth'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-eye"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TỔNG LƯỢT TƯƠNG TÁC</span>
          <span class="info-box-number">{{ $data['data']['postAll']['sum'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-eye"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TƯƠNG TÁC TRONG THÁNG</span>
          <span class="info-box-number">{{ $data['data']['postMonth']['sumInMonth'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

@endsection
