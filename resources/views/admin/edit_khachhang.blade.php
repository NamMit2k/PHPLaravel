@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật khách hàng
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
                    @foreach($edit_khachhang as $key => $pro)
                    <form role="form" action="{{URL::to('/update-khachhang/'.$pro->id)}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" name="khachhang_tenkh" class="form-control" id="exampleInputEmail1" value="{{$pro->tenkh}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">giới tính</label>
                            <select name="khachhang_gioitinh" class="form-control input-sm m-bot15">                         
                                <option selected="" value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>                        
                            </select>                      
                        </div>
                        <div>
                            <label for="exampleInputEmail1">Địa chỉ</label>
                           <input type="text" name="khachhang_diachi" class="form-control" id="exampleInputEmail1" value="{{$pro->diachi}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="khachhang_sdt" class="form-control" id="exampleInputEmail1" value="{{$pro->sdt}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="khachhang_email" class="form-control" id="exampleInputEmail1" value="{{$pro->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ghi chú</label>
                            <textarea style="resize: none;"rows="5" class="form-control" name="khachhang_ghichu" id="exampleInputPassword1">{{$pro->ghichu}}</textarea>
                        </div>
                              
                        <button type="submit" name="update_product" class="btn btn-info">Cập Nhật khách hàng</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection