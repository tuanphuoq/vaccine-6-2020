@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Chi tiết mẫu : {{isset($template) ? $template->template_name : "Unknow template"}}</h2>
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
            @if($isEdit)
            <form  method="POST" action="{{route('admin.template.save')}}">
            @csrf
            @else
            <form>
            @endif
            <div class="col-md-12 mb-1">
                <div class="form-group col-md-12">
                    <label for="">Tên mẫu khai báo</label>
                    @if ($isEdit)
                        <input type="text" class="form-control question-input" name="template_name" 
                        value="{{isset($template) ? $template->template_name : "Unknow template"}}" required maxlength="255">
                        <input type="hidden" class="form-control question-input" name="template_id" 
                        value="{{isset($template) ? $template->id : ""}}">
                    @else
                        <input type="text" class="form-control question-input" name="template_name" 
                        value="{{isset($template) ? $template->template_name : "Unknow template"}}" readonly>
                    @endif
                </div>
            </div>
            <hr>
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">(*) Các câu hỏi được sử dụng trong mẫu.</label>
              </div>
            </div>
            {{-- section question --}}
            @foreach ($template->questions as $item)
            <div class="col-md-12 mt-1">
                <div class="form-group col-md-12">
                    <label for="">Nội dung câu hỏi :</label>
                    @if ($isEdit)
                        <input type="text" class="form-control question-input" name="questions[]" 
                        value="{{isset($item['question']) ? $item['question'] : "Unknow question"}}" required maxlength="255">
                        <a class="text-danger delete-question">Xóa câu hỏi</a>
                    @else
                        <input type="text" class="form-control question-input" name="template_name" 
                        value="{{isset($item['question']) ? $item['question'] : "Unknow question"}}" readonly>
                    @endif
                </div>
            </div>
            @endforeach
            {{-- end section --}}
            @if ($isEdit)
            <div class="col-md-12 hidden" id="form-default">
                <div class="form-group col-md-12">
                    <label for="">Nhập câu hỏi</label>
                    <input type="text" class="form-control question-input" name="questions[]" value="" maxlength="255">
                    <a class="text-danger delete-question">Xóa câu hỏi</a>
                </div>
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label for="">Nhập câu hỏi</label>
                    <input type="text" class="form-control question-input" name="questions[]" value="" required maxlength="255">
                    <a class="text-danger delete-question">Xóa câu hỏi</a>
                </div>
            </div> --}}
            <div class="form-group col-md-12">
                <button style="margin-left: 15px;" class="btn btn-primary" id="btn-add-import">Thêm câu hỏi</button>
            </div>
            @endif
            @if ($isEdit)
            <div class="form-group col-md-12 mt-5 text-center">
                <button type="submit" style="margin-left: 15px;" class="btn btn-success">Cập nhật mẫu</button>
                <a style="margin-left: 15px;" class="btn btn-secondary a-button" href="{{route('admin.template')}}">
                    Quay lại
                </a>
            </div>
            @else
            <div class="form-group col-md-12 mt-5 text-center">
                <a style="margin-left: 15px;" class="btn btn-warning a-button" href="{{route('admin.template.edit', ['id' => $template->id])}}">
                    Sửa mẫu
                </a>
                <a style="margin-left: 15px;" class="btn btn-secondary a-button" href="{{route('admin.template')}}">
                    Quay lại
                </a>
            </div>
            @endif
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