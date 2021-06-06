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
            <form enctype="multipart/form-data" method="get" action="{{URL::to('/update-cart-quantity')}}">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">Hình ảnh sản phẩm</td>
                      <td class="text-left">Tên sản phẩm</td>
                      <td class="text-left">ID sản phẩm</td>
                      <td class="text-left">Số lượng</td>
                      <td class="text-right">Giá</td>
                      <td class="text-right">Thành tiền</td>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @if(Cart::content()==true) --}}
                    <?php
                    $content = Cart::content();
                    $total=0;
                    ?>
                    @foreach($content as $item)
                    <tr>
                      <td class="text-center"><a href="#"><img src="{{URL::to('public/uploads/product/'.$item->options->image)}}" height="80px" width="80px" alt=" {{$item->name}}" title=" {{$item->name}}"></a></td>
                      <td class="text-left"><a href="product.html"> {{$item->name}}</a></td>
                      <td class="text-left">{{$item->id}}</td>
                      <td class="text-left">
                        <form action="{{URL::to('/update-cart-quantity')}}" method="get">
                            {{ csrf_field() }}
                            <div style="max-width: 300px;" class="input-group btn-block">
                            <input type="text" class="form-control quantity" size="1" value={{$item->qty}} name="qty">
                            <input type="hidden" value="{{$item->rowId}}" name="rowId_cart" class="form-control">
                            <span class="input-group-btn">
                            <button class="btn  btn-sm" title="" data-toggle="tooltip" type="submit" data-original-title="Update" ><i class="fa fa-refresh"></i></a></button>
                            {{-- <a  href="{{URL::to('/update-cart-quantity/'. $item->rowId)}}"> --}}
                            <button class="btn btn-primary btn-sm" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><a  href="{{URL::to('/delete-to-cart/'. $item->rowId)}}"><i class="fa fa-times-circle"></i></a></button>
                            </span></div>
                        </form>
                      </td>
                      <td class="text-right">{{number_format($item->price).' VNĐ'}}</td>
                      <td class="text-right">
                        <?php
                        $subtotal= $item->price * $item->qty;
                        $total+=$subtotal;
                        echo number_format($subtotal).' VNĐ';
                        ?>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </form>
            <h3 class="mtb_10">Bạn muốn làm gì tiếp theo?</h3>
            <p>Chọn xem bạn có mã giảm giá hoặc điểm thưởng muốn sử dụng hay xem ước tính chi phí giao hàng.</p>
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
                                         <input type="submit" class="btn btn-danger" style="border-radius:20px " data-loading-text="Loading..." id="button-coupon" value="Delete Coupon">
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="panel panel-default pull-left">
                        <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Phí vận chuyển và &amp; Thuế <i class="fa fa-caret-down"></i></a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>Vui lòng điền thông tin người nhận hàng.</p>
                            <form class="form-horizontal">
                            <div class="form-group required">
                                <label for="input-country" class="col-sm-2 control-label">Thành phố</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="input-country" name="country_id">
                                    <option value="">--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="col-sm-2 control-label">Quận/Huyện</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="input-zone" name="zone_id">
                                    <option value=""> --- Chọn quận huyện--- </option>
                                    <option value="3513">Hai Bà Trưng</option>
                                    <option value="3514">Hoàn Kiếm</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="col-sm-2 control-label">Quận/Huyện</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="input-zone" name="zone_id">
                                    <option value=""> --- Chọn xã phường--- </option>
                                    <option value="3513">Hai Bà Trưng</option>
                                    <option value="3514">Hoàn Kiếm</option>
                                </select>
                                </div>
                            </div>
                            <input type="button" class="btn pull-right" data-loading-text="Loading..." id="button-quote" value="Tính ">
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-8">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-right"><strong>Tạm tính:</strong></td>
                      <td class="text-right">{{Cart::subtotal().' '.'vnđ'}}</td>
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
                      {{-- <td class="text-right">{{number_format($total_after_coupon,0,',','.').'VNĐ'}}</td> --}}
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="{{URL::to('/trang-chu')}}">
              <input class="btn pull-left mt_30" type="submit" value="Tiếp tục mua sắm" />
            </form>
            <form action="{{URL::to('/login-checkout')}}">
              <input class="btn pull-right mt_30" type="submit" value="Thanh toán" />
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
                    <div class="item text-center"> <a href="#"><img src={{asset("public/frontend/images/brand/brand1.png")}} alt="Disney" class="img-responsive" /></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

