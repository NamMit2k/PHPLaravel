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

class AdminController extends Controller
{
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard()
    {
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);

    	$result=DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first(); //lấy ra email và password trong csdl
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('dashboard');

    	}
    	else{
    		Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại!');
    		return Redirect::to('/admin');
    	}

    }
    // public function filter_by_date(Request,$request){
    //     $data=$request->all();//lấy tất cả các dữ liệu 
    //     $from_date=$data['from_date'];
    //     $to_date=$data['to_date'];
    //     $get=Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
    //     foreach ($get as $key => $val) {
    //         $chart_data[]=array(
    //             'period'=>$val->order_date,
    //             'order'=>$val->total_order,
    //             'sales'=>$val->sales,
    //             'profit'=>$val->profit,
    //             'quantity'=>$val->quantity
    //         );
    //     }
    //     echo $data=json_encode($chart_data);
    // }
    public function logout(){
    	Session::put('admin_name',null);
    		Session::put('admin_id',null);
    		return Redirect::to('/admin');
    }
}
