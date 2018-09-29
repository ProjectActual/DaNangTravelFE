@extends('viewer.layouts.master')
@section('master.viewer.title', 'Trang Chủ')
@section('master.viewer.body', 'homepage')
@section ('master.viewer.slider')

<section class="site-section pt-5 py-2em">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="owl-carousel owl-theme home-slider">
          <div>
            <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('images/img_1.jpg'); ">
              <div class="text half-to-full">
                <div class="post-meta">
                  <span class="category">Lifestyle</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
              </div>
            </a>
          </div>
          <div>
            <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('images/img_2.jpg'); ">
              <div class="text half-to-full">
                <div class="post-meta">
                  <span class="category">Lifestyle</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
              </div>
            </a>
          </div>
          <div>
            <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url('images/img_3.jpg'); ">
              <div class="text half-to-full">
                <div class="post-meta">
                  <span class="category">Lifestyle</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <a href="blog-single.html" class="a-block d-flex align-items-center height-md" style="background-image: url('images/img_2.jpg'); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">Lifestyle</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-single.html" class="a-block d-flex align-items-center height-md" style="background-image: url('images/img_2.jpg'); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">Lifestyle</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-single.html" class="a-block d-flex align-items-center height-md" style="background-image: url('images/img_3.jpg'); ">
          <div class="text">
            <div class="post-meta">
              <span class="category">Travel</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
          </div>
        </a>
      </div>
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
    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_5.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Food</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_6.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Travel</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>

    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_7.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Travel, Asia</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_8.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Travel</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>

    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_9.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Travel</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_10.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Lifestyle</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>

    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_11.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Lifestyle</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>
    <div class="col-md-6">
      <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
        <img src="images/img_12.jpg" alt="Image placeholder">
        <div class="blog-content-body">
          <div class="post-meta">
            <span class="category">Food</span>
            <span class="mr-2">March 15, 2018 </span> &bullet;
            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
          </div>
          <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
        </div>
      </a>
    </div>
  </div>

  <div class="row mb-5 mt-5">

    <div class="col-md-12">
      <h2 class="mb-4">Ẩm Thực Đường Phố</h2>
    </div>

    <div class="col-md-12">

      <div class="post-entry-horzontal">
        <a href="blog-single.html">
          <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url(images/img_10.jpg);"></div>
          <span class="text">
            <div class="post-meta">
              <span class="category">Travel</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
          </span>
        </a>
      </div>
      <!-- END post -->

      <div class="post-entry-horzontal">
        <a href="blog-single.html">
          <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url(images/img_11.jpg);"></div>
          <span class="text">
            <div class="post-meta">
              <span class="category">Lifestyle</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
          </span>
        </a>
      </div>
      <!-- END post -->

      <div class="post-entry-horzontal">
        <a href="blog-single.html">
          <div class="image element-animate"  data-animate-effect="fadeIn" style="background-image: url(images/img_12.jpg);"></div>
          <span class="text">
            <div class="post-meta">
              <span class="category">Food</span>
              <span class="mr-2">March 15, 2018 </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
            </div>
            <h2>There’s a Cool New Way for Men to Wear Socks and Sandals</h2>
          </span>
        </a>
      </div>
      <!-- END post -->

    </div>
  </div>
</div>

@endsection
