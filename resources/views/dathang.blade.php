 @extends('_layout')
 @section('content')
 <section class="main-content-section">
 	<div class="container">
 		<div class="row">
 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 				<div class="category-title">
 					<div class="grid wide">
 						<div class="category-title-warp">
 							<div class="category-title__page">
 								<span class="category-title__page-home">TRANG CHỦ</span>
 								<span class="category-title__page-dash">/</span>
 								<span class="category-title__page-text">THÔNG TIN THANH TOÁN</span>
 							</div>
 						</div>   
 					</div>

 				</div>
 			</div>
 		</div>
 		<div class="row">
					<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Chọn phương thức thanh toán</h2>
					</div>	 -->
					<form action="{{route('bill-detail')}}" method="post">
						@csrf
						<div class="col-md-6" style="float: right;">
							<div class="table-responsive">
								<!-- TABLE START -->
								<table class="table table-bordered" id="cart-summary">
									<!-- TABLE HEADER START -->
									<thead>
										<tr>
											<th class="cart-product">Sản phẩm</th>
											<th class="cart-description">Mô tả</th>
											<th class="cart-unit text-right">Đơn giá</th>
											<th class="cart_quantity text-center">Số lượng</th>
											<th class="cart-total text-right">Thành tiền</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cart->items as $item)
										<tr>
											<td class="cart-product">
												<a href="">
													<img alt="Faded" src="{{URL::to('/public/frontend/image/'.$item['image'])}}" style="width: 70px; height: 70px">
												</a>
											</td>
											<td class="cart-description">
												<a style="font-size: 14px" href="#"><p class="product-name">{{$item['name']}}</p></a>
											</td>
											<td class="cart-unit">
												<ul class="price text-right">
													<li class="price">{{number_format($item['price'])}} VND
													</li>
												</ul>
											</td>
											<td class="cart_quantity text-center">
												<span>{{$item['quantity']}}</span>
											</td>
											<td class="cart-total" >
												<span class="price">{{number_format($item['quantity'] * $item['price'])}}</span>
											</td>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<td class="total-price-container text-right" colspan="3">
												<span>Tổng tiền</span>
											</td>
											<td id="total-price-container" class="price" colspan="3">
												<span id="total-price">{{number_format($cart->total_price)}} vnđ
												</span>
												<input style="width: 80px" type="number" name="totalBill" value="{{$cart->total_price}}" class="hidden">
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="form-group col-md-6">
									<label for="" style="font-weight: bold;">Họ Tên <span>*</span></label>
									<input type="text" name="tenkh" class="form-control">
								</div>


								<div class="form-group col-md-6">
									<label for="" style="font-weight: bold;">Địa chỉ <span>*</span></label>
									<input type="text" name="diachi" class="form-control">
								</div>

								<div class="form-group col-md-6">
									<label for="" style="font-weight: bold;">Email <span>*</span></label>
									<input type="e-mail" name="email" class="form-control">
								</div>

								<div class="form-group col-md-6">
									<label for="" style="font-weight: bold;" >Số điện thoại <span>*</span></label>
									<input type="text" name="sdt" class="form-control">
								</div>

								<div class="form-group col-md-6">
									<label for="" style="font-weight: bold;" >Giới tính<span>:</span></label>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gioitinh" id="inlineRadio1" value="Nam">
										<label class="form-check-label" for="inlineRadio1">Nam</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gioitinh" id="inlineRadio2" value="Nữ">
										<label class="form-check-label" for="inlineRadio2">Nữ</label>
									</div>
								</div>

								<div class="form-group col-md-6">
									<label for="" style="font-weight: bold;" >Phương thức Thanh Toán<span>*</span></label>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="ptthanhtoan" id="ptthanhtoan1" value="Tiền mặt">
										<label class="form-check-label" for="ptthanhtoan1">Tiền mặt</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="ptthanhtoan" id="ptthanhtoan2" value="Qua tài khoản ngân hàng">
										<label class="form-check-label" for="ptthanhtoan2">TKNH</label>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label for="" style="font-weight: bold;">Ghi chú <span>*</span></label>
									<textarea name="ghichu" class="col-md-12" rows="5"></textarea>
								</div>

								<button type="submit" class="btn btn-success col-md-12">Đặt hàng</button>
							</div>
						</div>
					</form>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="returne-continue-shop">
							<a class="continueshoping"><i class="fa fa-chevron-left"></i>Continue shopping</a>
						</div>	
					</div>
				</div>
			</div>
		</section>
		<style type="text/css">
			th{
				background-color: rgb(193, 193, 236);
				border-left: 1px solid #f5f5f5;
			}
			th:nth-child(1){
				border-left: unset;
			}
			table tr:nth-child(even){
				background-color:#f0eaea;
			}
			label{
				flex: 1;
				color: #000000;

			}
			.form-control{
				flex: 3;
				padding: 10px;
				border-radius: 4px;
				outline: none;
				border: none;
				border: 1px solid rgb(196, 194, 194);
				box-shadow: -1px 1px 2px rgb(196, 194, 194);
			}
			.category-title{
				background-color: #E6EBEF;
				margin-bottom: 30px;
			}

			.category-title-warp{
				display: flex;
				justify-content: space-between;

			}
			.category-title__page{
				margin: 10px;
			}
			.category-title__page-dash{
				color: #ff5656;
			}
			.category-title__page-text{
				color: #ff5656;
			}

		</style>
		@endsection