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
class NhaCungCapController extends Controller
{
   public function add_nhacungcap(){
    	return view('admin.add_nhacungcap');
    }
    public function all_nhacungcap(){

    	$all_nhacungcap=DB::table('nhacungcap')->get();
    	$manager_nhacungcap=view('admin.all_nhacungcap')->with('all_nhacungcap',$all_nhacungcap);

    	return view('admin_layout')->with('admin.all_nhacungcap',$manager_nhacungcap);
    }
    public function save_nhacungcap(Request $request){
    	$data=array();
    	$data['tenncc']=$request->nhacungcap_tenncc;
    	$data['diachi']=$request->nhacungcap_diachi;
    	$data['sodienthoai']=$request->nhacungcap_sodienthoai;
    	$data['create_at']=$request->nhacungcap_create_at;
    
    	DB::table('nhacungcap')->insert($data);
    	Session::put('message','Thêm nhà cung cấp thành công');
    	return Redirect::to('add-nhacungcap');
    }

    public function edit_nhacungcap($nhacungcap_id){
    	$edit_nhacungcap=DB::table('nhacungcap')->where('id',$nhacungcap_id)->get();
    	$manager_nhacungcap=view('admin.edit_nhacungcap')->with('edit_nhacungcap',$edit_nhacungcap);

    	return view('admin_layout')->with('admin.edit_nhacungcap',$manager_nhacungcap);
    }

    public function update_nhacungcap(Request $request,$nhacungcap_id){
    	$data=array();
        $data['tenncc']=$request->input('nhacungcap_tenncc');
        $data['diachi']=$request->input('nhacungcap_diachi');
        $data['sodienthoai']=$request->input('nhacungcap_sodienthoai');
        $data['create_at']=$request->input('nhacungcap_create_at');
    
    	DB::table('nhacungcap')->where('id',$nhacungcap_id)->update($data);
    	Session::put('message','Cập nhật nhà cung cấp thành công');
    	return Redirect::to('all-nhacungcap');
    }
     public function delete_nhacungcap($nhacungcap_id){   
        DB::table('nhacungcap')->where('id',$nhacungcap_id)->delete();
        Session::put('message','Xoá nhà cung cấp thành công');
        return Redirect::to('all-nhacungcap');
    }
}
