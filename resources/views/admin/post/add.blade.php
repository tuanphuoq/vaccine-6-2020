@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Add post</h2>
      </div>
      <div class="box-body">
        <div class="container">
          <form  method="POST" >
            @csrf
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text" class="form-control" id="description" placeholder="Description">
            </div>
            <div class="form-group">
              <label for="">Content</label>
              <textarea name="content" id="editor1" rows="10" cols="80"  class="form-control">
              </textarea>
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
  $(function(){
    CKEDITOR.replace( 'editor1' );
  });
  $('.btn-primary').click(function(e){
    var link = "/admin/post/store";
    var formData = new FormData();
    formData.append('title', $('#title').val());
   formData.append('content',CKEDITOR.instances['editor1'].getData());
    formData.append('description', $('#description').val());
    formData.append('_token',$('input[name="_token"]').val());
    $.ajax({
      type: 'POST',
      url: link,
      processData: false,
      contentType: false,
      data:formData,
      success:function(response) {
        toastr.success('Thêm post thành công!');
        setTimeout(function(){
        window.location.href = "/admin/post";
      },100);
      },
      error:function(jqXHR,textStatus,errorThrown){
        if (jqXHR.responseJSON.errors.title!==undefined){
          toastr.error(jqXHR.responseJSON.errors.title[0]);
        }
        if (jqXHR.responseJSON.errors.content!==undefined){
          toastr.error(jqXHR.responseJSON.errors.content[0]);
        }
        if (jqXHR.responseJSON.errors.description!==undefined){
          toastr.error(jqXHR.responseJSON.errors.description[0]);
        }
      }
    });
  });

</script>
@endsection