<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\giohang\cart;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;
use App\Models\SanphamModel;


class giohangController extends Controller
{
	public function view()
    {
    	$loaisanpham=DB::table('loaisanpham')->where('trangthai','0')->orderby('id','desc')->get();
        return view('cart',compact('loaisanpham'));
    }
     
    public function add(cart $cart ,$id)
    {
        //khai báo biến product= truy vấn đến bảng sp và timf sp có id= id cần tìm
    	$product=DB::table('sanpham')->find($id);
        //khai báo biến cart -> hàm addcart với dữ liệu từ biến product
        $cart -> addCart($product);
        return redirect()->back();
        //dd($product);

    }

    public function remove(cart $cart ,$id)
    {
        //thực thi xóa sp trong giỏ mà sp đó có id= id nhập vào
        $cart -> remove($id);       
        return redirect()->back();
    }

    public function update(cart $cart, $id)
    {
        //khai báo biến quantity= request lấy về số lương sp
        $quantity = request()->quantity ? request()->quantity : 1;
        //update sp trong giỏ có id=id truyền vào và với số lượng mới
        $cart->update($id, $quantity);
        return redirect()->back();
    }


   public function clear(cart $cart)
    {
        $cart -> clear();
        return redirect()->back();
    }
    // public function save_cart(Request $request)
    // {
    //   $productId=$request->productid_hidden;
    //   $quantity=$request->qty;
    //   $data=DB::table('sanpham')->where('id',$productId)->get();
    //   $cate_product=DB::table('loaisanpham')->where('trangthai','0')->orderby('id','desc')->get();
    //   return view('cart')->with('loaisanpham',$cate_product);
    // }
     
}
