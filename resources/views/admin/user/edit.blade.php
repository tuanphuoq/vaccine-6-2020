@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Edit user</h2>
      </div>
      <div class="box-body">
        <div class="container">
          <form  method="POST" >
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" id="fullname" placeholder="Name" value="{{$user->fullname}}">
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Address" value="{{$user->address}}">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text" class="form-control" id="phone" placeholder="Phone" value="{{$user->phone}}">
            </div>
            
          </form>
          <button class="btn btn-primary edit-user">Edit</button>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" class="user-hidden" name="" value="{{$user->id}}">
@endsection
@section('foot')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.edit-user').click(function(e){
    var id = $('.user-hidden').val();
    var link = "/admin/user/update/"+id;
    $.ajax({
      type: 'POST',
      url: link,
      data: {
        fullname: $('#fullname').val(),
        address: $('#address').val(),
        phone: $('#phone').val(),
      },
      success:function(response) {
        toastr.success('Update user thành công!');
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
      }
    });
  });

</script>
@endsection