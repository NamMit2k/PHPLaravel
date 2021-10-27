@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý khách hàng
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
            <th>Tên Khách Hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>Ngày thêm</th>
            <th>Sửa</th>
            <th>Xoá</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
            @foreach($all_khachhang as $key=>$kh)
          <tr>    
          <td>{{$STT++}}</td>          
            <td>{{ $kh->tenkh}}</td>
            <td>{{ $kh->gioitinh}}</td>
            <td>{{ $kh->diachi}}</td>
            <td>{{ $kh->sdt}}</td>
            <td>{{ $kh->email}}</td>
            <td>{{ $kh->ghichu}}</td>
            <td><span class="text-ellipsis">{{$kh->created_at=date("d-m-Y")}}</span></td>
             <td>
                <a href="{{URL::to('/edit-khachhang/'.$kh->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-edit"></i></a>
            </td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sp này không?')" href="{{URL::to('/delete-khachhang/'.$kh->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-trash-alt"></i></a></td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection