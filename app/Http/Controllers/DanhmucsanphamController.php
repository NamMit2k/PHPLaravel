<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;
use App\Models\da4Model;
session_start();

class DanhmucsanphamController extends Controller
{
    public function add_category_product(){
    	return view('admin.add_category_product');
    }
    public function all_category_product(){

    	$all_category_product=DB::table('loaisanpham')->get();
    	$manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);

    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){
    	$data=array();
    	$data['tenloai']=$request->category_product_name;
    	$data['trangthai']=$request->category_product_status;

    	DB::table('loaisanpham')->insert($data);
    	Session::put('message','Thêm loại sản phẩm thành công');
    	return Redirect::to('add-category-product');
    }

    public function edit_category_product($category_product_id){
    	$edit_category_product=DB::table('loaisanpham')->where('id',$category_product_id)->get();
    	$manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);

    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }

    public function update_category_product(Request $request,$category_product_id){
    	$data=array();
    	$data['tenloai']=$request->input('category_product_name');
    	$data['trangthai']=$request->has('category_product_status')?1:0;
    	DB::table('loaisanpham')->where('id',$category_product_id)->update($data);
    	Session::put('message','Cập nhật loại sản phẩm thành công');
    	return Redirect::to('all-category-product');
    }
     public function delete_category_product($category_product_id){   
        DB::table('loaisanpham')->where('id',$category_product_id)->delete();
        Session::put('message','Xoá loại sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
}
