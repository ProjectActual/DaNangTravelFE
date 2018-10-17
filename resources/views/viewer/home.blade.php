@extends('viewer.layouts.master')
@section('master.viewer.title', 'Trang Chủ')
@section('master.viewer.body', 'homepage')
@section ('master.viewer.slider')

<section class="site-section pt-5 py-2em">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="owl-carousel owl-theme home-slider">
          @foreach($data['data']['sliders']['data'] as $item)
          <div>
            <a href="{{ route('viewer.posts.show', ['uri_category' => $item['attributes']['uri_category'], 'uri_post' => $item['attributes']['uri_post']]) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url({{ $item['attributes']['avatar_post'] }}); ">
              <div class="text half-to-full">
                <div class="post-meta">
                  <span class="category">{{ $item['attributes']['type_category'] }}</span>
                  <span class="mr-2">{{ Carbon\Carbon::parse($item['attributes']['created_at']['date'])->format('d/m/Y') }} </span>
                  <span class="ml-2"><span class="fa fa-eye"></span> {{ $item['attributes']['count_view'] }}</span>
                </div>
                <h3>{{ $item['attributes']['title'] }}</h3>
                <p> {{ substr($item['attributes']['summary'], 0, 100) }}... </p>
              </div>
            </a>
          </div>
          @endforeach
        </div>

      </div>
    </div>
    <div class="row">
      @foreach($data['data']['hots']['data'] as $item)
      <div class="col-md-6 col-lg-4">
        <a href="{{ route('viewer.posts.show', ['uri_category' => $item['attributes']['uri_category'], 'uri_post' => $item['attributes']['uri_post']]) }}" class="a-block d-flex align-items-center height-md" style="background-image: url({{ $item['attributes']['avatar_post'] }}); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">{{ $item['attributes']['type_category'] }}</span>
              <span class="mr-2">{{ Carbon\Carbon::parse($item['attributes']['created_at']['date'])->format('d/m/Y') }}</span>
            </div>
            <h3>{{ $item['attributes']['title'] }}</h3>
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
    @foreach($data['data']['posts']['data'] as $item)
    <div class="col-md-6">
      <a href="{{ route('viewer.posts.show', ['uri_category' => $item['attributes']['uri_category'], 'uri_post' => $item['attributes']['uri_post']]) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="{{ $item['attributes']['avatar_post'] }}" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">{{ $item['attributes']['type_category'] }}</span>
            <span class="mr-2">{{ Carbon\Carbon::parse($item['attributes']['created_at']['date'])->format('d/m/Y') }}</span>
            <span class="ml-2"><span class="fa fa-eye"></span> {{ $item['attributes']['count_view'] }}</span>
          </div>
          <h2>{{ $item['attributes']['title'] }}</h2>
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
      @foreach($data['data']['foods']['data'] as $item)
      <div class="post-entry-horzontal">
        <a href="{{ route('viewer.posts.show', ['uri_category' => $item['attributes']['uri_category'], 'uri_post' => $item['attributes']['uri_post']]) }}">
          <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url({{ $item['attributes']['avatar_post'] }});"></div>
          <span class="text">
            <div class="post-meta">
              <span class="category">{{ $item['attributes']['type_category'] }}</span>
              <span class="mr-2">{{ Carbon\Carbon::parse($item['attributes']['created_at']['date'])->format('d/m/Y') }}</span>
              <span class="ml-2"><span class="fa fa-eye"></span> {{ $item['attributes']['count_view'] }}</span>
            </div>
            <h2>{{ $item['attributes']['title'] }}</h2>
          </span>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
