@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Bổ sung vaccine</h2>
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
          <form  method="POST" action="{{route('admin.vaccine.import')}}">
            @csrf
            <div class="col-md-12">
              <div class="form-group col-md-12">
                <label for="">(*) Lưu ý : Chỉ bổ sung đối với các vaccine đang được sử dụng hiện tại.</label>
              </div>
            </div>
            <div class="col-md-12 hidden" id="form-default">
                <div class="form-group col-md-9">
                    <label for="">Chọn vaccine</label>
                    <select class="form-control" name="vaccine[]">
                        @foreach ($vaccines as $item)
                        <option value="{{$item->id}}">{{$item->name}} - {{$item->allocate}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số lượng</label>
                    <input type="text" class="form-control" id="quantity" name="quantity[]" value="0" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-9">
                    <label for="">Chọn vaccine</label>
                    <select class="form-control" name="vaccine[]">
                        @foreach ($vaccines as $item)
                        <option value="{{$item->id}}">{{$item->name}} - {{$item->allocate}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số lượng</label>
                    <input type="text" class="form-control" id="quantity" name="quantity[]" value="0" required>
                </div>
            </div>
            <div class="form-group col-md-12">
                <button style="margin-left: 15px;" class="btn btn-primary" id="btn-add-import">Thêm vaccine cần bổ sung số lượng</button>
            </div>
            <div class="form-group col-md-12 mt-5 text-center">
                <button type="submit" style="margin-left: 15px;" class="btn btn-success">Thực hiện bổ sung vaccine</button>
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
        console.log(html)
        let selector = $(this).parent()
        $(selector).before(html)
    })
    $(document).on('click', '.close', function(e) {
      $(this).parents('.alert-custom').remove();
    })
</script>
@endsection