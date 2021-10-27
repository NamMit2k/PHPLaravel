@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                THÊM MỚI TIN TỨC
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
                    <form role="form" action="{{route('tintuc.store')}}" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="tieude" class="form-control" placeholder="">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Trích dẫn</label>
                            <input type="text" name="trichdan" class="form-control"  placeholder="">
                        </div>
 

                        <div>
                            <label>Hinh ảnh</label>
                            <input type="file" name="hinhanh" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Nội dung tin</label>
                            
                            <textarea id="ckeditor_noidungtin" rows="20" class="form-control" name="noidung">
                            </textarea>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Thêm Tin</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection

@section('javas')
    <script src="{{asset('/vendor/select2.min.js')}}"></script>
@endsection


