@extends('viewer.layouts.master')
@section('master.viewer.title', 'danh sách')
@section('master.viewer.body', 'viewer-posts')
@section('master.viewer.content')

<div class="col-md-6">
  <h2 class="mb-4">Category: Food</h2>
</div>

<div class="col-md-12 col-lg-8 main-content">
  <div class="row mb-5 mt-5">
    <div class="col-md-12">
      @foreach($data['data'] as $item)
      <div class="post-entry-horzontal">
        <a href="{{ route('viewer.posts.show', ['uri_category' => $item['uri_category'], 'uri_post' => $item['uri_post']]) }}">
          <div class="image" data-animate-effect="fadeIn" style="background-image: url({{ env('APP_URL_API') . \Storage::url($item['avatar_post']) }});">
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
        $current_page = $data['meta']['pagination']['current_page'];
        $total_page   = $data['meta']['pagination']['total_pages'];
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[PATH_INFO]";
        $prev         = ($current_page == 1) ? 'javascript:' : ($actual_link . '?page=' . ($current_page-1));
        $next         = ($current_page == $total_page) ? 'javascript:' : ($actual_link . '?page=' . ($current_page+1));
        @endphp
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="{{ $prev }}">Prev</a></li>
          @for($index = 1; $index <= $total_page; $index++)
          <li class="page-item"><a class="page-link" href="{{ $actual_link . '?page=' . $index }}">{{ $index }}</a></li>
          @endfor
          <li class="page-item"><a class="page-link" href="{{ $next }}">Next</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>

@endsection
