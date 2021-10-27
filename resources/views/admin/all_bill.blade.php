@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Quản Lý Đơn Hàng
    </div>
     <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3" style="z-index: 100000; margin-left:260px">
        <a href="{{route('previewExport')}}" class="btn btn-default" style="width: 50px;   position: absolute; right: 100px" title="Xuất PDF">
            <i class="fas fa-file-export"></i>
        </a>
      </div>
      <div class="col-sm-3" style="z-index: 100000; margin-left:700px">
        <a href="{{route('thongke')}}" class="btn btn-default" style="width: 50px;   position: absolute; right: 100px" title="Thống kê">
            <i class="fas fa-book-reader"></i>
        </a>
      </div>
    </div>

      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
             <th>STT</th>
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Phương thức thanh toán</th>
            <th>Ghi chú</th>
            <th>Chi tiết</th>

          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
            @foreach($all_bill as $key=>$item)
            <tr>    
            <td>{{$STT++}}</td>
            @foreach($khachhang as $key => $val)
              @if($item->makh == $val->id)
                <td>{{ $val->tenkh}}</td>
              @endif
            @endforeach

            <td style="color: red; text-align: right;">{{number_format($item->tongtien).'vnd'}}</td>
            <td>{{$item->ngayban}}</td>
            <td>{{$item->ptthanhtoan}}</td>
            <td>{{ $item->ghichu}}</td>
            
            <td>
                <a href="{{route('bill',[$item->id])}}" class="active styling-edit" ui-toggle-class=""><i class="far fa-eye"></i></a>
            </td>
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
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Phương thức thanh toán</th>
            <th>Ghi chú</th>
            <th>Chi tiết</th>

          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
            @foreach($all_bill as $key=>$item)
            <tr>    
            <td>{{$STT++}}</td>
            @foreach($khachhang as $key => $val)
              @if($item->makh == $val->id)
                <td>{{ $val->tenkh}}</td>
              @endif
            @endforeach

            <td style="color: red; text-align: right;">{{$item -> tongtien}}</td>
            <td>{{$item->ngayban}}</td>
            <td>{{$item->ptthanhtoan}}</td>
            <td>{{ $item->ghichu}}</td>
            
            <td>
                <a href="{{ route('bill',[$item->id]) }}" class="active styling-edit" ui-toggle-class="">Xem</a>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div> -->
   
  </div>
</div>
@endsection