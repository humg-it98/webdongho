@extends("layout")
@section("content")
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <div class="row ">
        <!-- =====  BANNER STRAT  ===== -->
        <div class="col-sm-12">
            <div class="breadcrumb ptb_20">
            <h1>Giỏ hàng mua sắm...</h1>
            <ul>
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></li>
            </ul>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
            @elseif(session()->has('error'))
             <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif
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
        </div>
        <div class="col-sm-12 col-lg-9 mtb_20">
            <form enctype="multipart/form-data" method="post" action="{{url('/cap-nhat-gio-hang')}}">
                @csrf
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">Hình ảnh sản phẩm</td>
                      <td class="text-left">Tên sản phẩm</td>
                      <td class="text-left">ID sản phẩm</td>
                      <td class="text-center">Số lượng</td>
                      <td class="text-center">Giá</td>
                      <td class="text-right">Thành tiền</td>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Session::get('cart')==true)
                    @php
                        $total = 0;
                    @endphp
                    @foreach(Session::get('cart') as $item => $cart)
                    @php
                          $subtotal = $cart['product_price']*$cart['product_qty'];
                          $total += $subtotal;
                    @endphp
                    <tr>
                      <td class="text-center"><a href="#"><img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" height="80px" width="80px" alt="{{$cart['product_name']}}" title=""></a></td>
                      <td class="text-left"><a href="">{{$cart['product_name']}}</a></td>
                      <td class="text-left">{{$cart['product_id']}}</td>
                      <td class="text-left">
                            <div style="max-width: 300px;" class="input-group btn-block">
                            <input type="number" min="1" class="cart_quantity" size="1" value="{{$cart['product_qty']}}" name="cart_qty[{{$cart['session_id']}}]">
                            <input type="hidden" value="" name="rowId_cart" class="form-control">
                            <span class="input-group-btn">
                            {{-- <button class="btn btn-primary btn-sm" title="" data-toggle="tooltip" type="submit" data-original-title="Update" ><i class="fa fa-refresh"></i></a></button> --}}
                            <button class="btn btn-primary btn-sm" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><a  href="{{url('del-product/'.$cart['session_id'])}}"><i class="fa fa-times-circle"></i></a></button>
                            </span></div>
                      </td>
                      <td class="text-right">{{number_format($cart['product_price']).'VNĐ'}}</td>
                      <td class="text-right">{{number_format($subtotal).'VNĐ'}}</td>
                    </tr>
                    @endforeach
                    <br>
                    <td> <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
                    @else
                        <tr>
                            <td colspan="6"><center><b>
                            @php
                            echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                            @endphp
                            </b></center></td>
                        </tr>
                        @endif
                  </tbody>
                </table>
              </div>
            </form>
                <div class="panel-group mt_20" id="accordion">
                    @if(Session::get('cart'))
                    <div class="panel panel-default pull-left">
                        <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Sử dụng phiếu giảm giá <i class="fa fa-caret-down"></i></a></h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <form action="{{URL::to('/check-coupon')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="panel-body">
                                    <label for="input-coupon" class="col-sm-4 control-label">Nhập mã giảm giá tại đây</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="input-coupon" placeholder="Nhập mã giảm giá" value="" name="coupon">
                                        <span class="input-group-btn">
                                         <input type="submit" class="btn btn-success"style="border-radius:20px " data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
                                         @if(Session::get('coupon'))
                                            <a class="btn btn-default check_out" style="border-radius:20px " href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                         @endif
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td class="text-right"><strong>Tạm tính:</strong></td>
                                <td class="text-right">{{number_format($total).' VNĐ'}}</td>
                              </tr>

                              <tr>
                                  @if(Session::get('coupon'))
                                      @foreach(Session::get('coupon') as $key => $cou)
                                          @if($cou['coupon_condition']==1)
                                              <td class="text-right"><strong>Mã giảm:</strong></td>
                                              <td class="text-right">{{$cou['coupon_number']}} % </td>
                                                  @php
                                                  $total_coupon = ($total*$cou['coupon_number'])/100;
                                                  $total_after_coupon = $total-$total_coupon;
                                                  @endphp
                                          @elseif($cou['coupon_condition']==2)
                                                  <td class="text-right"><strong>Mã giảm:</strong></td>
                                                  <td class="text-right">{{number_format($cou['coupon_number'],0,',','.')}} VNĐ </td>
                                                  @php
                                                  $total_coupon = $total - $cou['coupon_number'];
                                                  $total_after_coupon = $total_coupon;
                                                  @endphp
                                          @else
                                                  <td class="text-right"><strong>Mã giảm:</strong></td>
                                                  <td class="text-right">0 </td>
                                                  @php
                                                  $total_coupon = $total;
                                                  $total_after_coupon = $total_coupon;
                                                  @endphp
                                          @endif
                                      @endforeach
                                      @endif
                               </tr>

                              <tr>
                                <td class="text-right"><strong>Tiền ship:</strong></td>
                                <td class="text-right">0</td>
                              </tr>
                              <tr>
                                <td class="text-right"><strong>Tổng tiền:</strong></td>
                                @if(Session::get('coupon'))
                                <td class="text-right">{{number_format($total_after_coupon).' VNĐ'}}</td>
                                @else
                                @php
                                    $total_after_coupon = ($total);
                                @endphp
                                <td class="text-right">{{number_format($total).'VNĐ'}}</td>
                                @endif
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>

                      @if(Session::get('customer_id'))
                      <form action="{{URL::to('/checkout')}}">
                        <input class="btn pull-right mt_30" type="submit" value="Thanh toán" />
                      </form>
                      @else
                      <form action="{{URL::to('/dang-nhap')}}">
                        <input class="btn pull-right mt_30" type="submit" value="Thanh toán" />
                      </form>
                      @endif

                    @endif
                </div>
            <form action="{{URL::to('/trang-chu')}}">
              <input class="btn pull-left mt_30" type="submit" value="Tiếp tục mua sắm" />
            </form>
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
