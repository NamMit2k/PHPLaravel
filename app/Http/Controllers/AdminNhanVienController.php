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

class AdminNhanVienController extends Controller
{
     public function add_nhanvien(){
    	return view('admin.add_nhanvien');
    }
    public function all_nhanvien(){

    	$all_nhanvien=DB::table('nhanvien')->get();
    	$manager_nhanvien=view('admin.all_nhanvien')->with('all_nhanvien',$all_nhanvien);

    	return view('admin_layout')->with('admin.all_nhanvien',$manager_nhanvien);
    }
    public function save_nhanvien(Request $request){
    	$data=array();
    	$data['tennv']=$request->nhanvien_tennv;
    	$data['chucvu']=$request->nhanvien_chucvu;
    	$data['diachi']=$request->nhanvien_diachi;
    	$data['sodienthoai']=$request->nhanvien_sodienthoai;
    	$data['email']=$request->nhanvien_email;
       
    	DB::table('nhanvien')->insert($data);
    	Session::put('message','Thêm nhân viên thành công');
    	return Redirect::to('add-nhanvien');
    }

    public function edit_nhanvien($nhanvien_id){
    	$edit_nhanvien=DB::table('nhanvien')->where('id',$nhanvien_id)->get();
    	$manager_nhanvien=view('admin.edit_nhanvien')->with('edit_nhanvien',$edit_nhanvien);

    	return view('admin_layout')->with('admin.edit_nhanvien',$manager_nhanvien);
    }

    public function update_nhanvien(Request $request,$nhanvien_id){
    	$data=array();
        $data['tennv']=$request->input('nhanvien_tennv');
    	$data['chucvu']=$request->input('nhanvien_chucvu');
    	$data['diachi']=$request->input('nhanvien_diachi');
    	$data['sodienthoai']=$request->input('nhanvien_sodienthoai');
    	$data['email']=$request->input('nhanvien_email');
       
    	DB::table('nhanvien')->where('id',$nhanvien_id)->update($data);
    	Session::put('message','Cập nhật nhân viên thành công');
    	return Redirect::to('all-nhanvien');
    }
     public function delete_nhanvien($nhanvien_id){   
        DB::table('nhanvien')->where('id',$nhanvien_id)->delete();
        Session::put('message','Xoá nhân viên thành công');
        return Redirect::to('all-nhanvien');
    }
}
