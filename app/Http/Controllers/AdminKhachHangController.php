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

class AdminKhachHangController extends Controller
{
     public function add_khachhang(){
    	return view('admin.add_khachhang');
    }
    public function all_khachhang(){

    	$all_khachhang=DB::table('khachhangs')->get();
    	$manager_khachhang=view('admin.all_khachhang')->with('all_khachhang',$all_khachhang);

    	return view('admin_layout')->with('admin.all_khachhang',$manager_khachhang);
    }
    public function save_khachhang(Request $request){
    	$data=array();
    	$data['tenkh']=$request->khachhang_tenkh;
    	$data['gioitinh']=$request->khachhang_gioitinh;
    	$data['diachi']=$request->khachhang_diachi;
    	$data['sdt']=$request->khachhang_sdt;
    	$data['email']=$request->khachhang_email;
    	$data['ghichu']=$request->khachhang_ghichu;


    	DB::table('khachhangs')->insert($data);
    	Session::put('message','Thêm khách hàng thành công');
    	return Redirect::to('add-khachhang');
    }

    public function edit_khachhang($khachhang_id){
    	$edit_khachhang=DB::table('khachhang')->where('id',$khachhang_id)->get();
    	$manager_khachhang=view('admin.edit_khachhang')->with('edit_khachhang',$edit_khachhang);

    	return view('admin_layout')->with('admin.edit_khachhang',$manager_khachhang);
    }

    public function update_khachhang(Request $request,$khachhang_id){
    	$data=array();
        $data['tenkh']=$request->input('khachhang_tenkh');
        $data['gioitinh']=$request->input('khachhang_gioitinh');
        $data['diachi']=$request->input('khachhang_diachi');
        $data['sdt']=$request->input('khachhang_sdt');
        $data['email']=$request->input('khachhang_email');
        $data['ghichu']=$request->input('khachhang_ghichu');

    	DB::table('khachhang')->where('id',$khachhang_id)->update($data);
    	Session::put('message','Cập nhật khách hàng thành công');
    	return Redirect::to('all-khachhang');
    }
     public function delete_khachhang($khachhang_id){   
        DB::table('khachhang')->where('id',$khachhanng_id)->delete();
        Session::put('message','Xoá khách hàng thành công');
        return Redirect::to('all-khachhang');
    }
}
