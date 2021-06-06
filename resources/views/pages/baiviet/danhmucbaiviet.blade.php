@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
   <div class="container">
    <div class="row ">
      <!-- =====  BANNER STRAT  ===== -->
      <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
          <h1>{{$meta_title}} </h1>
          <ul>
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Blog</li>
            <li class="active">{{$meta_title}} </li>
          </ul>
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
        <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src={{asset('public/frontend/images/left1.jpg')}} alt="Left Banner" class="img-responsive" /></a> </div>
        <div class="blog-category left-sidebar-widget mb_50">
          <div class="heading-part mb_20 ">
            <h2 class="main_title">Thương hiệu sản phẩm</h2>
          </div>
          <ul class="nav  main-navigation collapse in">
            @foreach($brand as $key => $brand)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                </ul>
            @endforeach
        </ul>
        </div>
      </div>
      <div class="col-sm-8 col-lg-9 mtb_20">
        <div class="row">
          <div class="three-col-blog text-left">
            @foreach($post_cate as $key => $p)
            <div class="blog-item col-md-6 mb_30">
              <div class="post-format">
                <div class="thumb post-img"><a href="{{url('/bai-viet/'.$p->post_slug)}}"> <img style="height: 330px;width:400px" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}"></a></div>
                <div class="post-type"><i class="fa fa-music" aria-hidden="true"></i></div>
              </div>
              <div class="post-info mtb_20 ">
                <h3 class="mb_10"> <a href="">{{$p->post_title}}</a> </h3>
                <p>{!!$p->post_desc!!}</p>
                <div class="details mtb_20">
                  <div class="date pull-left"> <i class="fa fa-calendar" aria-hidden="true"></i>11 Tháng 5 2021 </div>
                  <div class="more pull-right"> <a href="{{url('/bai-viet/'.$p->post_slug)}}">Đọc thêm <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="pagination-nav text-center mtb_20">
          <ul>
            {!!$post_cate->links()!!}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
