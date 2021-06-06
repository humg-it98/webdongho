<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Front-end*/
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/404','HomeController@error_page');

/*Back-end*/
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');

//Dang nhap fb-gmail
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');
Route::get('/login-google','AdminController@login_google');
Route::get('/admin/callback-gg','AdminController@callback_google');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/inactive-category-product/{category_product_id}','CategoryProduct@inactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');

//Brand product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/inactive-brand-product/{brand_product_id}','BrandProduct@inactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/inactive-product/{product_id}','ProductController@inactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::post('/save-product','ProductController@save_product');
Route::get('/add-images-product','ProductController@add_images_product');
Route::post('/save-images-product','ProductController@save_images_product');

//Danh  mục bài viết
Route::get('/add-category-post','CategoryPost@add_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');
Route::post('/update-category-post/{category_post_id}','CategoryPost@update_category_post');
Route::get('/delete-category-post/{category_post_id}','CategoryPost@delete_category_post');
Route::post('/save-category-post','CategoryPost@save_category_post');
Route::get('/danh-muc-bai-viet/{cate_post_slug}','CategoryPost@danh_muc_bai_viet');

//Bài viết
Route::get('/add-post','PostController@add_post');
Route::get('/all-post','PostController@all_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::post('/save-post','PostController@save_post');
Route::post('/update-post/{post_id}','PostController@update_post');

//danh mục bài viết trang home
Route::get('/danh-muc-bai-viet/{cate_post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');

//Danh mục sp
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

//Cart
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/update-cart-quantity','CartController@update_cart');
Route::post('/update-cart','CartController@update_cart_fee');
//Cart dùng Ajax
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/del-product/{session_id}','CartController@del_product');
Route::post('/cap-nhat-gio-hang','CartController@update_cart_ajax');
Route::get('/del-all-product','CartController@del_all_product');

//Coupon
Route::post('/check-coupon','CouponController@check_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
Route::get('/list-coupon','CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/unset-coupon','CartController@unset_coupon');

//Banner
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','SliderController@active_slide');

//Đối tác liên kết
Route::get('/manage-partner','PartnerController@manage_partner');
Route::get('/add-partner','PartnerController@add_partner');
Route::get('/delete-partner/{partner_id}','PartnerController@delete_partner');
Route::post('/insert-partner','PartnerController@insert_partner');
Route::get('/unactive-partner/{partner_id}','PartnerController@unactive_partner');
Route::get('/active-partner/{partner_id}','PartnerController@active_partner');

//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');


//Check-out
// Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/dang-nhap','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::get('/payment','CheckoutController@payment');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::get('/del-fee','CheckoutController@del_fee');
Route::post('/confirm-order','CheckoutController@confirm_order');



// Order (Đơn hàng trang Admin)
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/delete-order/{order_code}','OrderController@order_code');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');



//sent-mail
Route::get('/send-mail','HomeController@send_mail');

//Phân quyền
Route::get('/register-auth','AuthController@register_auth');
Route::get('/login-auth','AuthController@login_auth');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
Route::get('/logout-auth','AuthController@logout_auth');

Route::group(['middleware' => 'auth.roles'], function () {
	Route::get('/add-product','ProductController@add_product');
	Route::get('/edit-product/{product_id}','ProductController@edit_product');
});

Route::get('users','UserController@index')->middleware('auth.roles');
Route::get('add-users','UserController@add_users')->middleware('auth.roles');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
Route::post('store-users','UserController@store_users')->middleware('auth.roles');
Route::post('assign-roles','UserController@assign_roles');

Route::get('impersonate/{admin_id}','UserController@impersonate');
Route::get('impersonate-destroy','UserController@impersonate_destroy');

