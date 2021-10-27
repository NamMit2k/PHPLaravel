@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý nhà cung cấp
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
            <th>Tên nhà cung cấp</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày thêm</th>
            <th>Sửa</th>
            <th>Xoá</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
            @foreach($all_nhacungcap as $key=>$kh)
          <tr>    
          <td>{{$STT++}}</td>          
            <td>{{ $kh->tenncc}}</td>
            <td>{{ $kh->diachi}}</td>
            <td>{{ $kh->sodienthoai}}</td>
            <td><span class="text-ellipsis">{{$kh->create_at=date("d-m-Y")}}</span></td>
             <td>
                <a href="{{URL::to('/edit-nhacungcap/'.$kh->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-edit"></i></a>
            </td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sp này không?')" href="{{URL::to('/delete-nhacungcap/'.$kh->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-trash-alt"></i></a></td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection