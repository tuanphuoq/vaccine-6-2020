@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header table-header">
        <h3 class="box-title">Quản lý trang thông tin</h3>
      </div>
      <div class="box-body">
       <a href="{{asset('')}}admin/post/create" class="btn btn-sm btn-success">Add</a>
       <div class="table-responsive">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(count($posts)>0)
            @foreach ($posts as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->title}}</td>
              <td>{{$value->description}}</td>
              <td>
                <a href="{{asset('')}}admin/post/edit/{{$value->id}}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{asset('')}}admin/post/delete/{{$value->id}}" class="btn btn-sm btn-danger" data-id="{{$value->id}}">Delete</a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      {{$posts->links()}}
    </div>
  </div>
</div>
</div>
<input type="hidden" name="" class="hidden-post">
@endsection
@section('foot')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', '.btn-danger', function(e){
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
          url: "{{ asset('')}}admin/post/delete/"+id,
          success: function(response){
            setTimeout(function(){
              window.location.href = "/admin/post";
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
