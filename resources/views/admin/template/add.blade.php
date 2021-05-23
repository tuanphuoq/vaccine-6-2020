@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Tạo mới mẫu khai báo</h2>
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
          <form  method="POST" action="{{route('admin.template.addnew')}}">
            @csrf
            <div class="col-md-12 mb-1">
                <div class="form-group col-md-12">
                    <label for="">Nhập tên cho mẫu khai báo</label>
                    <input type="text" class="form-control question-input" name="template_name" value="" required maxlength="255">
                </div>
            </div>
            <hr>
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">(*) Tạo các câu hỏi cho mẫu khai báo trên ở form dưới đây.</label>
              </div>
            </div>
            <div class="col-md-12 hidden" id="form-default">
                <div class="form-group col-md-12">
                    <label for="">Nội dung câu hỏi :</label>
                    <input type="text" class="form-control question-input" name="questions[]" value="" maxlength="255">
                    <a class="text-danger delete-question">Xóa câu hỏi</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label for="">Nhập câu hỏi</label>
                    <input type="text" class="form-control question-input" name="questions[]" value="" required maxlength="255">
                    <a class="text-danger delete-question">Xóa câu hỏi</a>
                </div>
            </div>
            <div class="form-group col-md-12">
                <button style="margin-left: 15px;" class="btn btn-primary" id="btn-add-import">Thêm câu hỏi</button>
            </div>
            <div class="form-group col-md-12 mt-5 text-center">
                <button type="submit" style="margin-left: 15px;" class="btn btn-success">Thực hiện tạo mới mẫu</button>
                <a style="margin-left: 15px;" class="btn btn-secondary a-button" href="{{route('admin.template')}}">
                  Quay lại
                </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('foot')
<script type="text/javascript">
    $(document).on('click', '#btn-add-import', function(e) {
        e.preventDefault()
        let html = $('#form-default').clone()
        html.removeClass('hidden')
        html.removeAttr('id')
        html.find('.question-input').attr('required', 'required')
        console.log(html)
        let selector = $(this).parent()
        $(selector).before(html)
    })
    $(document).on('click', '.close', function(e) {
      $(this).parents('.alert-custom').remove();
    })
    $(document).on('click', '.delete-question', function(e) {
      $(this).parents('.col-md-12').remove();
    })
</script>
@endsection