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
          <span class="info-box-number">{{ empty($data['data']['postAll']['sum']) ? '0' : $data['data']['postAll']['sum'] }}</span>
        </div>
        <!-- /.info-box-content-->
      </div>
      <!-- /.info-box-->
    </div>
    <!-- /.col -->
    <div class="col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-eye"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">TƯƠNG TÁC TRONG THÁNG</span>
          <span class="info-box-number">{{ empty($data['data']['postMonth']['sumInMonth']) ? '0' : $data['data']['postMonth']['sumInMonth'] }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  @php
    $statistic = empty($data['data']['statistic']) ? 0 : json_encode($data['data']['statistic']);
  @endphp
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Biểu đồ bài viết/lượt xem trong 4 tháng qua</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="chart">
              <canvas id="areaChart" statistic="{{ $statistic }}" style="height:250px"></canvas>
            </div>
          </div>
          <!-- ./box-body -->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-6 col-xs-6">
                <div class="description-block border-right">
                  <div style="width: 15px; height:15px;background-color: rgba(241,3,19,0.9); display:inline-block"></div>
                  <span class="description-header"> Lượt xem</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-6 col-xs-6">
                <div class="description-block">
                  <div style="width: 15px; height:15px;background-color: rgba(60,141,188,0.8); display:inline-block"></div>
                  <span class="description-header"> Bài đăng</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
  </section>
  <!-- /.content -->

  @endsection
