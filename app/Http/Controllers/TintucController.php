<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\tintucs;
use App\Models\loaitins;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;
session_start();

class TintucController extends Controller
{
    public function index(){
		$dsTinTuc=DB::table('tintucs')->get();
        $loaitins=DB::table('loaitins')->get();
        $manager_product=view('admin.tintuc.index')->with('dsTinTuc',$dsTinTuc)->with('loaitins',$loaitins);

        return view('admin_layout')->with('admin.tintuc.index',$manager_product);
	}

	public function create(){
		$loaitins=DB::table('loaitins')->get();
		return view('admin.tintuc.add', compact('loaitins'));
	}

	public function store(Request $request){
		$data=array();
        $data['tieude']=$request->tieude;
        $data['maloaitin']=$request->maloaitin;   
        $data['trichdan']=$request->trichdan;
        $data['noidung']=$request->noidung;
        $data['hinhanh']=$request->hinhanh;

        $get_image=$request->file('hinhanh');

        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));//dùng để phân tách tên ảnh vd nga.jpg=nga jpg
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//tên ảnh.số từ 0->.jpg hoặc png
            $get_image->move('public/frontend/anhtintuc',$new_image);//cho ảnh vào file product
            $data['hinhanh']=$new_image;
            DB::table('tintucs')->insert($data);
        Session::put(' message','Thêm thành công');
        return Redirect::to('tintuc/create');
        }
        $data['hinhanh']='';
        DB::table('tintucs')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('tintuc/create');
	}

    public function edit_tintuc($tintuc_id){
        $loaitins=DB::table('loaitins')->orderby('id','desc')->get();
        $edit_tintuc=DB::table('tintucs')->where('id',$tintuc_id)->get();
        $manager_tintuc=view('admin.tintuc.edit')->with('edit_tintuc',$edit_tintuc)->with('loaitins',$loaitins);
        return view('admin_layout',compact('loaitins'))->with('admin.tintuc.exit',$manager_tintuc);
    }

    public function update_tintuc(Request $request,$tintuc_id){
        $data=array();
        $data['tieude']=$request->tieude;
        $data['maloaitin']=$request->maloaitin;   
        $data['trichdan']=$request->trichdan;
        $data['noidung']=$request->noidung;
        $data['hinhanh']=$request->hinhanh;

        $get_image=$request->file('hinhanh');

        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));//dùng để phân tách tên ảnh vd nga.jpg=nga jpg
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//tên ảnh.số từ 0->.jpg hoặc png
            $get_image->move('public/frontend/anhtintuc',$new_image);//cho ảnh vào file product
            $data['hinhanh']=$new_image;
            DB::table('tintucs')->where('id',$tintuc_id)->update($data);
        Session::put(' message','Cập nhật thành công');
        return Redirect::to('all-tintuc');
        }

        DB::table('tintucs')->where('id',$tintuc_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-tintuc');
    }
    public function delete_tintuc($tintuc_id){
        DB::table('tintucs')->where('id',$tintuc_id)->delete();
        Session::put('message','Xoá tin tức thành công');
        return Redirect::to('all-tintuc');
    }
}
