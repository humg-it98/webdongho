@extends("layout")
@section("content")
  <div class="container">
    <div class="row ">
      <!-- =====  BANNER STRAT  ===== -->
      <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
          <h1>{{$meta_title}}</h1>
        </div>
      </div>
      <!-- =====  BREADCRUMB END===== -->
      <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
        <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
          <div class="nav-responsive">
            <div class="heading-part">
              <h2 class="main_title">Danh mục sản phẩm</h2>
            </div>
            <ul class="nav  main-navigation collapse in">
                @foreach($category as $key => $cate)
                <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                @endforeach
            </ul>
          </div>
        </div>
        <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
        <div class="blog-category left-sidebar-widget mb_50">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Thương hiệu sản phẩm</h2>
          </div>
          @foreach($brand as $key => $brand)
          <ul class="nav nav-pills nav-stacked">
              <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
          </ul>
      @endforeach
        </div>
        <div class="left-blog left-sidebar-widget mb_50">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Latest Post</h2>
          </div>
          <div id="left-blog">
            <div class="row ">
              <div class="blog-item mb_20">
                <div class="post-format col-xs-4">
                  <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_01.jpg"  alt="themini"></a></div>
                </div>
                <div class="post-info col-xs-8 ">
                  <h5> <a href="single_blog.html">Fashions fade, style is eternal</a> </h5>
                  <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>11 May 2017 </div>
                </div>
              </div>
              <div class="blog-item mb_20">
                <div class="post-format col-xs-4">
                  <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_02.jpg"  alt="themini"></a></div>
                </div>
                <div class="post-info col-xs-8 ">
                  <h5> <a href="single_blog.html">Fashions fade, style is eternal</a> </h5>
                  <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>11 May 2017 </div>
                </div>
              </div>
              <div class="blog-item mb_20">
                <div class="post-format col-xs-4">
                  <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_03.jpg"  alt="themini"></a></div>
                </div>
                <div class="post-info col-xs-8 ">
                  <h5> <a href="single_blog.html">Fashions fade, style is eternal</a> </h5>
                  <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>11 May 2017 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-lg-9 mtb_20">
        <div class="row">
            @foreach($post_by_id as $key => $p)
                <div class="blog-item listing-effect col-md-12 mb_50">
                    <div class="post-format">
                    <div class="thumb post-img"><a href="" title="Beautiful Lady"> <img src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}"></a></div>
                    <div class="post-type"> <i class="fa fa-picture-o" aria-hidden="true"></i> </div>
                    </div>
                    <div class="post-info mtb_20 ">
                    <h2 class="mb_10"> <a href="">{{$p->post_title}}</a> </h2>
                    <p>{!!$p->post_desc!!} </p>
                    </div>
                    <blockquote> {!!$p->post_content!!}</blockquote>

                    <div class="details mtb_20">
                    <div class="date"> <i class="fa fa-calendar" aria-hidden="true"></i>14 Tháng 5 2021 </div>
                    </div>
                    <div class="col-md-12">
                        <div class="heading-part text-center mb_10">
                        <h2 class="main_title mt_50">Bài viết liên quan</h2>
                        </div>
                        <div class="related_pro box">
                        <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                            @foreach($related as $key => $post_relate)
                            <a href="{{url('/bai-viet/'.$post_relate->post_slug)}}"><img style="height:250px;width:280px" src="{{asset('public/uploads/post/'.$post_relate->post_image)}}" alt="{{$post_relate->post_slug}}">{{$post_relate->post_title}}</a>
                          @endforeach
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
