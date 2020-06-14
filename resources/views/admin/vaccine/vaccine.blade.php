@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Table</h3>
      </div>
      <div class="box-body">
       <a href="{{asset('')}}admin/vaccine/create" class="btn btn-sm btn-success">Add</a>
       <div class="table-responsive">
        <table class="table table-hover table-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Origin</th>
              <th>Allocate</th>
              <th>Reser Price</th>
              <th>Late Price</th>
              <th>Active</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if(count($vaccines)>0)
            @foreach ($vaccines as $value)
            <tr>
              <td>{{$value->id}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->origin}}</td>
              <td>{{$value->allocate}}</td>
              <td>{{number_format($value->reser_price)}} VND</td>
              <td>{{number_format($value->late_price)}} VND</td>
              @if ($value->active==1)
              <td>Đang được sử dụng</td>
              @else
              <td>Đã ngưng sử dụng</td>
              @endif
              @if (empty($value->image))
              <td><img style="width: 50px; height: 50px;" src="https://increasify.com.au/wp-content/uploads/2016/08/default-image.png"></td>
              @else
              <td><img style="width: 50px; height: 50px;" src="{{ asset(\Storage::url($value->image)) }}"></td>
              @endif
              <td>
                <a class="btn btn-sm btn-primary add-img" href="#modal-img" data-toggle="modal" vaccine-id={{$value->id}}>Upload Image</a>
                <a href="{{asset('')}}admin/vaccine/edit/{{$value->id}}" class="btn btn-sm btn-warning">Edit</a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      {{$vaccines->links()}}
    </div>
  </div>
</div>
</div>
<input type="hidden" name="" class="hidden-vaccine">
<div class="modal fade" id="modal-img">
  <div class="modal-dialog" style="width: 400px;height: 400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Upload Image</h4>
      </div>
      <div class="modal-body">
        <div class="file-loading">
          <input id="file-1" type="file" name="file" class="file" data-overwrite-initial="false" data-min-file-count="1">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('foot')
<script type="text/javascript">
   $("#file-1").fileinput({
    theme: 'fa',
    uploadUrl: "/upload",
    uploadExtraData: function() {
      return {
      vaccine_id: $('.hidden-vaccine').attr('vaccine-id'),         
        _token: $("input[name='_token']").val(),
      };
    },
    allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
    overwriteInitial: false,
    maxFileSize:2000,
    maxFilesNum: 1,
    slugCallback: function (filename) {
      return filename.replace('(', '_').replace(']', '_');
    } 
  });
  $('#file-1').on('fileuploaded', function() {
    window.location.href = "/admin/vaccine";

  });

  $(document).on('click', '.add-img', function(e){
    e.preventDefault();
    var id = $(this).attr('vaccine-id');
     $('.hidden-vaccine').attr('vaccine-id', id);
  });

</script>
@endsection
