@extends('viewer.layouts.master')
@section('master.viewer.title', 'Trang Chủ')
@section('master.viewer.body', 'homepage')
@section ('master.viewer.slider')

@php
  $categories = [
    'Du Lịch'  =>1,
    'Điểm Đến' => 2,
    'Sự Kiện'  => 3,
    'Ẩm Thực'  => 4,
    'Cẩm Nang' => 5,
  ];
@endphp

<section class="site-section pt-5 py-2em">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme home-slider">
          @foreach($data['sliders'] as $item)
          <div>
            <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url({{ env('APP_URL_API') . Storage::url($item['avatar_post']) }}); ">
              <div class="text half-to-full">
                <div class="post-meta">
                  <span class="category">{{ array_search($item['category_id'], $categories) }}</span>
                  <span class="mr-2">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }} </span>
                </div>
                <h3>{{ $item['title'] }}</h3>
                <p> {{ substr($item['summary'], 0, 100) }}... </p>
              </div>
            </a>
          </div>
          @endforeach
        </div>

      </div>
    </div>
    <div class="row">
      @foreach($data['hots'] as $item)
      <div class="col-md-6 col-lg-4">
        <a href="blog-single.html" class="a-block d-flex align-items-center height-md" style="background-image: url({{ env('APP_URL_API') . Storage::url($item['avatar_post']) }}); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">{{ array_search($item['category_id'], $categories) }}</span>
              <span class="mr-2">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }}</span>
            </div>
            <h3>{{ $item['title'] }}</h3>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
@section('master.viewer.content')

<div class="col-md-12 col-lg-8 main-content">
  <div class="row">

    <div class="col-md-12">
      <h2 class="mb-4">Bài Viết Mới</h2>
    </div>
    @foreach($data['posts'] as $item)
    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="{{ env('APP_URL_API') . Storage::url($item['avatar_post']) }}" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">{{ array_search($item['category_id'], $categories) }}</span>
            <span class="mr-2">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }}</span>
          </div>
          <h2>{{ $item['title'] }}</h2>
        </div>
      </a>
    </div>
    @endforeach
  </div>

  <div class="row mb-5 mt-5">
    <div class="col-md-12">
      <h2 class="mb-4">Ẩm Thực Đường Phố</h2>
    </div>
    <div class="col-md-12">
      @foreach($data['foods'] as $item)
      <div class="post-entry-horzontal">
        <a href="blog-single.html">
          <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url({{ env('APP_URL_API') . Storage::url($item['avatar_post']) }});"></div>
          <span class="text">
            <div class="post-meta">
              <span class="category">{{ array_search($item['category_id'], $categories) }}</span>
              <span class="mr-2">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }}</span>
            </div>
            <h2>{{ $item['title'] }}</h2>
          </span>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
