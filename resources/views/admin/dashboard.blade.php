@extends('admin_layout')
@section('admin_content')
<style type="text/css">
	p.title_thongke{
		text-align: center;
		font-size: 20px;
		font-weight: bold;;
	}
</style>
<div class="row">
	<p class="title_thongke">Thống kê đơn hàng doanh số</p>
		<form autocomplete="off">
			@csrf
			<div class="col-md-2">
				<p>Từ ngày: <input type="text" id="datepicker" class="form-control" name=""></p>
				<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả" name="">
			</div>
			<div class="col-md-2">
				<p>Đến ngày: <input type="text" id="datepicker2" class="form-control" name=""></p>
			</div>
			<!-- <div class="col-md-2">
				<p>
					Lọc Theo:
					<select class="dashboard-filter form-control">
						<option value="7ngay">7 ngày qua</option>
						<option value="thangtruoc">Tháng trước</option>
						<option value="thangnay">tháng này</option>
						<option value="365ngayqua">365 ngày qua</option>
					</select>
				</p>
			</div> -->
		</form>
		<div class="col-md-12">
			<div id="myfirstchart" style="height: 250px;"></div>
		</div>
	</div>
</div>


<!-- <div class="row">
	<div class="col-md-4 col-xs-12">
		<p class="title_thongke">Thống kê sản phẩm bài viết đơn hàng</p>
		 <div id="donut"></div>
	</div>
</div> -->
@endsection