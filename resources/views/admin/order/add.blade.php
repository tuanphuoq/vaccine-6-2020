@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="text-align: center;">Add order</h2>
      </div>
      <div class="box-body">
        <div class="container">
          <form  method="POST" >
            @csrf
            <div class="form-group">
              <label for="">Customer Name</label>
              <input type="text" class="form-control" id="customer_name" placeholder="Customer Name">
            </div>
            <div class="form-group">
              <label for="">Customer Address</label>
              <input type="text" class="form-control" id="customer_address" placeholder="Customer Address">
            </div>
            <div class="form-group">
              <label for="">Customer Phone</label>
              <input type="text" class="form-control" id="customer_phone" name="customer_phone"placeholder="Customer Phone">
            </div>
            <div class="form-group">
              <label for="">Customer Email</label>
              <input type="text" class="form-control" id="customer_email" placeholder="Customer Email">
            </div>
            <div class="form-group">
              <label for="">Vaccine</label>
               <select name="" id="vaccine" class="form-control" style="width: 50%;">
                @if (count($vaccines) > 0)
                @foreach ($vaccines as $vaccine)
                <option value="{{$vaccine->id}}">{{$vaccine->name}}</option>
                @endforeach
                @endif
              </select>
            </div>
            <div class="form-group">
              <label for="">Quantity</label>
              <input type="text" class="form-control" id="quantity" placeholder="Late Price">
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
    var link = "/admin/order/store";
    $.ajax({
      type: 'POST',
      url: link,
      data: {
        customer_name: $('#customer_name').val(),
        customer_address: $('#customer_address').val(),
        customer_email: $('#customer_email').val(),
        customer_phone: $('#customer_phone').val(),
        customer_email: $('#customer_email').val(),
        quantity: $('#quantity').val(),
        vaccine: $('#vaccine').val(),
      },
      success:function(response) {
        toastr.success('Thêm order thành công!');
        setTimeout(function(){
        window.location.href = "/admin/order";
      },100);
      },
      error:function(jqXHR,textStatus,errorThrown){
        if (jqXHR.responseJSON.errors.customer_name!==undefined){
          toastr.error(jqXHR.responseJSON.errors.customer_name[0]);
        }
        if (jqXHR.responseJSON.errors.customer_address!==undefined){
          toastr.error(jqXHR.responseJSON.errors.customer_address[0]);
        }
        if (jqXHR.responseJSON.errors.customer_phone!==undefined){
          toastr.error(jqXHR.responseJSON.errors.customer_phone[0]);
        }
        if (jqXHR.responseJSON.errors.quantity!==undefined){
          toastr.error(jqXHR.responseJSON.errors.quantity[0]);
        }
      }
    });
  });

</script>
@endsection