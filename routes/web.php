<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend(các trang chủ)
// /getdat là đường link mai sau dạng Localhost:8000/Tenproject/getdata
// Testcontroller@index là vào controller Test xong chọn function .... để return ra dlieu
Route::get('/getloai','App\Http\Controllers\TestController@getdata');

Route::get('/Index','App\Http\Controllers\TestController@Home');

Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/chi-tiet/{id}','App\Http\Controllers\HomeController@chitiet');
Route::get('/lien-he','App\Http\Controllers\HomeController@lienhe');

Route::get('/blogs','App\Http\Controllers\HomeController@tintuc');

//chi tiết tin tức
Route::get('/single-blog/{id}',[
    'as'=>'home.single-blog',
    'uses' => 'App\Http\Controllers\HomeController@single_blog'
]);
//Filter lọc ds sản phẩm theo loại

Route::get('/filter/{maloai}',[
	'as' => 'Home.filter',
	'uses' => 'App\Http\Controllers\HomeController@filter'
]);
Route::get('/Home/{maloai}',[
	'as' => 'Home',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);
// Route::get('/Index','App\Http\Controllers\HomeController@Home');
//tìm kiếm
Route::get('/search',[
    'as' => 'Home.search',
    'uses' => 'App\Http\Controllers\HomeController@search'
]);
//bill
Route::get('/bill-detail',[
   	'as'=>'bill-detail',
    'uses' => 'App\Http\Controllers\DathangController@getCheckOut'
]);

Route::post('/bill-detail',[
    'as'=>'bill-detail',
    'uses' => 'App\Http\Controllers\DathangController@postCheckOut'
]);
// Admin quan li hoa don
Route::get('/all_bill','App\Http\Controllers\AdminHoaDonController@all_bill');


Route::get('/thongke', [
   'as' => 'thongke',
   'uses' => 'App\Http\Controllers\AdminHoaDonController@thongke'
]);

Route::get('/export', [
   'as' => 'export',
   'uses' => 'App\Http\Controllers\AdminHoaDonController@exportToPDF'
   // $pdf=PDF::loadView('export');
   // return $pdf->download('export.pdf');
]);

Route::get('/previewExport', [
    'as' => 'previewExport',
    'uses' => 'App\Http\Controllers\AdminHoaDonController@previewExport'
]);


Route::get('/bill/{id}',[
    'as' => 'bill',
    'uses' => 'App\Http\Controllers\AdminHoaDonController@bill_detail'   
]);




//backend(bên trang admin)
Route::get('/admin','App\Http\Controllers\AdminController@index');
//trang quản lý admin
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin_dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');

// Admin quan li hoa don
Route::get('/all_bill','App\Http\Controllers\AdminHoaDonController@all_bill');

Route::get('/bill/{id}',[
    'as' => 'bill',
    'uses' => 'App\Http\Controllers\AdminHoaDonController@bill_detail'   
]);

//danh mục sản phẩm
Route::get('/add-category-product','App\Http\Controllers\DanhmucsanphamController@add_category_product');
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\DanhmucsanphamController@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\DanhmucsanphamController@delete_category_product');

Route::get('/all-category-product','App\Http\Controllers\DanhmucsanphamController@all_category_product');

Route::post('/save-category-product','App\Http\Controllers\DanhmucsanphamController@save_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\DanhmucsanphamController@update_category_product');

// sản phẩm
Route::get('/add-product','App\Http\Controllers\AdminSanPhamController@add_product');
Route::get('/edit-product/{product_id}','App\Http\Controllers\AdminSanPhamController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\AdminSanPhamController@delete_product');

Route::get('/all-product','App\Http\Controllers\AdminSanPhamController@all_product');

Route::post('/save-product','App\Http\Controllers\AdminSanPhamController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\AdminSanPhamController@update_product');

//khách hàng
Route::get('/add-khachhang','App\Http\Controllers\AdminKhachHangController@add_khachhang');
Route::get('/edit-khachhang/{khachhang_id}','App\Http\Controllers\AdminKhachHangController@edit_khachhang');
Route::get('/delete-khachhang/{khachhang_id}','App\Http\Controllers\AdminKhachHangController@delete_khachhang');

Route::get('/all-khachhang','App\Http\Controllers\AdminKhachHangController@all_khachhang');

Route::post('/save-khachhang','App\Http\Controllers\AdminKhachHangController@save_khachhang');
Route::post('/update-khachhang/{khachhang_id}','App\Http\Controllers\AdminKhachHangController@update_khachhang');

//nhà cung cấp
Route::get('/add-nhacungcap','App\Http\Controllers\NhaCungCapController@add_nhacungcap');
Route::get('/edit-nhacungcap/{nhacungcap_id}','App\Http\Controllers\NhaCungCapController@edit_nhacungcap');
Route::get('/delete-nhacungcap/{nhacungcap_id}','App\Http\Controllers\NhaCungCapController@delete_nhacungcap');

Route::get('/all-nhacungcap','App\Http\Controllers\NhaCungCapController@all_nhacungcap');

Route::post('/save-nhacungcap','App\Http\Controllers\NhaCungCapController@save_nhacungcap');
Route::post('/update-nhacungcap/{nhacungcap_id}','App\Http\Controllers\NhaCungCapController@update_nhacungcap');

//nhân viên
Route::get('/add-nhanvien','App\Http\Controllers\AdminNhanVienController@add_nhanvien');
Route::get('/edit-nhanvien/{nhanvien_id}','App\Http\Controllers\AdminNhanVienController@edit_nhanvien');
Route::get('/delete-nhanvien/{nhanvien_id}','App\Http\Controllers\AdminNhanVienController@delete_nhanvien');

Route::get('/all-nhanvien','App\Http\Controllers\AdminNhanVienController@all_nhanvien');

Route::post('/save-nhanvien','App\Http\Controllers\AdminNhanVienController@save_nhanvien');
Route::post('/update-nhanvien/{nhanvien_id}','App\Http\Controllers\AdminNhanVienController@update_nhanvien');
//giohang
Route::prefix('cart')->group(function () {
    Route::get('view','App\Http\Controllers\giohangController@view')->name('giohang.view');
    Route::get('add_cart/{id}','App\Http\Controllers\giohangController@add')->name('giohang.add');
    Route::get('remove/{id}','App\Http\Controllers\giohangController@remove')->name('giohang.remove');
	Route::get('update/{id}','App\Http\Controllers\giohangController@update')->name('giohang.update');
	Route::get('clear','App\Http\Controllers\giohangController@clear')->name('giohang.clear');
});


//tin tức
Route::prefix('tintuc')->group(function(){
    Route::get('/',[
        'as'=>'tintuc.index',
        'uses'=>'App\Http\Controllers\TintucController@index'
    ]);

    Route::get('/create',[
        'as'=>'tintuc.create',
        'uses' => 'App\Http\Controllers\TintucController@create'
    ]);

    Route::post('/store',[
        'as'=>'tintuc.store',
        'uses' => 'App\Http\Controllers\TintucController@store'
    ]);
});

Route::get('/edit-tintuc/{tintuc_id}','App\Http\Controllers\TintucController@edit_tintuc');
Route::get('/delete-tintuc/{tintuc_id}','App\Http\Controllers\TintucController@delete_tintuc');
Route::post('/update-tintuc/{tintuc_id}','App\Http\Controllers\TintucController@update_tintuc');
Route::get('/all-tintuc','App\Http\Controllers\TintucController@index');
//cart
Route::post('/save-cart','App\Http\Controllers\giohangController@save_cart');
