@extends('_layout')
@section('content')
<style type="text/css">
    table{
        background-color: white;
        width: 100%;
        border-collapse:collapse;
        border: 1px solid #cccaca;
        border-top: transparent;
        border-left: transparent;
        border-right: transparent;
        margin-bottom: 70px;
    }
    th{
        padding: 20px;
       /* text-transform: uppercase;*/
        /*font-weight: 300;*/
    }
    tr{
        border-bottom: 1px solid #cdd3d8;
        padding: 10px;
    }
    td{
        text-align: center;
        padding: 10px;
    }
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
    .btn{
        background-color: tomato;
    }
    .btn-success{
      background-color: #00CED1;
    }

</style>
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
     <a href="{{route('bill-detail')}}" class="btn btn-success">Đặt hàng</a>
     <a href="http://localhost:8080/Project4/" class="btn btn-primary" style="background-color: #9ACD32">Tiếp tục mua hàng</a>
     <a style="margin:10px;" class="btn btn-primary" href="{{route('giohang.clear')}}">xóa hết</a>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
       @php
       $stt=1;
       @endphp
       @foreach($cart->items as  $item)
       <tr>
          <td>{{$stt++}}</td>
          <td>  
            <img src="{{URL::to('/public/frontend/image/'.$item['image'])}}"style="max-width:100px;">
        </td>
        <td>{{$item['name']}}</td>

        <td>{{number_format($item['price'])}} vnđ</td>
        <td>
            <form action="{{route('giohang.update',['id' => $item['id']])}}">
              <input type="number" name="quantity" value="{{$item['quantity']}}" min="1" style="width: 50px">
              <input type="submit" value="OK">
          </form>
      </td>
      <td>{{number_format($item['quantity'] * $item['price'])}} vnđ</td>
      <td>
          <!-- -->
          <a class="btn btn-primary btndelete" href="{{route('giohang.remove',['id'=> $item['id']])}}"><i class="fas fa-trash-alt"></i></a>
      </tr>

      @endforeach
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
          <td><b style="color: red;">Giá trị hóa đơn</b>: {{number_format($cart->total_price)}} vnđ</td>
                  <td></td>
      </tr>
  </tbody>
</table>
<!-- <div class="row">
 
  <div class="col-lg-6">
    <div class="shoping__checkout">
      <h5>Cart Total</h5>
      <ul>
        <li>Subtotal <span>$454.98</span></li>
        <li>Total <span>$454.98</span></li>
      </ul>
      <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
    </div>
  </div>
</div> -->
<!-- <h3 style="padding: 5px 0px; position: absolute; right: 100px">
    <b style="color: red;">Giá trị hóa đơn</b>: {{number_format($cart->total_price)}} vnđ
</h3> -->
<form action="" method="POST" id="formdelete">
    @csrf @method('GET')
</form>
</div>

@endsection