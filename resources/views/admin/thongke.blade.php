@extends('admin_layout')
@section('admin_content')


<!--  -->
<!-- Theme style -->
<link href="{{asset('public/AdminLTE-master//dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.j"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<style>
    td img{
        height: 100px;
        width: 100px;
    }

    th, td{
    	color: black;
    	font-weight: bold;
    }
</style>
<div class="row">
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-aqua">
	    <div class="inner">
	      <h3>{{$countBills}}</h3>
	      <p>Hóa đơn</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-bag"></i>
	    </div>
	    <a href="{{url('http://localhost:8080/Project4/all_bill')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-green">
	    <div class="inner">
	      <h3>{{$countProducts}}</h3>
	      <p>Sản phẩm</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-stats-bars"></i>
	    </div>
	    <a href="{{url('http://localhost:8080/Project4/all-product')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-yellow">
	    <div class="inner">
	      <h3>...<sup style="font-size: 20px">đ</sup></h3>
	      <p>Lợi nhuận </p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-person-add"></i>
	    </div>
	    <a href="#" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->
	<div class="col-lg-3 col-xs-6">
	  <!-- small box -->
	  <div class="small-box bg-red">
	    <div class="inner">
	      <h3>{{$countCustomers}}</h3>
	      <p>Khách hàng</p>
	    </div>
	    <div class="icon">
	      <i class="ion ion-pie-graph"></i>
	    </div>
	    <a href="{{url('http://localhost:8080/Project4/all-khachhang')}}" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
	  </div>
	</div><!-- ./col -->
</div>
<div class="table-responsive">
<table id="b_dtl" class="table table-striped table-bordered" style="background-color: #fff">
        <thead>
          <tr>
            <th>STT</th>
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Phương thức thanh toán</th>
            <th>Ghi chú</th>
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

            <td style="color: red; text-align: right;">{{number_format($item -> tongtien)}}</td>
            <td>{{$khachhang->created_at=date("d-m-Y")}}</td>
            <td>{{$item->ptthanhtoan}}</td>
            <td>{{ $item->ghichu}}</td>
          </tr>
         @endforeach
            <tr>
                <td colspan="4">Tổng doanh thu:</td>
                <td colspan="2" style="text-align: right"><b style="color: red">{{number_format($sum)}}</b> vnđ</td>
            </tr>
        </tbody>
      </table>	
</div>
<div class="col-md-12">
        <a href="{{route('export')}}" class="btn btn-dark">
           <div class="pdfa">Xuất file PDF</div>
        </a>
    </div>
    <style type="text/css">
    	.pdfa{
    		background-color: #69b00b;
    		color: white;
    		width: 83px;
    		height: 30px;
    		padding-top: 6px;
    	}
    	.pdfa:hover{
    		background-color: #f05c5c;
    		color: white;
    	}
    </style>
@endsection

