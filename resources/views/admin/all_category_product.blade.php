@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách Loại Sản Phẩm
    </div>
     <div style="color: red">
     <?php
       $message=Session::get('message');
       if ($message) {
        echo $message;
        Session::put('message',null);
      }
      ?>
      </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>     
    </div>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên Loại</th>
            <th>Trạng thái</th>
            <th>Ngày Sửa</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
           @php 
          $STT=1;
          @endphp
            @foreach($all_category_product as $key=>$cate_pro)
          <tr>
            <td>{{$STT++}}</td> 
            <td>{{ $cate_pro->tenloai}}</td>
            <td><span class="text-ellipsis">
               <input type="checkbox" name="produc_status" value="{{$cate_pro->trangthai}}" {{$cate_pro->trangthai==1?"checked":""}}>
            </span></td>
            <td><span class="text-ellipsis">{{ $cate_pro->create_at=date("d-m-Y")}}</span></td>
            <td>
                <a href="{{URL::to('/edit-category-product/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-edit"></i></a>
            </td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá loại sp này không?')" href="{{URL::to('/delete-category-product/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-trash-alt"></i></a></td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    <!-- <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên Loại</th>
            <th>Trạng Thái</th>
            <th>Ngày thêm</th>
            <th>Sửa</th>
            <th>Xoá</th>

          </tr>
        </thead>
        <tbody>
           @php 
          $STT=1;
          @endphp
            @foreach($all_category_product as $key=>$cate_pro)
          <tr>
            <td>{{$STT++}}</td> 
            <td>{{ $cate_pro->tenloai}}</td>
            <td><span class="text-ellipsis">
               <input type="checkbox" name="produc_status" value="{{$cate_pro->trangthai}}" {{$cate_pro->trangthai==1?"checked":""}}>
               <!--  <?php
                // if($cate_pro->trangthai==0){
                //     echo "Ẩn";
                // }
                // else{
                //     echo "Hiển thị";
                // }
                ?> 
                
            </span></td>
            <td><span class="text-ellipsis">{{ $cate_pro->create_at=date("d-m-Y")}}</span></td>
            <td>
                <a href="{{URL::to('/edit-category-product/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-edit"></i></a>
            </td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá loại sp này không?')" href="{{URL::to('/delete-category-product/'.$cate_pro->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-trash-alt"></i></a></td>
          </tr>
         @endforeach
        </tbody>
      </table> 
</div> -->
  <!--   <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer> -->
  </div>
</div>
@endsection