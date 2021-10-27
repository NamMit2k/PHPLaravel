<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Xem trước</title>
    <style>
        
        body{
            font-family: "DejaVu Sans", sans-serif;
            width: 90%;
            margin: 100px auto;
            font-size: 16px;
        }

        #b_dtl{
            width: 100%;
            border-collapse: collapse;
        }
        #b_dtl th, #b_dtl td{
            border: 1px solid #dddddd;
            padding: 8px;
        }
        #b_dtl tr:nth-child(even){
            background-color: #f1f2f3;
        }

        td img{
            height: 100px;
            width: 100px;
        }
        .pdfa{
            background-color: #69b00b;
            color: white;
            width: 89px;
            height: 38px;
            padding-top: 6px;
            text-align: center;
        }
        .pdfa:hover{
            background-color: #f05c5c;
            color: white;
        }

    </style>
</head>
<body>
    <div class="col-md-12">
        <a href="{{route('export')}}" class="btn btn-dark">
            <div class="pdfa">Xuất file PDF</div>
        </a>
    </div>
    <div><h3>Danh sách đơn hàng</h3></div>
    <table id="b_dtl">
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
</body>
</html>
