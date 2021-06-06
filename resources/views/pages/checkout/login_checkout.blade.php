@extends('layout')
@section('content')
<!-- =====  CONTAINER START  ===== -->
<div class="container">
   <div class="row ">
     <!-- =====  BANNER STRAT  ===== -->
     <div class="col-sm-12">
       <div class="breadcrumb ptb_20">
         <h1>Giỏ hàng</h1>
         <ul>
           <li><a href="index.html">Home</a></li>
           <li class="active">Shopping Cart</li>
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
         <br>
       </div>
       <div class="left-special left-sidebar-widget mb_50">
         <div class="heading-part mb_20 ">
           <h2 class="main_title">Thương hiệu</h2>
       </div>
           @foreach($brand as $key => $brand)
           <ul class="nav nav-pills nav-stacked">
               <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
           </ul>
           @endforeach
       </div>
     </div>
     <div class="col-sm-8 col-lg-9 mtb_20">
       <div class="panel-group" id="accordion">
         <div class="panel panel-default  ">
           <div class="panel-heading">
             <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Đăng nhập || Đăng kí <i class="fa fa-caret-down"></i></a></h4>
           </div>
           <div id="collapseOne" class="panel-collapse collapse in">
             <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="panel-login panel">
                        <div class="panel-heading">
                          <div class="row mb_20">
                            <div class="col-xs-6">
                              <a href="#" class="active" id="login-form-link">Đăng nhập</a>
                            </div>
                            <div class="col-xs-6">
                              <a href="#" id="register-form-link">Đăng ký</a>
                            </div>
                          </div>
                          <hr>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">
                              <form id="login-form" action="{{URL::to('/login-customer')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <input type="text" name="user_email" id="username1" tabindex="1" class="form-control" placeholder="Nhập email đăng nhập" value="">
                                </div>
                                <div class="form-group">
                                  <input type="password" name="user_password" id="password" tabindex="2" class="form-control" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group text-center">
                                  <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                  <label for="remember"> Ghi nhớ</label>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Đăng nhập">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="text-center">
                                        <a href="#" tabindex="5" class="forgot-password">Quên mật khẩu?</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <form id="register-form" action="{{URL::to('/add-customer')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <input type="text" name="customer_name" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                  <input type="email" name="customer_email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                </div>
                                <div class="form-group">
                                  <input type="password" name="customer_password" id="password2" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                  <input type="text" name="customer_phone" id="phone" tabindex="2" class="form-control" placeholder="SDT của bạn">
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                      <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Đăng ký">
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div id="brand_carouse" class="ptb_30 text-center">
     <div class="type-01">
       <div class="heading-part mb_20 ">
         <h2 class="main_title">Đối tác liên kết</h2>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <div class="brand owl-carousel ptb_20">
             <div class="item text-center"> <a href="#"><img src="public/frontend/images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
             <div class="item text-center"> <a href="#"><img src="public/frontend/images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- =====  CONTAINER END  ===== -->

@endsection

