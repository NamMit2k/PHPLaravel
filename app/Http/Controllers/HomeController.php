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
class HomeController extends Controller
{
	public function index(){
    	//khái báo biến bằng Db select đến bảng và lấy dữ liệu
		$loaisanpham=DB::table('loaisanpham')->where('trangthai','0')->orderby('id','desc')->get();//GIẢM dần theo id
		$product=DB::table('sanpham')->orderby('id','desc')->limit(24)->get();
    	//trả dữ liệu về view getdata với biến là data xong bên view gọi lại tên biến này vào vong foreach
    	 $sanphammoi=DB::table('sanpham')->where('trangthai','0')->orderby('id','desc')->limit(3)->get();//hiển thị sp mới nhất
    	 $sanphammoi1=DB::table('sanpham')->where('trangthai','0')->orderby('id','asc')->limit(3)->get();
         $tintucm=DB::table('tintucs')->orderby('id','desc')->limit(3)->get();//hiển thị sp mới nhất
    	 // $sanphams = DB::table('sanpham')->where('loaisp', $id)->get();
         //trả dữ liệu về view Home với biến là loaisp,.. xong bên view gọi lại tên biến này vào vòng foreach
    	 return view('Home',compact('loaisanpham','product','sanphammoi','sanphammoi1','tintucm'));
    	}
    	public function chitiet($id)
    	{
    		$loaisanpham=DB::table('loaisanpham')->where('trangthai','0')->orderby('id','desc')->get();
    		$data=DB::table('sanpham')->where('sanpham.id',$id)->get();

    		foreach ($data as $key => $value){
    			$category_id=$value->id;
    		} 
          
    		// $related_product=DB::table('sanpham')->join('loaisanpham','loaisanpham.id','=','sanpham.id')->where('loaisanpham.id',$category_id)->whereNotIn('sanpham.id',[$id])->get();
            
            //truy vấn đến bảng sản phẩm là so sanh mã sản phẩm nào trùng với id truyền vào thì lấy dlieu ra ok
            $related_product=DB::table('sanpham')->where('sanpham.id',[$id])->get();
    		return view('chitiet',compact('data','loaisanpham'))->with('relate',$related_product);
    	}
        //lọc theo loại sp
    	public function filter($maloai){
    		$loaisanpham=DB::table('loaisanpham')->where('trangthai','0')->orderby('id','desc')->get();
            $sanphammoi=DB::table('sanpham')->where('trangthai','0')->orderby('id','desc')->limit(3)->get();//hiển thị sp mới nhất
            $sanphammoi1=DB::table('sanpham')->where('trangthai','0')->orderby('id','asc')->limit(3)->get();
            $sanphams = DB::table('sanpham')->where('loaisp', $maloai)->get();
            return view('filter', compact('loaisanpham', 'sanphams','sanphammoi','sanphammoi1'));
        }

        public function search() {
            //khai báo 1 biến = từ khóa truyền vào
            $tukhoa = $_GET['tukhoa'];
             $sanphammoi=DB::table('sanpham')->where('trangthai','0')->orderby('id','desc')->limit(3)->get();//hiển thị sp mới nhất
            $sanphammoi1=DB::table('sanpham')->where('trangthai','0')->orderby('id','asc')->limit(3)->get();
            $loaisanpham = DB::table('loaisanpham')->get();
            //truy vân đến bảng snar phẩm lấy sản phẩm có tên giống gần đúng với từ khóa nhập vào
            $sanphams = DB::table('sanpham')->where('tensp','LIKE', '%'.$tukhoa.'%')->get();
            //compact là để trả dữ liệu biến đó về bên view
            return view('search', compact('loaisanpham', 'sanphams','sanphammoi','sanphammoi1'));
        }
        public function tintuc(){
            $loaisanpham = DB::table('loaisanpham')->get();
            $tintucs = DB::table('tintucs')->latest()->paginate(4);
            $tintucm=DB::table('tintucs')->orderby('id','desc')->limit(3)->get();//hiển thị sp mới nhất
            $sale=DB::table('sanpham')->orderBy('giaban','ASC')->limit(10)->get();//tin tức home
            return view('tintuc', compact('tintucs','loaisanpham','tintucm'));
        }


        public function single_blog($id){
            $loaisanpham= DB::table('loaisanpham')->get();
            // chọn tin tức có mã = tham số 'id'
            $single = DB::table('tintucs')->where('id', $id)->get();//chi tiết tin tức
            $tintucs = DB::table('tintucs')->latest()->get();
             $tintucm=DB::table('tintucs')->orderby('id','desc')->limit(3)->get();//hiển thị sp mới nhất
            return view('single-blog', compact('tintucs','loaisanpham','single','tintucm'));
        }

       public function lienhe(){
        $loaisanpham= DB::table('loaisanpham')->get();
        return view('lienhe',compact('loaisanpham'));
       }

    }
