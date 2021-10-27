@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhà cung cấp
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
                    @foreach($edit_nhacungcap as $key => $pro)
                    <form role="form" action="{{URL::to('/update-nhacungcap/'.$pro->id)}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                            <input type="text" name="nhacungcap_tenncc" class="form-control" id="exampleInputEmail1" value="{{$pro->tenncc}}">
                        </div>
                       <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="nhacungcap_diachi" class="form-control" id="exampleInputEmail1" placeholder="Nhập địa chỉ" value="{{$pro->diachi}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="nhacungcap_sodienthoai" class="form-control" id="exampleInputEmail1" placeholder="Nhập sdt" value="{{$pro->sodienthoai}}">
                        </div>
                              
                        <button type="submit" name="update_nhacungcap" class="btn btn-info">Cập Nhật NCC</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection