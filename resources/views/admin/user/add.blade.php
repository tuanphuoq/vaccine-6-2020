@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Tạo mới người dùng hệ thống</h2>
      </div>
      <div class="box-body">
        <div class="container">
          <form  method="POST" >
            @csrf
            <div class="form-group">
              <label for="">Tên người dùng</label>
              <input type="text" class="form-control" id="fullname" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="">Địa chỉ</label>
              <input type="text" class="form-control" id="address" placeholder="Address">
            </div>
            <div class="form-group">
              <label for="">Số điện thoại liên lạc</label>
              <input type="text" class="form-control" id="phone" placeholder="Phone">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="">Mật khẩu</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
          </form>
          <button class="btn btn-primary">Tạo mới</button>
          <a href="{{asset('')}}admin/user" class="btn btn-secondary">Quay lại</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('foot')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.btn-primary').click(function(e){
    var link = "/admin/user/store";
    $.ajax({
      type: 'POST',
      url: link,
      data: {
        fullname: $('#fullname').val(),
        address: $('#address').val(),
        email: $('#email').val(),
        phone: $('#phone').val(),
        password: $('#password').val(),
      },
      success:function(response) {
        toastr.success('Thêm user thành công!');
        setTimeout(function(){
        window.location.href = "/admin/user";
      },100);
      },
      error:function(jqXHR,textStatus,errorThrown){
        if (jqXHR.responseJSON.errors.fullname!==undefined){
          toastr.error(jqXHR.responseJSON.errors.fullname[0]);
        }
        if (jqXHR.responseJSON.errors.address!==undefined){
          toastr.error(jqXHR.responseJSON.errors.address[0]);
        }
        if (jqXHR.responseJSON.errors.phone!==undefined){
          toastr.error(jqXHR.responseJSON.errors.phone[0]);
        }
        if (jqXHR.responseJSON.errors.email!==undefined){
          toastr.error(jqXHR.responseJSON.errors.email[0]);
        }
        if (jqXHR.responseJSON.errors.password!==undefined){
          toastr.error(jqXHR.responseJSON.errors.password[0]);
        }
      }
    });
  });

</script>
@endsection