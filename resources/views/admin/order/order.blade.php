@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header table-header">
        <h3 class="box-title">Quản lý đăng ký tiêm chủng</h3>
      </div>
      <div class="box-body">
       <a href="{{asset('')}}admin/order/create" class="btn btn-success">Tạo đơn đăng ký mới</a>
       <a class="btn btn-primary" id="show-fast-check">Xem nhanh đăng ký tiêm chủng</a>
       <div id="fast-check-section" class="not-show">
           <input type="text" name="" id="" class="form-control mt-1">
           <a link="{{asset('')}}admin/template/{order_id}/answer-template-view" class="btn btn-primary" target="_blank" id="see-info">Xem thông tin</a>
       </div>
       <div class="table-responsive" style="margin-top : 3rem;">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th>Mã</th>
              <th>Người xác nhận</th>
              <th>Khách hàng</th>
              <th>Địa chỉ</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Vaccine</th>
              <th>Số lượng</th>
              <th>Tổng tiền</th>
              <th>Ngày tiêm</th>
              <th>Giờ tiêm</th>
              <th>Khai báo y tế</th>
              <th>Trạng thái</th>
              <th>Tác vụ</th>
            </tr>
          </thead>
          <tbody>
            @if(count($orders)>0)
            @foreach ($orders as $value)
            <tr>
             <td>{{$value->id}}</td>
             @if ($value->user_id==null)
             <td></td>
             @else
             <td>{{\App\User::find($value->user_id)->fullname}}</td>
             @endif
             <td>{{$value->customer_name}}</td>
             <td>{{$value->customer_address}}</td>
             <td>{{$value->customer_phone}}</td>
             <td>{{$value->customer_email}}</td>
             <td>{{\App\Vaccine::where('id', $value->vaccine_id)->value('name')}}</td>
             <td>{{$value->quantity}}</td>
             <td>{{number_format($value->total)}}</td>
             <td>{{$value->join_date}}</td>
             <td>{{$value->join_time}}</td>
             <td>
               @if ($value->isAnswer)
               <a href="{{route('admin.template.answerTemplate', ['order_id' => $value->id])}}" target="_blank" rel="noopener noreferrer">Xem khai báo</a>
               @else
               <span class="text-danger">Chưa khai báo</span>
               @endif
              </td>
              @if ($value->state == 0)
              <td>Chưa thanh toán</td>
              @else
              <td>Đã thanh toán</td>
              @endif
              <td>
              <a class="btn btn-warning btn-change" data-toggle="modal" href='#modal-id' data-id="{{$value->id}}">Cập nhật trạng thái</a>
              <a href="{{asset('')}}admin/order/edit/{{$value->id}}" class="btn btn-danger btn-edit" data-id="{{$value->id}}">Sửa</a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
    {{$orders->links()}}
  </div>
</div>
</div>
</div>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Cập nhật trạng thái đơn đăng ký tiêm chủng</h4>
      </div>
      <div class="modal-body">
       <form method="POST">
        @csrf
          <select name="" id="state" class="form-control" required="required">
          <option value="0" class="no">Chưa thanh toán</option>
          <option value="1" class="yes">Đã thanh toán</option>
        </select>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-save">Lưu thay đổi</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="" class="hidden-change">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@endsection
@section('foot')

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.btn-change').click(function(e){
    var id = $(this).attr('data-id');
    $('.hidden-change').val(id);
    var link = '/admin/order/change/'+id;
    $.ajax({
      type: 'GET',
      url: link,
      success: function(response){
        if (response.data.state ==1){
          $('.yes').attr('selected', true);
        }
        else
        {
          $('.no').attr('selected', true);
        }
      }
    });
  });

  $('.btn-save').click(function(e){
    var id = $('.hidden-change').val();
    var link = '/admin/order/change/update/'+id;
    $.ajax({
      type: 'POST',
      url: link,
      data: {
        change: $('#state').val(),
      },
      success:function(response) {
        toastr.success('Change state thành công!');
        setTimeout(function(){
        window.location.href = "/admin/order";
      },100);
      },
    });
  });

  $('#show-fast-check').on('click', function() {
    $('#fast-check-section').css('display') == "none" ? $('#fast-check-section').removeClass('not-show') : $('#fast-check-section').addClass('not-show')
  })
  $('#see-info').on('click', function() {
    var link = $(this).attr('link')
    var orderID = $(this).prev().val()
    link = link.replace("{order_id}", orderID);
    $(this).attr('href', link)
  })
</script>
@endsection
