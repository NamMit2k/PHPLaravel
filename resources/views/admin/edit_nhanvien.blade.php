@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhân viên
            </header>
            <div class="panel-body" style="color: red">
                <?php
                $message=Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message',null);
                }
                ?>
                <div class="position-center">
                    @foreach($edit_nhanvien as $key => $pro)
                    <form role="form" action="{{URL::to('/update-nhanvien/'.$pro->id)}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên</label>
                            <input type="text" name="nhanvien_tennv" class="form-control" id="exampleInputEmail1" value="{{$pro->tennv}}">
                        </div>
                       <div class="form-group">
                            <label for="exampleInputPassword1">Chức vụ</label>
                            <input type="text" name="nhanvien_chucvu" class="form-control" id="exampleInputEmail1" value="{{$pro->chucvu}}">
                        </div>
                        <div>
                            <label for="exampleInputEmail1">Địa chỉ</label>
                           <input type="text" name="nhanvien_diachi" class="form-control" id="exampleInputEmail1" value="{{$pro->diachi}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="nhanvien_sodienthoai" class="form-control" id="exampleInputEmail1" value="{{$pro->sodienthoai}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="nhanvien_email" class="form-control" id="exampleInputEmail1" value="{{$pro->email}}">
                        </div>
                      
                              
                        <button type="submit" name="update_nhanvien" class="btn btn-info">Cập Nhật nhân viên</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection