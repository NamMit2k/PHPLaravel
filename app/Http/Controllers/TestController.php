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
use App\Models\TestModel;

class TestController extends Controller
{
    public function getdata()
    {
    	//khái báo biến bằng Db select đến bảng và lấy dữ liệu
    	$data=DB::table('loaisanpham')->get();
    	//trả dữ liệu về view getdata với biến là data xong bên view gọi lại tên biến này vào vong foreach
    	return view('viewdata',compact('data'));
    }
    public function Index()
    {
    	$data=DB::table('loaisanpham')->get();
    	//limit là số lượng sản phẩm lấy ra view
    	$sanpham=DB::table('sanpham')->limit(8)->get();
    	//trả dữ liệu về view getdata với biến là data xong bên view gọi lại tên biến này vào vong foreach
    	return view('viewdata',compact('data','sanpham'));
    }

}
