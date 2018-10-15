@extends('viewer.layouts.master')
@section('master.viewer.title', 'danh sách')
@section('master.viewer.body', 'viewer-posts')
@section('master.viewer.content')
<div class="col-md-6">
  <h2 class="mb-4">Category: Food</h2>
</div>
@if(!empty($data['data']['posts']['data']))
<div class="col-md-12 col-lg-8">
  <form action="{{ route('viewer.posts.index', $data['data']['posts']['data'][0]['attributes']['uri_category']) }}" class="search-form">
    <div class="form-group">
      <span class="icon fa fa-search"></span>
      <input type="text" class="form-control" name="search" id="s" placeholder="Nhập tiêu đề bài viết">
    </div>
  </form>
</div>
@endif
<div class="col-md-12 col-lg-8 main-content">
  <div class="row mb-5 mt-5">
    <div class="col-md-12">
      @forelse($data['data']['posts']['data'] as $item)
      <div class="post-entry-horzontal element-animate">
        <a href="{{ route('viewer.posts.show', ['uri_category' => $item['attributes']['uri_category'], 'uri_post' => $item['attributes']['uri_post']]) }}">
          <div class="image" data-animate-effect="fadeIn" style="background-image: url({{ $item['attributes']['avatar_post'] }});">
          </div>
          <span class="text">
            <div class="post-meta">
              <span class="category">{{ $item['attributes']['type_category'] }}</span>
              <span class="mr-2">{{ Carbon\Carbon::parse($item['attributes']['created_at']['date'])->format('d/m/Y') }} </span> &bullet;
              <span class="ml-2"><span class="fa fa-eye"></span> {{ $item['attributes']['count_view'] }}</span>
            </div>
            <h2>{{ $item['attributes']['title'] }}</h2>
          </span>
        </a>
      </div>
      @empty
      <p>Không có bài viết nào</p>
      @endforelse
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      <nav aria-label="Page navigation" class="text-center">
        @php
        $total_page   = $data['data']['posts']['meta']['pagination']['total_pages'];
        @endphp
        @if($total_page > 1)
        @php
          empty($_SERVER['QUERY_STRING']) ? '' : parse_str($_SERVER['QUERY_STRING'], $array_query); // array of query string

          $current_page = $data['data']['posts']['meta']['pagination']['current_page'];
          $actual_link  = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PATH_INFO'];

          $first        = ($current_page == 1)
            ? 'javascript:'
            : ($actual_link . '?' . trim(parse_url($data['data']['posts']['links']['first'], PHP_URL_QUERY), '"'));

          $prev         = ($current_page == 1)
            ? 'javascript:'
            : ($actual_link . '?' . trim(parse_url($data['data']['posts']['links']['prev'], PHP_URL_QUERY), '"'));

          $next         = ($current_page == $total_page)
            ? 'javascript:'
            : ($actual_link . '?' . trim(parse_url($data['data']['posts']['links']['next'], PHP_URL_QUERY), '"'));

          $last         = ($current_page == $total_page)
            ? 'javascript:'
            : ($actual_link . '?' . trim(parse_url($data['data']['posts']['links']['last'], PHP_URL_QUERY), '"'));

          @endphp
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $first }}">Đầu</a></li>
            <li class="page-item"><a class="page-link" href="{{ $prev }}">Trước</a></li>
            @for($index = 1; $index <= $total_page; $index++)
            @php
            $array_query['page'] = $index;
            empty($array_query['search']) ? $array_query['search'] = '' : $array_query['search'];
            @endphp
            <li class="page-item"><a class="page-link" href="{{ $actual_link . "?search={$array_query['search']}&page={$array_query['page']}" }}">{{ $index }}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" href="{{ $next }}">Sau</a></li>
            <li class="page-item"><a class="page-link" href="{{ $last }}">Cuối</a></li>
          </ul>
          @endif
        </nav>
      </div>
    </div>
  </div>

  @endsection
