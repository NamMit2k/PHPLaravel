@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm nhà nhân viên
            </header>
            <div class="panel-body">
                <div style="color: red">
                   <?php
                   $message=Session::get('message');
                   if ($message) {
                    echo $message;
                    Session::put('message',null);
                }
                ?>
            </div>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-nhanvien')}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" name="nhanvien_tennv" class="form-control" id="exampleInputEmail1" placeholder="Tên nhân viên">
                        </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1">Chức vụ</label>
                            <input type="text" name="nhanvien_chucvu" class="form-control" id="exampleInputEmail1" placeholder="Nhập chức vụ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="nhanvien_diachi" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="nhanvien_sodienthoai" class="form-control" id="exampleInputEmail1" placeholder="Nhập sdt">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="nhanvien_email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email">
                        </div>
                        
                        <button type="submit" name="add_nhanvien" class="btn btn-info">Thêm nhân viên</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection