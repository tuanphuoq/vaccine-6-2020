@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Cập nhật thông tin vaccine</h2>
      </div>
      <div class="box-body">
        <div class="container">
          <form  method="POST" >
            @csrf
            <div class="form-group">
              <label for="">Tên vaccine</label>
              <input type="text" class="form-control" id="name" placeholder="Name" value="{{$vaccine->name}}">
            </div>
            <div class="form-group">
              <label for="">Nguồn gốc</label>
              <input type="text" class="form-control" id="origin" placeholder="Origin" value="{{$vaccine->origin}}">
            </div>
            <div class="form-group">
              <label for="">Chỉ định</label>
              <input type="text" class="form-control" id="allocate" placeholder="Allocate" value="{{$vaccine->allocate}}">
            </div>
            <div class="form-group">
              <label for="">Giá đăng ký sớm</label>
              <input type="text" class="form-control" id="reser_price" placeholder="Reser Price" value="{{$vaccine->reser_price}}">
            </div>
            <div class="form-group">
              <label for="">Giá đăng ký trực tiếp</label>
              <input type="text" class="form-control" id="late_price" placeholder="Late Price" value="{{$vaccine->late_price}}">
            </div>
            <div class="form-group">
              <label for="">Trạng thái</label>
              <select name="active" id="active" class="form-control" required="required" style="width: 50%;" value="{{$vaccine->active}}">
                @if(old('active', $vaccine->active) == 1 )
                <option value="1" selected="">Đang được sử dụng</option>
                <option value="0">Đã ngưng sử dụng</option>
                @else
                <option value="1">Đang được sử dụng</option>
                <option value="0" selected="">Đã ngưng sử dụng</option>
                @endif
              </select>
             
            </div>
          </form>
          <button class="btn btn-primary edit-vaccine">Cập nhật</button>
          <a href="{{asset('')}}admin/vaccine" class="btn btn-secondary">Trở về</a>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" class="vaccine-hidden" name="" value="{{$vaccine->id}}">
@endsection
@section('foot')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.edit-vaccine').click(function(e){
    var id = $('.vaccine-hidden').val();
    var link = "/admin/vaccine/update/"+id;
    $.ajax({
      type: 'POST',
      url: link,
      data: {
        name: $('#name').val(),
        origin: $('#origin').val(),
        allocate: $('#allocate').val(),
        reser_price: $('#reser_price').val(),
        late_price: $('#late_price').val(),
        active: $('#active').val(),
      },
      success:function(response) {
        toastr.success('Update vaccine thành công!');
        setTimeout(function(){
        window.location.href = "/admin/vaccine";
      },100);
      },
      error:function(jqXHR,textStatus,errorThrown){
        if (jqXHR.responseJSON.errors.name!==undefined){
          toastr.error(jqXHR.responseJSON.errors.name[0]);
        }
        if (jqXHR.responseJSON.errors.origin!==undefined){
          toastr.error(jqXHR.responseJSON.errors.origin[0]);
        }
        if (jqXHR.responseJSON.errors.cakephp!==undefined){
          toastr.error(jqXHR.responseJSON.errors.cakephp[0]);
        }
        if (jqXHR.responseJSON.errors.allocate!==undefined){
          toastr.error(jqXHR.responseJSON.errors.allocate[0]);
        }
        if (jqXHR.responseJSON.errors.reser_price!==undefined){
          toastr.error(jqXHR.responseJSON.errors.reser_price[0]);
        }
        if (jqXHR.responseJSON.errors.late_price!==undefined){
          toastr.error(jqXHR.responseJSON.errors.late_price[0]);
        }
        if (jqXHR.responseJSON.errors.active!==undefined){
          toastr.error(jqXHR.responseJSON.errors.active[0]);
        }
      }
    });
  });

</script>
@endsection