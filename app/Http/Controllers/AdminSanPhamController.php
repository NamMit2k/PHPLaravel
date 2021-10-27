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
class AdminSanPhamController extends Controller
{
     public function add_product()
     {
        $cate_product=DB::table('loaisanpham')->orderby('id')->get();
    	return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function all_product(){

    	$all_product=DB::table('sanpham')->get();
    	$cate=DB::table('loaisanpham')->get();
    	$manager_product=view('admin.all_product')->with('all_product',$all_product)->with('cate',$cate);

    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function save_product(Request $request){
        // tạo 1 Request 
        // khai báo 1 mảng
    	$data=array();
        //gán tưng vị trí trường trong csdl = gửi resquest lấy về trương dlieu ở ô input nhập liệu
    	$data['tensp']=$request->product_name;
    	$data['loaisp']=$request->product_loaisp;  	
    	$data['xuatxu']=$request->product_xuatxu;
    	$data['giaban']=$request->product_giaban;
    	$data['soluong']=$request->product_soluong;
    	$data['mota']=$request->product_mota;
    	$data['trangthai']=$request->product_status;
    	$data['create_at']=$request->product_create_at;
        $data['image']=$request->product_image;
        $get_image=$request->file('product_image');

        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));//dùng để phân tách tên ảnh vd nga.jpg=nga jpg
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//tên ảnh.số từ 0->.jpg hoặc png
            $get_image->move('public/frontend/image',$new_image);//cho ảnh vào file product
            $data['image']=$new_image;
            DB::table('sanpham')->insert($data);
        Session::put(' message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
        }
        $data['image']='';
        //truy vấn đến bang sp và thực thi insert dữ liệu mảng trên vào
    	DB::table('sanpham')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    //cái function này dùng để lấy về thông tin sp cần sửa
    public function edit_product($product_id){
    	$cate_product=DB::table('loaisanpham')->orderby('id','desc')->get();
        //truy vấn đến bảng sp lấy sp có id= id nhập vào
        $edit_product=DB::table('sanpham')->where('id',$product_id)->get();
    	$manager_product=view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);

    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    //function này thực thi update
    public function update_product(Request $request,$product_id){

    	$data=array();
        //gán tưng vị trí trường trong csdl = gửi resquest lấy về trương dlieu ở ô input 
    	$data['tensp']=$request->product_name;
        $data['loaisp']=$request->product_loaisp;   
        $data['xuatxu']=$request->product_xuatxu;
        $data['giaban']=$request->product_giaban;
        $data['soluong']=$request->product_soluong;
        $data['mota']=$request->product_mota;
        $data['trangthai']=$request->product_status;
        $data['create_at']=$request->product_create_at;
        $get_image=$request->file('product_image');//product_image là name đặt bên edit

    	 if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));//dùng để phân tách tên ảnh vd nga.jpg=nga jpg
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//tên ảnh.số từ 0->.jpg hoặc png
            $get_image->move('public/frontend/image',$new_image);//cho ảnh vào file product
            $data['image']=$new_image;
            // truy vấn đến bảng sp và lấy về sp có id truyền vào để sửa-> sau đó thực thi update với dữ liệu mới
            DB::table('sanpham')->where('id',$product_id)->update($data);
            Session::put(' message','cập nhật sản phẩm thành công');
            //trả về view
            return Redirect::to('all-product');        
        }
        DB::table('sanpham')->where('id',$product_id)->update($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        //truy vấn đến bảng sp là lấy về sp có id= id truyền vào. và thực thi câu lênh xóa để xóa sp
        DB::table('sanpham')->where('id',$product_id)->delete();
        Session::put('message','Xoá sản phẩm thành công');
        return Redirect::to('all-product');
    }
}
