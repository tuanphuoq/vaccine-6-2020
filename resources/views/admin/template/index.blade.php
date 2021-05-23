@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Mẫu khai báo</h2>
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
            <a class="btn btn-success mb-1" href="{{route('admin.template.add')}}">Tạo mới mẫu</a>
            @if (isset($templates))
                @foreach ($templates as $item)
                <div class="col-md-12 template-item">
                    <div class="left">
                        <i class="fa fa-file-text" aria-hidden="true"></i> <span class="text-uppercase ml-1"> {{$item->template_name}}</span>
                    </div>
                    <div class="right">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.template.view', ['id' => $item->id])}}">Xem mẫu</a>
                        <a class="btn btn-warning btn-sm" href="{{route('admin.template.edit', ['id' => $item->id])}}">Sửa mẫu</a>
                    </div>
                </div>
                @endforeach
            @endif
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