@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header table-header">
        <h3 class="box-title">Quản lý người dùng hệ thống</h3>
      </div>
      <div class="box-body">
       <a href="{{asset('')}}admin/user/create" class="btn btn-sm btn-success">Add</a>
       <div class="table-responsive">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Address</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @if (count($users) > 0)
           @foreach ($users as $user)
           <tr>
            <td>{{$user->id}}</td>
           <td>{{$user->fullname}}</td>
           <td>{{$user->address}}</td>
           <td>{{$user->phone}}</td>
           <td>{{$user->email}}</td>
           @if ($user->role == 1)
           <td>Super Admin</td>
           @else
           <td>Employee</td>
            @endif
           <td>
             @if($user->role != 1)
              <a class="btn btn-success btn-change" data-toggle="modal" href='#modal-id' data-id="{{$user->id}}">Change Role</a>
              @endif
             <a href="{{asset('')}}admin/user/edit/{{$user->id}}" class="btn btn-warning">Edit</a>
             @if($user->role != 1)
             <button class="btn btn-danger btn-delete" data-id={{$user->id}}>Delete</button>
             @endif
           </td>
           </tr>
          
           @endforeach
           @endif

          </tbody>
        </table>
      </div>
      {{$users->links()}}
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Change Role</h4>
      </div>
      <div class="modal-body">
       <form method="POST">
        @csrf
          <select name="" id="state" class="form-control" required="required">
          <option value="0" class="yes">Employee</option>
          <option value="1" class="no">Super Admin</option>
        </select>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="" class="hidden-change">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@endsection
@section('foot')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
 $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.btn-change').click(function(e){
    var id = $(this).attr('data-id');
    $('.hidden-change').val(id);
    var link = '/admin/user/change/'+id;
    $.ajax({
      type: 'GET',
      url: link,
      success: function(response){
        if (response.data.role == 0){
          $('.yes').attr('selected', true);
          $('.no').attr('selected', false);
        }
        else
        {
          $('.no').attr('selected', true);
          $('.yes').attr('selected', false);
        }
      }
    });
  });

  $('.btn-save').click(function(e){
    var id = $('.hidden-change').val();
    var link = '/admin/user/change/update/'+id;
    $.ajax({
      type: 'POST',
      url: link,
      data: {
        change: $('#state').val(),
      },
      success:function(response) {
        toastr.success('Change role thành công!');
        setTimeout(function(){
        window.location.href = "/admin/user";
      },100);
      },
    });
  });

  $(document).on('click', '.btn-delete', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    alert
    swal({
      title: "Bạn có muốn xóa không?",
      text: "Sau khi xóa bạn sẽ không thể khôi phục được tệp!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: 'delete',
          url: "{{ asset('')}}admin/user/delete/"+id,
          success: function(response){
            setTimeout(function(){
              window.location.href = "/admin/user";
            },100);
          } 
        }); 
        swal("Tệp của bạn đã được xóa!", {
          icon: "success",
        });
      } else {
        swal("Hủy xóa thành công!!");
      }
    });
  });
</script>
@endsection
