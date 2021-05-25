@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Thay đổi mật khẩu người dùng</h2>
      </div>
      <div class="box-body">
        @if (session('error'))
        <div class="bg-danger container alert-custom" role="alert">
          <strong>Lỗi !</strong> {{session('error')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if (session('success'))
        <div class="bg-success container alert-custom" role="alert">
          <strong>Thành công !</strong> {{session('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="container">
          <form method="post" action="{{route('savepassword')}}">
            @csrf
            {{-- <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">(*) Lưu ý : Chỉ bổ sung đối với các vaccine đang được sử dụng hiện tại.</label>
              </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group col-md-9">
                    <label for="">Nhập mật khẩu cũ</label>
                    <input type="text" name="oldPass" id="old-pass" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-9">
                    <label for="">Nhập mật khẩu mới</label>
                    <input type="text" name="newPass" id="new-pass" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-9">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="text" name="rePass" id="re-pass" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-12">
                <button style="margin-left: 15px;" class="btn btn-primary" id="btn-save-password">Cập nhật mật khẩu</button>
            </div>
            {{-- <div class="form-group col-md-12 mt-5 text-center">
                <button type="submit" style="margin-left: 15px;" class="btn btn-success">Thực hiện bổ sung vaccine</button>
                <a href="{{asset('')}}admin/vaccine" class="btn btn-primary">Đi tới trang quản lý vaccine</a>
            </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('foot')
<script type="text/javascript">
    $(document).on('click', '.close', function(e) {
      $(this).parents('.alert-custom').remove();
    })
</script>
@endsection