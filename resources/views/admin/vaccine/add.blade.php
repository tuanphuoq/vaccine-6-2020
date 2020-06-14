@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Add vaccine</h2>
      </div>
      <div class="box-body">
        <div class="container">
          <form  method="POST" >
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="">Origin</label>
              <input type="text" class="form-control" id="origin" placeholder="Origin">
            </div>
            <div class="form-group">
              <label for="">Allocate</label>
              <input type="text" class="form-control" id="allocate" placeholder="Allocate">
            </div>
            <div class="form-group">
              <label for="">Reser Price</label>
              <input type="text" class="form-control" id="reser_price" placeholder="Reser Price">
            </div>
            <div class="form-group">
              <label for="">Late Price</label>
              <input type="text" class="form-control" id="late_price" placeholder="Late Price">
            </div>
            <div class="form-group">
              <label for="">Active</label>
              <select name="" id="active" class="form-control" required="required" style="width: 50%;">
                <option value="1">Đang được sử dụng</option>
                <option value="0">Đã ngưng sử dụng</option>
              </select>
            </div>
          </form>
          <button class="btn btn-primary">Add</button>
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
    var link = "/admin/vaccine/store";
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
        toastr.success('Thêm vaccine thành công!');
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