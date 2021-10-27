<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khachhang;
use App\giohang\cart;
use App\Models\hoadonban;
use App\Models\cthdb;
use DB;
use Session;

class DathangController extends Controller
{
   public function __construct(khachhang $khachhang, hoadonban $hoadonban, cthdb $cthdb)
    {
        $this->khachhang = $khachhang;
        $this->hoadonban = $hoadonban;
        $this->cthdb = $cthdb;
    }
    //gọi giao diện đặt hàng
    public function getCheckOut(){
    	$loaisanpham = DB::table('loaisanpham')->get();
    	return view("dathang", compact('loaisanpham'));
    }
    //submit dữ liệu đơn hàng,khách hàng
    public function postCheckOut(Request $request){
        // khai bào biến cart= dữ liệu từ session cart
        $cart = Session::get('cart');

		$khachhang = new khachhang;
        $khachhang->tenkh = $request->tenkh;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->email = $request->email;
        $khachhang->diachi = $request->diachi;
        $khachhang->sdt = $request->sdt;
        $khachhang->ghichu = $request->ghichu;
		
		$khachhang->save();

		$hoadonban = new hoadonban;
        $hoadonban->makh = $khachhang->id;
        $hoadonban->ngayban = date('Y-m-d');
        $hoadonban->tongtien = $request->totalBill;
        $hoadonban->ptthanhtoan = $request->ptthanhtoan;
        $hoadonban->ghichu = $request->ghichu;
        
        $hoadonban->save();

        //duyệt tất cả sp trong biến cart(là sp trong giỏ hàng)
        foreach ($cart as $key => $value){
            $cthdb = new cthdb;
            //thì cũng là lưu dữ liệu các trường trong csdl= dữ liệu trong vòng lặp foreach với id bang hóa đơn được sinh ra ở trên            
            $cthdb->mahdb = $hoadonban->id;
            $cthdb->masp = $key;
            $cthdb->soluong = $value['quantity'];
            $cthdb->dongia = $value['price'];
            $cthdb->save();
        }


        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }
}
