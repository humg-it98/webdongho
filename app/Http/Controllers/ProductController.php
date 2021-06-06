<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\CatePost;
use App\Models\Partner;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
        public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function add_product (){
            // $this->AuthLogin();
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
            return view('admin.product.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
        }
        public function all_product(){
            // $this->AuthLogin();
            $all_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->orderby('tbl_product.product_id','desc')->get();
            $manager_product  = view('admin.product.all_product')->with('all_product',$all_product);
            return view('admin_layout')->with('admin.product.all_product', $manager_product);

        }
        public function save_product(Request $request){
            // $this->AuthLogin();
            $data = array();

            $data['product_name'] = $request->product_name;
            $data['product_quantity'] = $request->product_qty;
            $data['product_price'] = $request->product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_slug'] = $request->product_slug;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            $path = 'public/uploads/product/';

            if($get_image){

                $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'product_image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'product_image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                ]);
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_product')->insert($data);
                Session::put('message','Thêm sản phẩm thành công');
                return Redirect::to('add-product');
            }
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('all-product');
        }
        public function inactive_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
            Session::put('message','Khong kich hoat sản phẩm thành cong');
            return Redirect::to('all-product');
        }
        public function active_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
            Session::put('message','Kich hoat sản phẩm thành cong');
            return Redirect::to('all-product');
        }

        public function edit_product($product_id){
            // $this->AuthLogin();
            $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
            $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
            $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
            return view('admin_layout')->with('admin.product.edit_product', $manager_product);
        }


        public function update_product(Request $request, $product_id){
            // $this->AuthLogin();
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_quantity'] = $request->product_qty;
            $data['product_price'] = $request->product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_slug'] = $request->product_slug;
            $data['product_content'] = $request->product_content;
            $data['category_id'] = $request->product_cate;
            $data['brand_id'] = $request->product_brand;
            $data['product_status'] = $request->product_status;
            $get_image = $request->file('product_image');
            if($get_image){
                        $get_name_image = $get_image->getClientOriginalName();
                        $name_image = current(explode('.',$get_name_image));
                        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                        $get_image->move('public/uploads/product',$new_image);
                        $data['product_image'] = $new_image;
                        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                        Session::put('message','Cập nhật sản phẩm thành công');
                        return Redirect::to('all-product');
            }
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }


        public function delete_product($product_id){
            $this->AuthLogin();
            DB::table('tbl_product')->where('product_id',$product_id)->delete();
            Session::put('message','Đã xóa sản phẩm thành công');
            return Redirect::to('all-product');
        }
        ///chi tiet sp
        public function details_product(Request $request, $product_id){
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get();
            $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','1')->take(10)->get();
            $details_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_product.product_id',$product_id)->get();

            $product_images = DB::table('tbl_product')
            ->join('tbl_images_product','tbl_images_product.product_id','=','tbl_product.product_id')
            ->where('tbl_images_product.product_id',$product_id)
            ->get();
            // dd($product_images);

            //seo
            $meta_desc = "Shop Đồng Hồ⌚️ Nam Nữ Hơn 15 Cửa Hàng & 15 Năm Bán Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng Bảo Hành 5 Năm⚡ Khuyến Mãi 20%-50 ";
            $meta_keywords = "Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng";
            $meta_title = "Shop Đồng Hồ⌚️ Nam Nữ chính hãng.";
            $url_canonical = $request->url();
            //seo
            foreach($details_product  as $key =>$value){
            $category_id = $value-> category_id;
            }


            $related_product = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
            ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
            ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();


            return view('pages.sanpham.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('product_images',$product_images)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post)->with('partner',$partner);
        }

        public function add_images_product (){
            $this->AuthLogin();
            $product = DB::table('tbl_product')->orderby('product_id','desc')->get();
            return view('admin.add_images_product')->with('product', $product);
        }

        public function save_images_product(Request $request){
            $this->AuthLogin();
            $data = array();
            $data['product_id'] = $request->product_images_id;
            $get_image_1 = $request->file('product_image_1');
            $get_image_2 = $request->file('product_image_2');
            $get_image_3 = $request->file('product_image_3');
            $get_image_4 = $request->file('product_image_4');
            $get_image_5 = $request->file('product_image_5');

            $path = 'public/uploads/product_img/';

            if($get_image_1||$get_image_2||$get_image_3||$get_image_4||$get_image_5){
                $this->validate($request,
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                    'product_image_1' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_2' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_3' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_4' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    'product_image_5' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'product_image_1.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_1.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_2.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_2.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_3.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_3.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_4.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_4.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    'product_image_5.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                    'product_image_5.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',

                ]);
                $get_name_image_1 = $get_image_1->getClientOriginalName();
                $name_image_1 = current(explode('.',$get_name_image_1));
                $new_image_1 =  $name_image_1.rand(0,99999).'.'.$get_image_1->getClientOriginalExtension();
                $get_image_1->move($path,$new_image_1);
                $data['product_image_1'] = $new_image_1;

                $get_name_image_2 = $get_image_2->getClientOriginalName();
                $name_image_2 = current(explode('.',$get_name_image_2));
                $new_image_2 =  $name_image_2.rand(0,99999).'.'.$get_image_2->getClientOriginalExtension();
                $get_image_2->move($path,$new_image_2);
                $data['product_image_2'] = $new_image_2;

                $get_name_image_3 = $get_image_3->getClientOriginalName();
                $name_image_3 = current(explode('.',$get_name_image_3));
                $new_image_3 =  $name_image_3.rand(0,99999).'.'.$get_image_3->getClientOriginalExtension();
                $get_image_3->move($path,$new_image_3);
                $data['product_image_3'] = $new_image_3;

                $get_name_image_4 = $get_image_4->getClientOriginalName();
                $name_image_4 = current(explode('.',$get_name_image_4));
                $new_image_4 =  $name_image_4.rand(0,99999).'.'.$get_image_4->getClientOriginalExtension();
                $get_image_4->move($path,$new_image_4);
                $data['product_image_4'] = $new_image_4;

                $get_name_image_5 = $get_image_5->getClientOriginalName();
                $name_image_5 = current(explode('.',$get_name_image_5));
                $new_image_5 =  $name_image_5.rand(0,99999).'.'.$get_image_5->getClientOriginalExtension();
                $get_image_5->move($path,$new_image_5);
                $data['product_image_5'] = $new_image_5;


                DB::table('tbl_images_product')->insert($data);
                Session::put('message','Thêm hình ảnh sản phẩm thành công');
                return Redirect::to('add-product');
            }
            $data['product_id'] = $request->product_images_id;
            $data['product_image_1'] = '';
            $data['product_image_2'] = '';
            $data['product_image_3'] = '';
            $data['product_image_4'] = '';
            $data['product_image_5'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm hình ảnh sản phẩm thành công');
            return Redirect::to('all-product');
        }

}
