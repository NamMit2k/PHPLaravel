@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
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
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại</label>
                            <select name="product_loaisp" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key=>$cate)
                                <option value="{{$cate->id}}">{{$cate->tenloai}}</option>
                                @endforeach
                        
                            </select>
                           <!--  <input type="text" name="product_loaisp" class="form-control" id="exampleInputEmail1" placeholder="Tên loại sản phẩm"> -->
                        </div>
                        <div>
                            <label for="exampleInputEmail1">Image</label>
                            <!--  <input type="text" ng-model="Image" class="form-control" id="anh" /> -->
                           <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text" name="product_xuatxu" class="form-control" id="exampleInputEmail1" placeholder="xuất xứ sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán</label>
                            <input type="text" name="product_giaban" class="form-control" id="exampleInputEmail1" placeholder="xuất xứ sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng</label>
                            <input type="number" name="product_soluong" id="sl" min="1" value="1" max="500" style="width:100px;height: 30px;" id="number-buying">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none;"rows="5" class="form-control" name="product_mota" id="ckeditor_noidungtin" placeholder="mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">ẩn</option>
                                <option value="1">hiện</option>

                            </select>
                        </div>                               
                        <button type="submit" name="add_product" class="btn btn-info">Thêm loại</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection