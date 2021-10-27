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
use Barryvdh\DomPDF\Facade as PDF;

session_start();

class AdminHoaDonController extends Controller
{
     public function all_bill(){
        $all_bill=DB::table('hoadonbans')->get();
        $khachhang=DB::table('khachhangs')->get();
        $manager_bill=view('admin.all_bill')->with('all_bill',$all_bill)->with('khachhang',$khachhang);
        return view('admin_layout')->with('admin.all_bill',$manager_bill);
    }


     //Thống kê các chỉ số (số lượng hóa đơn, tổng doanh thu, lời nhuận, tăng trưởng, ...)
    public function thongke(){
        //Lây về các bản ghi của hóa đơn
        $all_bill=DB::table('hoadonbans')->get();
        // đến sl bản ghi
         $countBills = count($all_bill);

         //các cái này tương tự
        $kh=DB::table('khachhangs')->get();
        $sp=DB::table('sanpham')->get();
       
        $countCustomers = count($kh);
        $countProducts = count($sp);
        $khachhang=DB::table('khachhangs')->get();
        $sum = DB::table('hoadonbans')->sum('tongtien');//tính  tổng doanh thu
        return view('admin.thongke', compact('all_bill', 'khachhang', 'sum', 'countBills', 'countCustomers', 'countProducts'));
    }


    // lấy ra chi tiết hóa đơn bán
    public function bill_detail($id){
        //truy vấn đến bang cthd lấy về ctiet hoa đơn có id hóa đơn= id truyền vào
        $list = DB::table('cthdbs')->where('mahdb', $id)->get();
        $sanpham=DB::table('sanpham')->get();        
        $manager_billD=view('admin.bill_detail')->with('sanpham', $sanpham)->with('list', $list);
        // $khachhang=DB::table('khachhangs')->get();
        // $manager_bill=view('admin.all_bill')->with('list',$list)->with('khachhang',$khachhang);
        return view('admin_layout')->with('admin.bill_detail', $manager_billD);
    }

    //Xem trước báo cáo
    public function previewExport(){
        $all_bill=DB::table('hoadonbans')->get();
        $khachhang=DB::table('khachhangs')->get();
        $sum = DB::table('hoadonbans')->sum('tongtien');
        return view('admin.preview-export', compact('all_bill', 'khachhang', 'sum'));
    }

    //Xuất báo cáo định dạng PDF
    public function exportToPDF(){
        $all_bill=DB::table('hoadonbans')->get();
        $khachhang=DB::table('khachhangs')->get();
        //truy vấn bảng hoa đơn và tinh tông tiền tất cả các hóa đơn theo trương tông tiềnư
        $sum = DB::table('hoadonbans')->sum('tongtien');
        $pdf = PDF::loadView('admin.preview-export', compact('all_bill', 'khachhang', 'sum'));
        $filename = random_int(1, 100000);
        return $pdf->download('ListBill'.$filename.'.pdf');
    }
}
