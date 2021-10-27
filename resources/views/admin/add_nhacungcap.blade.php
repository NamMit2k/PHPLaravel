@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm nhà cung cấp
            </header>
            <div class="panel-body">
                <?php
                $message=Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message',null);
                }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-nhacungcap')}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                            <input type="text" name="nhacungcap_tenncc" class="form-control" id="exampleInputEmail1" placeholder="Tên nhà cung cấp">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="nhacungcap_diachi" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="nhacungcap_sodienthoai" class="form-control" id="exampleInputEmail1" placeholder="Nhập sdt">
                        </div>
                        
                        <button type="submit" name="add_product" class="btn btn-info">Thêm NCC</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection