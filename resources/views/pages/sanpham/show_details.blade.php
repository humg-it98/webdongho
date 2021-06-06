@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
            <h1>Chi tiết sản phẩm...</h1>
            <ul>
                @foreach($product_details as $key => $value)
                <li class="active">{{$value->product_name}}</li>
                @endforeach
            </ul>
            </div>
        </div>
        <!-- =====  BREADCRUMB END===== -->
        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
            <div class="nav-responsive">
                <div class="heading-part">
                <h2 class="main_title">Danh mục</h2>
                </div>
                @foreach($category as $key => $cate)
                <ul class="nav  main-navigation collapse in">
                <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                </ul>
                @endforeach
            </div>
            </div>
            <div class="left-special left-sidebar-widget mb_50">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Thương hiệu</h2>
            </div>
                @foreach($brand as $key => $brand)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                </ul>
            @endforeach
            </div>
            <div class="left_banner left-sidebar-widget mt_30 mb_40">
                <a href="#"><img src="{{asset('public/frontend/images/left1.jpg')}}" alt="Left Banner" class="img-responsive" /></a>
            </div>
            <div class="left-special left-sidebar-widget mb_50">
                <div class="heading-part mb_10 ">
                    <h2 class="main_title">Top Products</h2>
                </div>
                <div id="left-special" class="owl-carousel">
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product5.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product5-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product6.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product6-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product7.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product7-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product8-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product9-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product10.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product10-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <div class="left_banner left-sidebar-widget mb_50"> <a href="#"><img src="{{asset('public/frontend/images/left1.jpg')}}" alt="Left Banner" class="img-responsive" /></a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product2.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product2-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4.jpg"> <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product4-1.jpg">                                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
            @foreach($product_details as $key => $value)
            <div class="row mt_10 ">
                <form action="" method="POST">
                   @csrf
                    <div class="col-md-4">
                        <div class="img_product"><a class="thumbnails" href="{{URL::to('public/uploads/product/'.$value->product_image)}}"> <img data-name="product_image" src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt=""  /></a></div>
                        <div id="product-thumbnail" class="owl-carousel">
                            @foreach($product_images as $key => $img)
                            <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="{{URL::to('public/uploads/product_img/'.$img->product_image_1)}}" data-fancybox="group1"> <img style="width=65px;height=65px" src="{{URL::to('public/uploads/product_img/'.$img->product_image_1)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="{{URL::to('public/uploads/product_img/'.$img->product_image_2)}}" data-fancybox="group1"> <img style="width=65px;height=65px" src="{{URL::to('public/uploads/product_img/'.$img->product_image_2)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="{{URL::to('public/uploads/product_img/'.$img->product_image_3)}}" data-fancybox="group1"> <img style="width=65px;height=65px" src="{{URL::to('public/uploads/product_img/'.$img->product_image_3)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="{{URL::to('public/uploads/product_img/'.$img->product_image_4)}}" data-fancybox="group1"> <img style="width=65px;height=65px" src="{{URL::to('public/uploads/product_img/'.$img->product_image_4)}}" alt="" /></a></div>
                              </div>
                              <div class="item">
                                <div class="image-additional"><a class="thumbnail" href="{{URL::to('public/uploads/product_img/'.$img->product_image_5)}}" data-fancybox="group1"> <img style="width=65px;height=65px" src="{{URL::to('public/uploads/product_img/'.$img->product_image_5)}}" alt="" /></a></div>
                              </div>
                            @endforeach

                          </div>
                    </div>
                    <div class="col-md-6 prodetail caption product-thumb">
                            <h4 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{$value->product_name}}</a></h4>
                            <div class="rating">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                            </div>
                                <span class="price mb_20"><span class="amount"><span class="currencySymbol" >Giá: </span>{{number_format((int)$value->product_price).' VNĐ'}}</span>
                                </span>
                                <hr>
                                <ul class="list-unstyled product_info mtb_20">
                                <li>
                                    <label>Thương hiệu:</label>
                                    <span> <a href="#">{{$value->brand_name}}</a></span></li>
                                <li>
                                    <label>Danh mục:</label>
                                    <span>{{$value->category_name}}</span></li>
                                <li>
                                    <label>Mã ID sản phẩm:</label>
                                    <span> {{$value->product_id}}</span></li>
                                <li>
                                    <label>Tình trạng kho còn:</label>
                                    <span> {{$value->product_quantity}} sản phẩm</span></li>
                                </ul>
                                <hr>
                                <p class="product-desc mtb_30">Mô tả sản phẩm:{!!$value->product_desc!!} </p>
                                <div id="product">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="Sort-by col-md-6">
                                            <label>Màu sắc khác:</label>
                                            <select name="product_size" id="select-by-color" class="selectpicker form-control">
                                            <option>Đen</option>

                                            </select>
                                        </div>
                                        <div class="Color col-md-6">
                                            <label>Size:</label>
                                            <select name="product_color" id="select-by-size" class="selectpicker form-control">
                                            <option>36</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="qty mt_30 form-group2">
                                    <label>Số lượng:</label>
                                    <input class="cart_product_qty_{{$value->product_id}}" name="qty" min="1" value="1" type="number">
                                    <input class="cart_product_id_{{$value->product_id}}" type="hidden" value="{{$value->product_id}}">
                                    <input class="cart_product_name_{{$value->product_id}}" type="hidden" value="{{$value->product_name}}">
                                    <input class="cart_product_image_{{$value->product_id}}" type="hidden" value="{{$value->product_image}}">
                                    <input class="cart_product_price_{{$value->product_id}}" type="hidden" value="{{$value->product_price}}">
                                    <input class="cart_product_quantity_{{$value->product_id}}" type="hidden" value="{{$value->product_quantity}}">
                                </div>
                                <div class="button-group mt_30">
                                    <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$value->product_id}}"><span>Thêm giỏ hàng</span></button>
                                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div id="exTab5" class="mtb_30">
                <ul class="nav nav-tabs">
                    <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                    <li><a href="#2c" data-toggle="tab">Reviews (1)</a> </li>
                    <li><a href="#3c" data-toggle="tab">Solution</a> </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active pt_20" id="1c">
                    <p>{!!$value->product_desc!!}</p>
                    </div>
                    <div class="tab-pane" id="2c">
                    <form class="form-horizontal">
                        <div id="review"></div>
                        <h4 class="mt_20 mb_30">Write a review</h4>
                        <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-name">Your Name</label>
                            <input name="name" value="" id="input-name" class="form-control" type="text">
                        </div>
                        </div>
                        <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label" for="input-review">Your Review</label>
                            <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                            <div class="help-block"><span class="text-danger">Note:</span> Đánh giá phải khách quan, đừng đánh bừa, tội shop !</div>
                        </div>
                        </div>
                        <div class="form-group required">
                        <div class="col-md-6">
                            <label class="control-label">Đánh giá: </label>
                            <div class="rates"><span>&nbsp; Không hài lòng</span>
                            <input name="rating" value="1" type="radio">
                            <input name="rating" value="2" type="radio">
                            <input name="rating" value="3" type="radio">
                            <input name="rating" value="4" type="radio">
                            <input name="rating" value="5" type="radio">
                            <span>Hài Lòng</span></div>
                        </div>
                        <div class="col-md-6">
                            <div class="buttons pull-right">
                            <button type="submit" class="btn btn-md btn-link">Gửi đánh giá</button>
                            </div>
                        </div>
                        <div class="fb-comments" style="background: lemonchiffon;margin-top: 20px;" data-href="{{$url_canonical}}" data-width="870" data-numposts="5"></div>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane pt_20" id="3c">
                    <p>{!!$value->product_content!!}</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Sản phẩm liên quan</h2>
                </div>
                <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                    @foreach($relate as $key => $lienquan)
                    <div class="item">
                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="{{URL::to('/chi-tiet-san-pham',$lienquan->product_id)}}"> <img data-name="product_image" src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" class="img-responsive"><img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">{{($lienquan->product_name)}}</a></h6>
                        <div class="rating">
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                        </div>
                        <span class="price"><span class="amount"><span class="currencySymbol">Giá: </span>{{number_format((int)$lienquan->product_price).' VNĐ'}}</span>
                        </span>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        </div>
        <div id="brand_carouse" class="ptb_30 text-center">
        <div class="type-01">
            <div class="heading-part mb_10 ">
            <h2 class="main_title">Đối tác liên kết:</h2>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20">
                    @foreach($partner as $key => $par)
                    <div class="item text-center"> <a href="#"><img src={{URL::to('public/uploads/partner/'.$par->partner_image)}}  alt="{{$par->name}}" class="img-responsive" /></a> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection

