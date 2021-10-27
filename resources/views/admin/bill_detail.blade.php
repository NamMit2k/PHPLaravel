@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Chi tiết đơn hàng:
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
    </div>

     <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 50px">STT</th>
            <th style="width: 100px">Sản phẩm</th>
            <th></th>
            <th style="width: 10%">Đơn giá</th>
            <th style="width: 10%">Số lượng</th>
            <th style="width: 10%">Thành tiền</th>

          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
          @foreach($list as $item)
          <tr>
            <td>{{$STT++}}</td>
            <td>
              @foreach($sanpham as $key => $val)
              @if($item->masp == $val->id)
              <img src="{{URL::to('/public/frontend/image/'.$val->image)}}" style="width:100px;height:100px" />

              @endif
              @endforeach
              <td>{{$val->tensp}}</td>
            </td>
            <td style="text-align: right;">{{number_format($item->dongia)}}</td>
            <td style="text-align: right;">{{number_format($item->soluong)}}</td>
            <td style="text-align: right; color: red">{{number_format(($item->dongia)*($item->soluong))}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>



   <!--  <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th style="width: 50px">STT</th>
            <th style="width: 100px">Sản phẩm</th>
            <th></th>
            <th style="width: 10%">Đơn giá</th>
            <th style="width: 10%">Số lượng</th>
            <th style="width: 10%">Thành tiền</th>

          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
          @foreach($list as $item)
          <tr>
            <td>{{$STT++}}</td>
            <td>
              @foreach($sanpham as $key => $val)
              @if($item->masp == $val->id)
                <img src="{{URL::to('/public/frontend/image/'.$val->image)}}" style="width:100px;height:100px" />
                
              @endif
              @endforeach
            <td>{{$val->tensp}}</td>
            </td>
            <td style="text-align: right;">{{number_format($item->dongia)}}</td>
            <td style="text-align: right;">{{number_format($item->soluong)}}</td>
            <td style="text-align: right;">{{number_format(($item->dongia)*($item->soluong))}}</td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div> --> 
  </div>

</div>
@endsection