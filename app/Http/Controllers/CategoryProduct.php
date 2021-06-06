<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Models\Partner;
use App\Models\CatePost;
use App\Models\CategoryProductModels;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
        public function AuthLogin(){
            $admin_id = Auth::id();
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function add_category_product(){
            $this->AuthLogin();
            $category = CategoryProductModels::where('category_parent',0)->orderBy('category_id','DESC')->get();
            return view('admin.category.add_category_product')->with(compact('category'));
        }
        public function all_category_product(){
            $this->AuthLogin();
            $category_product = CategoryProductModels::where('category_parent',0)->orderBy('category_id','DESC')->get();

            $all_category_product = DB::table('tbl_category_product')->orderBy('category_parent','DESC')->paginate(10);

            $manager_category_product  = view('admin.category.all_category_product')->with('all_category_product',$all_category_product)->with('category_product',$category_product);

            return view('admin_layout')->with('admin.category.all_category_product', $manager_category_product);


        }
        public function save_category_product(Request $request){
            $this->AuthLogin();
            $data = array();
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;
            $data['category_parent'] = $request->category_parent;
            $data['slug_category_product'] = $request->slug_category_product;
            $data['category_status'] = $request->category_product_status;
            $data['meta_keywords'] = $request->meta_keywords;
            DB::table('tbl_category_product')->insert($data);
            Session::put('message','Them danh muc thanh cong');
            return Redirect::to('add-category-product');
        }
        public function inactive_category_product($category_product_id){
            $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
            Session::put('message','Khong kich hoat danh muc thanh cong');
            return Redirect::to('all-category-product');
        }
        public function active_category_product($category_product_id){
            $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
            Session::put('message','Kich hoat danh muc thanh cong');
            return Redirect::to('all-category-product');
        }

        public function edit_category_product($category_product_id){
            $this->AuthLogin();
            $category = CategoryProductModels::where('category_parent',0)->orderBy('category_id','DESC')->get();

            $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
            $manager_category_product = view('admin.category.edit_category_product')->with('edit_category_product',$edit_category_product)->with('category',$category);
            return view('admin_layout')->with('admin.category.edit_category_product', $manager_category_product);
        }

        public function update_category_product(Request $request, $category_product_id){
            $this->AuthLogin();
            $data = array();
            $data['category_name'] = $request->category_product_name;
            $data['category_desc'] = $request->category_product_desc;
            $data['slug_category_product'] = $request->slug_category_product;
            $data['meta_keywords'] = $request->meta_keywords;
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
            Session::put('message','Cập nhập danh muc thanh cong');
            return Redirect::to('all-category-product');
        }

        public function delete_category_product($category_product_id){
            $this->AuthLogin();
            DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
            Session::put('message','Đã xóa danh muc thanh cong');
            return Redirect::to('all-category-product');
        }
        //show sản phẩm thuộc danh mục trang home
        public function show_category_home(Request $request , $category_id){
            $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get();
            $category_post = CatePost::orderBy('cate_post_id','DESC')->where('cate_post_status','1')->get();
            $partner = Partner::orderBy('partner_id','DESC')->where('partner_status','1')->take(10)->get();
            $category_by_id = DB::table('tbl_product')
            ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
            ->where('tbl_category_product.category_id',$category_id)->get();

            if (empty($category_by_id)) {
                foreach($category_by_id as $key=>$val)
                {
                    $meta_desc = $val->category_desc;
                    $meta_keywords = $val->meta_keywords;
                    $meta_title = $val->category_name;
                    $url_canonical = $request->url();
                }
            } else {
                    $category = DB::table('tbl_category_product')->where('category_id',$category_id)->get();
                    $meta_desc = $category[0]->category_desc;
                    $meta_keywords = $category[0]->meta_keywords;
                    $meta_title = $category[0]->category_name;
                    $url_canonical = $request->url();
            }


            $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
            return view('pages.category.show_category')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('category_by_id',$category_by_id)
            ->with('category_name',$category_name)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('partner',$partner)
            ->with('category_post',$category_post);
        }
        public function export_csv(){
            return Excel::download(new ExcelExports , 'category_product.xlsx');
        }
        public function import_csv(Request $request){
            $path = $request->file('file')->getRealPath();
            Excel::import(new ExcelImports, $path);
            return back();
        }
}
