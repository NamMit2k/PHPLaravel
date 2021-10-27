@extends('admin_layout')
@section('admin_content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.j"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      TIN TỨC
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
    </div>
    <div class="table-responsive">
      <table id="example" class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Trích dẫn</th>
            <th>Hình ảnh</th>
            <th>Loại tin</th>
            <th>Ngày đăng</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $STT=1;
          @endphp
          @foreach($dsTinTuc as $key=>$item)
          <tr>    
            <td>{{$STT++}}</td>          
            <td>{{ $item->tieude}}</td>

            <td>{{ $item->trichdan }}</td>
            
            <td>
              <img src="{{URL::to('/public/frontend/anhtintuc/'.$item->hinhanh)}}" style="width:100px;height:100px" />
            </td>

            @foreach($loaitins as $key => $val)
              @if($item->maloaitin == $val->id)
                <td>{{ $val->tenloai }}</td>
              @endif
            @endforeach

            <td>
              <span class="text-ellipsis">{{$item->created_at=date("d-m-Y")}}</span>
            </td>

             <td>
                <a href="{{URL::to('/edit-tintuc/'.$item->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-edit"></i></a>
            </td>
            <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sp này không?')" href="{{URL::to('/delete-tintuc/'.$item->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-trash-alt"></i></a></td>
          </tr>

          </tr> 
          
         @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      
    </footer>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection