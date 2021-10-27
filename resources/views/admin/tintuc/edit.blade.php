@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật tin tức
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
                    @foreach($edit_tintuc as $key => $pro)
                    <form role="form" action="{{URL::to('/update-tintuc/'.$pro->id)}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại tin</label>
                            <select name="maloaitin" class="form-control input-sm m-bot15">
                                @foreach($loaitins as $key=>$loai)
                                <option value="{{$loai->id}}">{{$loai->tenloai}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" name="tieude" value="{{$pro->tieude}}" class="form-control" placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Trích dẫn</label>
                            <input type="text" name="trichdan" value="{{$pro->trichdan}}" class="form-control"  placeholder="">
                        </div>

                        <div>
                            <label>Hinh ảnh</label>
                            <input type="file" name="hinhanh" value="{{$pro->hinhanh}}" class="form-control" >
                             <img src="{{URL::to('public/frontend/anhtintuc/'.$pro->hinhanh)}}" height="100" width="100">
                        </div>

                        <div class="form-group">
                            <label>Nội dung tin</label>
                            <textarea style="resize: none" rows="20" class="form-control" name="noidung" id="ckeditorpro1" placeholder="Nội dung sản phẩm">{{$pro->noidung }} </textarea>
                            <!-- <textarea id="ckeditor_noidungtin" rows="20" class="form-control" name="noidung" value="{{$pro->noidung}}"> -->
                            </textarea>
                        </div>                              
                        <button type="submit" name="update_tintuc" class="btn btn-info">Cập Nhật Sản Phẩm</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
</div>
@endsection