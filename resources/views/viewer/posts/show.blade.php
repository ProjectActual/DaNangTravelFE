@extends('viewer.layouts.master')
@section('master.viewer.title', 'chi tiết')
@section('master.viewer.body', 'viewer-posts-show')
@section('master.viewer.content')
<div class="col-md-12 col-lg-8 main-content" id="show-post-id" uri_category="{{ $post['data'][0]['uri_category'] }}">
  <h1 class="mb-4">{{ $post['data'][0]['title'] }}</h1>
  <div class="post-meta">
    <span class="category">{{ $post['data'][0]['type_category'] }}</span>
    <span class="mr-2">{{ \Carbon\Carbon::parse($post['data'][0]['created_at']['date'])->format('d/m/Y') }} </span>
    <span class="ml-2"><span class="fa fa-eye"></span> {{ $post['data'][0]['count_view'] }}</span>
  </div>

  <div class="post-content-body">
    {!! $post['data'][0]['content'] !!}
  </div>

  <div class="pt-5">
    Tags:
    @foreach($post['data'][0]['tag'] as $tag)
      <a href="#">#{{$tag['tag']}} </a>
    @endforeach
  </div>
</div>
@endsection
@section('master.viewer.relationship')
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
          </div>
        </div>
        <div class="row">
          @foreach($relationPost['data'] as $item)
          <div class="col-md-6 col-lg-3">
            <a href="{{ route('viewer.posts.show', ['uri_category' => $item['uri_category'], 'uri_post' => $item['uri_post']]) }}" class="a-block d-flex align-items-center" style="background-image: url('{{ env('APP_URL_API') . \Storage::url($item['avatar_post']) }}'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">{{ $item['type_category'] }}</span>
                  <span class="mr-2">{{ \Carbon\Carbon::parse($item['created_at']['date'])->format('d/m/Y') }} </span>
                  <span class="ml-2"><span class="fa fa-eye"></span> {{ $item['count_view'] }}</span>
                </div>
                <h5 class="show-title">{{ $item['title'] }}</h5>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>

@endsection
