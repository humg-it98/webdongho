<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>{{$meta_title}}</title>
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="{{$meta_desc}}">
  <meta name="keywords" content="{{$meta_keywords}}">
  <meta name="canonical" href="{{$url_canonical}}">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  {{-- <meta property="og:image" content="{{$image_og}}" /> --}}
  <meta property="og:site_name" content="http://localhost:8080/webshoplaravel" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" />
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href={{asset("public/frontend/css/font-awesome.min.css")}} />
  <link rel="stylesheet" type="text/css" href={{asset("public/frontend/css/bootstrap.css")}} />
  <link rel="stylesheet" type="text/css" href={{asset("public/frontend/css/style.css")}} />
  <link rel="stylesheet" type="text/css" href={{asset("public/frontend/css/magnific-popup.css")}}>
  <link rel="stylesheet" type="text/css" href={{asset("public/frontend/css/owl.carousel.css")}}>
  <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
  <link rel="shortcut icon" href="//theme.hstatic.net/1000341789/1000533258/14/favicon.png?v=738" type="image/png" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png" type="image/png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png" type="image/png" >
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png" type="image/png">
</head>

<body>
    <!-- =====  LODER  ===== -->
    <div class="loder"></div>
    <div class="wrapper">
      <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
        <div class="newsletter-popup"> <img class="offer" src={{asset("public/frontend/images/newsbg.jpg")}} alt="offer">
          <div class="newsletter-popup-static newsletter-popup-top">
            <div class="popup-text">
              <div class="popup-title">Giảm <span> tới 50% </span></div>
              <div class="popup-desc">
                <div>Đăng ký ngay để nhận ưu đãi lớn.</div>
              </div>
            </div>
            <form onsubmit="return  validatpopupemail();" method="post">
              <div class="form-group required">
                <input type="email" name="email-popup" id="email-popup" placeholder="Nhập email của bạn" class="form-control input-lg" required />
                <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Đăng ký</button>
                <label class="checkme">
                  <input type="checkbox" value="" id="checkme" /> Không nhắc lại</label>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- =====  HEADER START  ===== -->
      <header id="header">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="header-top-left">
                  <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Mở cửa mỗi ngày từ 8:00 AM đến 8:00 PM</span></div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-8">
                <ul class="header-top-right text-right">
                  <li><a href="{{URL::to('/yeu-thich')}}"><i class="fa fa-star"></i> Yêu thích</a></li>
                  <?php
                     $customer_id = Session::get('customer_id');
                     $shipping_id = Session::get('shipping_id');
                     if($customer_id!=NULL && $shipping_id==NULL){
                   ?>
                    <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                  <?php
                   }elseif($customer_id!=NULL && $shipping_id!=NULL){
                   ?>
                   <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                   <?php
                  }else{
                  ?>
                   <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                  <?php
                   }
                  ?>


                  <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>

                  @php
                      $customer_id = Session::get('customer_id');
                      if($customer_id!=NULL){
                      @endphp

                      <li>
                          <a href="{{URL::to('history')}}"><i class="fa fa-bell"></i> Lịch sử đơn hàng </a>

                      </li>


                     @php
                      }
                     @endphp

                  <?php
                  $customer_id = Session::get('customer_id');
                  $customer_name = Session::get('customer_name');
                  if($customer_id!=NULL){
                      ?>

                      <li>
                          <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất : </a>

                          <img width="15%" src="{{Session::get('customer_picture')}}">
                          {{Session::get('customer_name')}}

                      </li>


                      <?php
                  }else{
                     ?>
                     <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                     <?php
                 }
                 ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="header">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                  <form action="{{URL::to('/tim-kiem')}}" method="POST">
                  {{ csrf_field() }}
                      <div class="main-search mt_40">
                          <input id="search-input" name="keywords_submit" value="" placeholder="Bạn cần tìm kiếm ..." class="form-control input-lg" autocomplete="off" type="text">
                          <span class="input-group-btn">
                      <button type="submit" class="btn btn-default btn-lg" name="search_item"><i class="fa fa-search"></i></button>
                      </span> </div>
                  </form>
              </div>
              <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="{{URL::to('/')}}"> <img alt="themini" src={{asset("public/frontend/images/logo.png")}}> </a> </div>
              <div class="col-xs-6 col-sm-4 shopcart">
                <form action="" method="">
                <div id="cart" class="btn-group btn-block mtb_40">
                  <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">Shopping cart</span><span id="cart-total">items</span> </button>
                </div>
                <div id="cart-dropdown" class="cart-menu collapse">
                  <ul>
                    <li>
                      <table class="table table-striped">
                        <tbody>

                              <tr>
                              <td class="text-center"><a href="#"><img  src="{{URL::to('public/uploads/product/')}}" height="80px" width="80px"></a></td>
                              <td class="text-left product-name"><a href="#">  </a> <span class="text-left price"></span>
                                  <input class="cart-qty" name="product_quantity" min="1" value="" type="number">
                              </td>
                              <td class="text-center"><a class="close-cart" href="{{URL::to('/save-cart')}}"><i class="fa fa-times-circle"></i></a></td>
                              </tr>


                        </tbody>
                      </table>
                    </li>
                    <li>
                      <table class="table">
                        <tbody>
                          <tr>
                            <td class="text-right"><strong>Tạm tính</strong></td>
                            <td class="text-right"></td>
                          </tr>
                          <tr>
                            <td class="text-right"><strong>Thuế</strong></td>
                            <td class="text-right">0</td>
                          </tr>
                          <tr>
                            <td class="text-right"><strong>Phí vận chuyển</strong></td>
                            <td class="text-right">0</td>
                          </tr>
                          <tr>
                            <td class="text-right"><strong>Tổng tiền:</strong></td>
                            <td class="text-right"></td>
                          </tr>
                        </tbody>
                      </table>
                    </li>
                    <li>
                      <form action={{URL::to("/show-cart")}}>
                        <input class="btn pull-left mt_10" value="View cart" type="submit">
                      </form>
                      <form action={{URL::to("/login-checkout")}}>
                        <input class="btn pull-right mt_10" value="Checkout" type="submit">
                      </form>
                    </li>
                  </ul>
                </div>
                </form>
            </div>
            </div>
            <nav class="navbar">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
              <div class="collapse navbar-collapse js-navbar-collapse">
                <ul id="menu" class="nav navbar-nav">
                  <li> <a href="{{URL::to('/')}}">Trang chủ</a></li>
                  <li class="dropdown mega-dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh mục </a>
                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li class="col-md-3">
                        <ul>
                          <li id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="item active"> <a href="#"><img src={{asset("public/frontend/images/menu-banner1.jpg")}} class="img-responsive" alt="Banner1"></a></div>
                              <!-- End Item -->
                              <div class="item"> <a href="#"><img src={{asset("public/frontend/images/menu-banner2.jpg")}} class="img-responsive" alt="Banner1"></a></div>
                              <!-- End Item -->
                              <div class="item"> <a href="#"><img src={{asset("public/frontend/images/menu-banner3.jpg")}} class="img-responsive" alt="Banner1"></a></div>
                              <!-- End Item -->
                            </div>
                            <!-- End Carousel Inner -->
                          </li>
                          <!-- /.carousel -->
                        </ul>
                      </li>
                        @foreach($category as $key => $danhmuc)
                            <li class="col-md-3">
                                @if($danhmuc->category_parent==0)
                                <ul>
                                <li class="dropdown-header">{{$danhmuc->category_name}}</li>
                                @foreach($category as $key => $danhmuc1)
                                    @if($danhmuc1->category_parent==$danhmuc->category_id)
                                        <li><a href="{{URL::to('/danh-muc/'.$danhmuc1->slug_category_product)}}">{{$danhmuc1->category_name}}</a></li>
                                    @endif
                                @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                      {{-- <li class="col-md-3">
                        <ul>
                          <li id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="item active"> <a href="#"><img src={{asset("public/frontend/images/menu-banner1.jpg")}} class="img-responsive" alt="Banner1"></a></div>
                              <!-- End Item -->
                              <div class="item"> <a href="#"><img src={{asset("public/frontend/images/menu-banner2.jpg")}} class="img-responsive" alt="Banner1"></a></div>
                              <!-- End Item -->
                              <div class="item"> <a href="#"><img src={{asset("public/frontend/images/menu-banner3.jpg")}} class="img-responsive" alt="Banner1"></a></div>
                              <!-- End Item -->
                            </div>
                            <!-- End Carousel Inner -->
                          </li>
                          <!-- /.carousel -->
                        </ul>
                      </li> --}}
                    </ul>
                  </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh mục Sp</a>
                    <ul class="dropdown-menu">
                        @foreach($category as $key => $danhmuc)
                        <li><a href="{{URL::to('/danh-muc/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a></li>
                        @endforeach
                    </ul>
                  </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tin tức</a>
                    <ul class="dropdown-menu">
                        @foreach($category_post as $key => $danhmucbaiviet)
                        <li> <a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a></li>
                        @endforeach
                    </ul>
                  </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
                    <ul class="dropdown-menu">
                      <li> <a href="cart_page.html">Cart</a></li>
                      <li> <a href="checkout_page.html">Checkout</a></li>
                      <li> <a href="product_detail_page.html">Product Detail Page</a></li>
                      <li> <a href="single_blog.html">Single Post</a></li>
                    </ul>
                  </li>
                  <li> <a href="about.html">About us</a></li>
                  <li> <a href="contact_us.html">Contact us</a></li>
                </ul>
              </div>
              <!-- /.nav-collapse -->
            </nav>
          </div>
        </div>
      </header>
      <!-- =====  HEADER END  ===== -->
      <!-- =====  BANNER STRAT  ===== -->
      <div class="banner">
        @yield('banner')
      </div>
      <!-- =====  BANNER END  ===== -->
      <!-- =====  CONTAINER START  ===== -->
      <div class="container">
        <!-- =====  SUB BANNER  STRAT ===== -->
        <div class="row">
          <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
              <div class="icon-right Shipping"></div>
              <h6>Miễn phí vận chuyển</h6>
              <p>Miễn phí các đơn hàng </p>
            </div>
          </div>
          <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
              <div class="icon-right Order"></div>
              <h6>Đặt hàng Online</h6>
              <p>Từ : 8:00am - 11:00pm</p>
            </div>
          </div>
          <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
              <div class="icon-right Save"></div>
              <h6>Mua sắm tiết kiệm</h6>
              <p>Tặng voucher giảm giá</p>
            </div>
          </div>
          <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
              <div class="icon-right Safe"></div>
              <h6>Mua sắm an toàn</h6>
              <p>Cam kết chính hãng </p>
            </div>
          </div>
        </div>
        <div class="row ">
            {{-- <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div> --}}
            <!-- =====  PRODUCT TAB vừa cắt ===== -->
          @yield('content')
            <!-- =====  PRODUCT TAB  END ===== -->

        </div>
      </div>

      <!-- =====  CONTAINER END  ===== -->
      <!-- =====  FOOTER START  ===== -->
      <div class="footer pt_60">
        <div class="container">
          <div class="newsletters mt_30 mb_50">
            <div class="row">
              <div class="col-sm-6">
                <div class="news-head pull-left">
                  <h2>Follow Our Updates !</h2>
                  <div class="new-desc">Be the First to know about our Fresh Arrivals and much more!</div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="news-form pull-right">
                  <form onsubmit="return validatemail();" method="post">
                    <div class="form-group required">
                      <input name="email" id="email" placeholder="Enter Your Email" class="form-control input-lg" required="" type="email">
                      <button type="submit" class="btn btn-default btn-lg" style="width:130px; border-radius:10px">Subscribe</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 footer-block">
              <h6 class="footer-title ptb_20">Information</h6>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Delivery Information</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-block">
              <h6 class="footer-title ptb_20">Services</h6>
              <ul>
                <li><a href="#">Returns</a></li>
                <li><a href="#">Site Map</a></li>
                <li><a href="#">Wish List</a></li>
                <li><a href="">My Account</a></li>
                <li><a href="#">Order History</a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-block">
              <h6 class="footer-title ptb_20">Extras</h6>
              <ul>
                <li><a href="#">Brands</a></li>
                <li><a href="#">Gift Certificates</a></li>
                <li><a href="#">Affiliates</a></li>
                <li><a href="#">Specials</a></li>
                <li><a href="#">Newsletter</a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-block">
              <h6 class="footer-title ptb_20">Contacts</h6>
              <ul>
                <li>Công ty TNHH Ghiền mua sắm</li>
                <li>Số 1 Xuân Đỉnh, thành phố Hà Nội</li>
                <li>(+84) 0372105792</li>
                <li>thoigian5792@gmail.com</li>
                <li><a href="#">www.tiendo.com</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-bottom mt_60 ptb_20">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <div class="social_icon">
                  <ul>
                    <li><a href="https://www.facebook.com/ngocnt.5792"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                    <li><a href="https://github.com/humg-it98"><i class="fa fa-github"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="copyright-part text-center">@2021 Website phát triển 💙 Nguyễn Tuấn Ngọc</div>
              </div>
              <div class="col-sm-4">
                <div class="payment-icon text-right">
                  <ul>
                    <li><i class="fa fa-cc-paypal "></i></li>
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-discover"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- =====  FOOTER END  ===== -->
    </div>
    <a id="scrollup"></a>
    <script src={{asset("public/frontend/js/jQuery_v3.1.1.min.js")}}></script>
    <script src={{asset("public/frontend/js/owl.carousel.min.js")}}></script>
    <script src={{asset("public/frontend/js/bootstrap.min.js")}}></script>
    <script src={{asset("public/frontend/js/jquery.magnific-popup.js")}}></script>
    <script src={{asset("public/frontend/js/jquery.firstVisitPopup.js")}}></script>
    <script src={{asset("public/frontend/js/custom.js")}}></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="nWBXSAKo"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="JNB9T0As"></script>
    <div class="zalo-chat-widget" data-oaid="248512510121692038" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="HywljSwE"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                // alert( 'Đã thêm vào giỏ hàng');
                // alert( cart_product_name);
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
                }else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                        success:function(data){
                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });
                        }

                    });
                }
            });
        });
    </script>

    <script>
    $(function() {
      $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function(event, ui) {
          $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
      });
      $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
    });
    </script>
      <script type="text/javascript">

        $(document).ready(function(){
          $('.send_order').click(function(){
        var total_after = $('.total_after').val();
              swal({
                title: "Xác nhận đơn hàng",
                text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Cảm ơn, Mua hàng",

                  cancelButtonText: "Đóng,chưa mua",
                  closeOnConfirm: false,
                  closeOnCancel: false
              },
              function(isConfirm){
                   if (isConfirm) {
                      var shipping_email = $('.shipping_email').val();
                      var shipping_name = $('.shipping_name').val();
                      var shipping_address = $('.shipping_address').val();
                      var shipping_phone = $('.shipping_phone').val();
                      var shipping_notes = $('.shipping_notes').val();
                      var shipping_method = $('.payment_select').val();

                      var order_fee = $('.order_fee').val();
                      var order_coupon = $('.order_coupon').val();
                      var _token = $('input[name="_token"]').val();

                      $.ajax({
                          url: '{{url('/confirm-order')}}',
                          method: 'POST',
                          data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                          success:function(){
                             swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                          }
                      });

                    //   window.setTimeout(function(){
                    //       location.reload();
                    //   } ,3000);

                    } else {
                      swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                    }

              });


          });
      });


  </script>
    <script type="text/javascript">
        $(document).ready(function(){
                $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if(action=='city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery-home')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                    $('#'+result).html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload();
                    }
                    });
                }
        });
    });
    </script>


  </body>
</html>
