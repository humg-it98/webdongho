<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Session;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\CatePost;
use App\Models\Post;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function error_page(){
        return view('errors.404');
    }
    public function index(Request $request){
        //seo
        $meta_desc = "Shop Đồng Hồ⌚️ Nam Nữ Hơn 15 Cửa Hàng & 15 Năm Bán Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng Bảo Hành 5 Năm⚡ Khuyến Mãi 20%-50 ";
        $meta_keywords = "Đồng Hồ ️ Casio, Orient, Citizen, DW, Tissot Chính Hãng";
        $meta_title = "Shop Đồng Hồ⌚️ Nam Nữ chính hãng.";
        $url_canonical = $request->url();
        //
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get();
        $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','0')->take(10)->get();
        // $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->take(3)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(10)->get();
        $all_post = Post::orderBy('post_id','DESC')->where('post_status','0')->take(10)->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('partner',$partner)->with('category_post',$category_post)
        ->with('all_post',$all_post);
    }
    public function search(Request $request){
          //seo
          $meta_desc = "Tìm kiếm sản phẩm";
          $meta_keywords = "Tìm kiếm sản phẩm";
          $meta_title = "Tìm kiếm sản phẩm";
          $url_canonical = $request->url();
          //--seo
        $keyword = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','1')->take(10)->get();


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post)->with('partner',$partner);
    }


    public function send_mail(){
        //send mail
               $to_name = "Cửa hàng NTN xin chào ";
               $to_email = "thoigian5792@gmail.com";//send to this email

               $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php

               Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                   $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                   $message->from($to_email,$to_name);//send from this mail

               });
               return redirect('/')->with('message','');
               //--send mail
   }

}
