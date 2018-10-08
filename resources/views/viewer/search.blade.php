@extends('viewer.layouts.master')
@section('master.viewer.title', 'danh sách')
@section('master.viewer.body', 'viewer-posts')
@section('master.viewer.content')
<div class="col-md-6">
  <h2 class="mb-4">Kêt quả tìm kiếm cho: {{ $search }}</h2>
</div>
<div class="col-md-12 col-lg-8 main-content">
  <div class="row mb-5 mt-5">
    <div class="col-md-12">
      @foreach($data['data']['posts']['data'] as $item)
      <div class="post-entry-horzontal element-animate">
        <a href="{{ route('viewer.posts.show', ['uri_category' => $item['uri_category'], 'uri_post' => $item['uri_post']]) }}">
          <div class="image" data-animate-effect="fadeIn" style="background-image: url({{ $item['avatar_post'] }});">
          </div>
          <span class="text">
            <div class="post-meta">
              <span class="category">{{ $item['type_category'] }}</span>
              <span class="mr-2">{{ Carbon\Carbon::parse($item['created_at']['date'])->format('d/m/Y') }} </span> &bullet;
              <span class="ml-2"><span class="fa fa-eye"></span> {{ $item['count_view'] }}</span>
            </div>
            <h2>{{ $item['title'] }}</h2>
          </span>
        </a>
      </div>
      @endforeach
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
          parse_str($_SERVER['QUERY_STRING'], $array_query); // array of query string

          $current_page = $data['data']['posts']['meta']['pagination']['current_page'];
          $actual_link  = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PATH_INFO'];
          $prev         = ($current_page == 1)
              ? 'javascript:'
              : ($actual_link . '?' . trim(parse_url($data['data']['posts']['meta']['pagination']['links']['previous'], PHP_URL_QUERY), '"'));

          $next         = ($current_page == $total_page)
              ? 'javascript:'
              : ($actual_link . '?' . trim(parse_url($data['data']['posts']['meta']['pagination']['links']['next'], PHP_URL_QUERY), '"'))

        @endphp
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="{{ $prev }}">Prev</a></li>
          @for($index = 1; $index <= $total_page; $index++)
            @php
              $array_query['page'] = $index;
              empty($array_query['search']) ? $array_query['search'] = '' : $array_query['search'];
            @endphp
            <li class="page-item"><a class="page-link" href="{{ $actual_link . "?search={$array_query['search']}&page={$array_query['page']}" }}">{{ $index }}</a></li>
          @endfor
          <li class="page-item"><a class="page-link" href="{{ $next }}">Next</a></li>
        </ul>
        @endif
      </nav>
    </div>
  </div>
</div>

@endsection
