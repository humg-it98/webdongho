@extends('layout')
@extends('banner')
@section('content')

<div class="col-sm-12 mt_30">
 <div id="product-tab" class="mt_10">
    <div class="heading-part mb_10 ">
      <h2 class="main_title">Sản phẩm mới nhất</h2>
    </div>

    <div class="tab-content clearfix box">
      <div class="tab-pane active" id="nArrivals">
        <div class="nArrivals owl-carousel">
        @foreach($all_product as $key => $product)
          <div class="product-grid">
            <div class="item">
                <form>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}" >
                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="{{URL::to('/chi-tiet-san-pham',$product->product_id)}}"> <img style="height:250px;width:250px" data-name="product_image" src={{URL::to("public/uploads/product/".$product->product_image)}} alt="{{($product->product_name)}}" title="{{($product->product_name)}}" class="img-responsive"> <img src={{URL::to("public/uploads/product/".$product->product_image)}} height="220px" width="220px" alt="{{($product->product_name)}}" title="{{($product->product_name)}}" class="img-responsive"> </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>Thêm yêu thích</span></a></div>
                            <div class="quickview"><a href="#"><span>Chi tiết sản phẩm</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$product->product_id}}"><span>Thêm giỏ hàng</span></button>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                        <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">{{($product->product_name)}}</a></h6>
                        <span class="price"><span class="amount"><span class="currencySymbol">Giá: </span>{{number_format((int)$product->product_price).' VNĐ'}}</span>
                        </span>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="tab-pane" id="Bestsellers">
        <div class="Bestsellers owl-carousel">
          <div class="product-grid">
            <div class="item">
              <div class="product-thumb  mb_30">
                <div class="image product-imageblock"> <a href=""> <img data-name="product_image" src="public/frontend/images/product/product1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="public/frontend/images/product/product1-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                  <div class="button-group text-center">
                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                    <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                    <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    <div class="fb-share-button" data-href="http://localhost:8080/cuahangntn.com" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                  </div>
                </div>
                <div class="caption product-detail text-center">
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                  <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                  <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="Featured">
        <div class="Featured owl-carousel">
          <div class="product-grid">
            <div class="item">
              <div class="product-thumb  mb_30">
                <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="public/frontend/images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="public/frontend/images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                  <div class="button-group text-center">
                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                    <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                    <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                  </div>
                </div>
                <div class="caption product-detail text-center">
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                  <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                  <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="cms_banner">
      <div class="col-xs-12 mt_60">
        <div id="subbanner4" class="sub-hover">
          <div class="sub-img"><a href="#"><img style="height: 400px;width:1200px" src="public/frontend/images/banner.jpg" alt="Sub Banner5" class="img-responsive"></a></div>
        </div>
      </div>
    </div>
    <div class="col-sm-12 mtb_10">
      <!-- =====  PRODUCT TAB  ===== -->
      <div class="mt_60">
        <div class="heading-part mb_10 ">
          <h2 class="main_title">Deals of the Week</h2>
        </div>
        <div class="latest_pro box">
          <div class="latest owl-carousel">
            <div class="product-grid">
              <div class="item">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="public/frontend/images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> <img src="public/frontend/images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive"> </a>
                    <div class="button-group text-center">
                      <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                      <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                      <div class="compare"><a href="#"><span>Compare</span></a></div>
                      <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                  </div>
                  <div class="caption product-detail text-center">
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <h6 data-name="product_name" class="product-name"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Vide..</a></h6>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
    <div class="col-sm-12 mtb_10">
      <!-- =====  Blog ===== -->
      <div id="Blog" class="mt_50">
        <div class="heading-part mb_10 ">
          <h2 class="main_title">Bài viết mới nhất</h2>
        </div>
        <div class="blog-contain box">
          <div class="blog owl-carousel ">
            @foreach($all_post as $key => $all_baiviet)
            <div class="item">
              <div class="box-holder">
                <div class="thumb post-img"><a href="{{url('/bai-viet/'.$all_baiviet->post_slug)}}"> <img style="height: 330px;width:600px" src="{{asset('public/uploads/post/'.$all_baiviet->post_image)}}" alt="{{$all_baiviet->post_slug}}"> </a>
                  <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                  </div>
                  <div class="post-image-hover"> </div>
                  <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="{{url('/bai-viet/'.$all_baiviet->post_slug)}}">{{$all_baiviet->post_title}}</a> </h6>
                    <p>{!!$all_baiviet->post_desc!!}</p>
                    <div class="view-blog">
                      <div class="write-comment pull-left"> <a href="{{url('/bai-viet/'.$all_baiviet->post_slug)}}">{!!$all_baiviet->post_views!!} Bình luận</a> </div>
                      <div class="read-more pull-right"> <a href="{{url('/bai-viet/'.$all_baiviet->post_slug)}}"> <i class="fa fa-link"></i> Đọc thêm</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
        <!-- =====  Blog end ===== -->
      </div>
    </div>
  </div>
  <!-- =====  SUB BANNER END  ===== -->
  <div id="brand_carouse" class="ptb_60 text-center">
    <div class="type-01">
      <div class="heading-part mb_10 ">
        <h2 class="main_title">Đối tác liên kết</h2>
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

@endsection
