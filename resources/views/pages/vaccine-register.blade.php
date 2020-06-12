@extends('layouts.master')
@section('content')
    <div class="container my-4" style="padding-top: 90px; padding-bottom: 120px; margin: auto;">
        <div class="row direct">
            <div class="col-md-6 text-center">
                <label for="" style="font-size: 12px; font-style: italic; display: block;">Nếu bạn muốn đăng ký tiêm chủng, nhấp nút dưới đây để đăng ký</label>
                <button class="btn btn-success btn-lg font-weight-bold" id="btn-register"><i class="fa fa-plus-circle" aria-hidden="true"></i> CHỌN ĐỂ ĐĂNG KÝ TIÊN CHỦNG</button>
            </div>
            <div class="col-md-6 text-center">
                <label for="" style="font-size: 12px; font-style: italic; display: block;">Bạn đã đăng ký và muốn xem thông tin tiêm chủng</label>
                <button class="btn btn-info btn-lg font-weight-bold" id="btn-show"><i class="fa fa-eye" aria-hidden="true"></i> XEM THÔNG TIN TIÊM CHỦNG</button>
            </div>
        </div>
    </div>
    <div class="container my-3" style="visibility: hidden; display: none; padding-bottom: 100px;" id="form-register">
        <div class="title text-center my-5">
            <h1 class="font-weight-bold" style="font-size: 30px;">ĐĂNG KÝ TIÊM CHỦNG</h1>
        </div>
        <div class="row">
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">HỌ VÀ TÊN : </label>
                <input type="text" name="" id="register-customer" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
                <small id="help-register-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">ĐỊA CHỈ : </label>
                <input type="text" name="" id="address-register" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
                <small id="help-address-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">SỐ ĐIỆN THOẠI : </label>
                <input type="text" name="" id="phone-register" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
                <small id="help-phone-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">EMAIL (nếu có) : </label>
                <input type="text" name="" id="email-register" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">VACCINE ĐĂNG KÝ : </label>
                <select id="vaccine-register" name="">
                    <option value="0">Chọn vaccine cần đăng ký</option>
                    @if( isset($vaccines) )
                        @foreach($vaccines as $vaccine)
                        <option value="{{$vaccine->id}}" price="{{$vaccine->reser_price}}">{{$vaccine->name}} - {{$vaccine->allocate}}</option>
                        @endforeach
                    @endif
                </select>
                <small id="help-vaccine-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">SỐ LƯỢNG : </label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" class="form-group">
                <small id="help-quantity" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">TỔNG TIỀN : </label>  <p id="price-total" class="d-inline-block text-danger"> VNĐ</p>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <button class="btn-lg btn btn-success" id="confirm-register">ĐĂNG KÝ TIÊM CHỦNG</button>
            </div>
        </div>
    </div>
    <div class="container my-4" style="visibility: hidden; display: none; padding-bottom: 100px;" id="order-code">
        <div class="title text-center my-5">
            <h2 class="my-5 text-success font-weight-bold" style="font-size: 30px;">ĐĂNG KÝ THÀNH CÔNG</h2>
            <h4 class="d-inline">Mã đơn đăng ký tiêm chủng của khách hàng : </h4> <h4 id="vaccine-order-code" class="text-success d-inline font-weight-bold">005</h4>
            <br>
            <h4 class="d-inline">Chi phí đăng ký tiêm chủng của khách hàng : </h4> <h4 id="order-price" class="text-warning d-inline font-weight-bold">005</h4> <h4 class="font-weight-bold d-inline text-warning">VNĐ</h4>
            <div class="pay-info my-5" style="width: 50%; margin: auto; border: 3px solid green; padding: 10px;">
                <span class="d-block my-3 font-weight-bold">Khách hàng vui lòng thanh toán đơn đăng ký tiêm chủng đến số tài khoản dưới đây để hoàn tất thanh toán đăng ký tiên chủng</span>
                <span class="font-italic d-block my-3">STK : 105867843215</span>
                <span class="font-italic d-block my-3">BANK : VIETINBANK</span>
                <span class="font-italic d-block my-3">CHI NHÁNH : CHI NHÁNH THÀNH ĐÔ</span>
                <span class="font-italic d-block my-3">NỘI DUNG : Thanh toán đăng ký tiêm chủng + mã đơn tiêm chủng đã được cung cấp</span>
            </div>
            <span class="font-italic d-block my-3">Khách hàng có thể dùng mã đơn đăng ký tiêm chủng trên để kiểm tra thông tin tiêm chủng tại mục "Xem thông tin tiêm chủng"</span>
        </div>
    </div>
    <div class="container my-3" style="visibility: hidden; display: none; padding-bottom: 100px;" id="form-info">
        <div class="title text-center my-5">
            <h2 class="font-weight-bold" style="font-size: 30px;">THÔNG TIN TIÊM CHỦNG</h2>
        </div>
        <div class="row">
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">MÃ ĐƠN TIÊM CHỦNG : </label>
                <input type="text" name="" id="vaccine-code" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
                <span id="for-vaccine-code" class="font-italic" style="font-size: 13px; font-weight: 400; color: gray;">Nhập mã đơn tiêm chủng đã được gửi đến cho bạn</span>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <button class="btn btn-lg btn-success" id="btn-info">XEM THÔNG TIN</button>
            </div>
            
            <div class="col-md-6 form-group my-3" id="vaccine-info" style="margin: auto; visibility: hidden; display: none;">
                <hr>
                <label for="" class="font-weight-bold">MÃ TIÊM CHỦNG : </label> <p class="d-inline" id="order-code"></p>
                <br>
                <label for="" class="font-weight-bold">NGƯỜI ĐĂNG KÝ : </label> <p class="d-inline text-capitalize" id="customer-name"></p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">ĐỊA CHỈ : </label> <p class="d-inline text-capitalize" id="customer-address"></p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">số điện thoại : </label> <p class="d-inline" id="customer-phone"></p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">vaccine đã đăng ký : </label> <p class="d-inline text-uppercase" id="vaccine-name"></p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">số lượng : </label> <p class="d-inline" id="vaccine-quantity"></p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">tổng tiền : </label> <p class="d-inline" id="price-total"></p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">trạng thái : </label> <p class="d-inline text-uppercase" id="order-state"></p>
            </div>
        </div>
    </div>

    <script>
       //  $.ajaxSetup({
       //     headers: {
       //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       //     }
       // });

       //  $('#btn-register').click(function(){
       //      $('#form-info').css({
       //          'visibility': 'hidden',
       //          'display': 'none'
       //      });
       //      $('#form-register').css({
       //          'visibility': 'visible',
       //          'display': 'block'
       //      });
       //  });

       //  $('#btn-show').click(function(){
       //      $('#form-register').css({
       //          'visibility': 'hidden',
       //          'display': 'none'
       //      });
       //      $('#order-code').css({
       //          'visibility': 'hidden',
       //          'display': 'none'
       //      });
       //      $('#form-info').css({
       //          'visibility': 'visible',
       //          'display': 'block'
       //      });
       //  });

       //  $('#btn-info').click(function(){
       //      let vaccineCode = $('#vaccine-code').val();
       //      console.log(vaccineCode);
       //      if(vaccineCode != "") {
       //          $.ajax({
       //              type: "method",
       //              url: "url",
       //              data: {
       //                  vaccineCode : vaccineCode
       //              },
       //              success: function (response) {
       //                  console.log(response);
       //                  if (response != null) {
       //                      $('#vaccine-info').css({
       //                          'visibility': 'visible',
       //                          'display': 'block'
       //                      });
       //                      //fix css span for vaccine-code
       //                      $('#for-vaccine-code').text("Nhập mã đơn tiêm chủng đã được gửi đến cho bạn");
       //                      $('#for-vaccine-code').css('color', 'gray');
       //                      //assign value for each info field
       //                      // $('#order-code').val() = response.value;
       //                      // $('#customer-name').val() = response.value;
       //                      // $('#customer-address').val() = response.value;
       //                      // $('#customer-phone').val() = response.value;
       //                      // $('#vaccine-name').val() = response.value;
       //                      // $('#vaccine-quantity').val() = response.value;
       //                      // $('#price-total').val() = response.value;
       //                      // $('#order-state').val() = response.value;
       //                  } else {
       //                      $('#for-vaccine-code').text("Mã đơn tiêm chủng không tồn tại, vui lòng nhập lại");
       //                      $('#for-vaccine-code').css('color', 'red');
       //                  }
       //              }
       //          });
       //      } else {
       //          $('#for-vaccine-code').text("Mã đơn tiêm chủng không được để trống");
       //          $('#for-vaccine-code').css('color', 'red');
       //      }
       //  });

       //  $('#confirm-register').click(function(){
       //      var info = {
       //          'fullname' : $('#register-customer').val(),
       //          'address' : $('#address-register').val(),
       //          'phone' : $('#phone-register').val(),
       //          'email' : $('#email-register').val(),
       //          'vaccineId' : $('#vaccine-register').val(),
       //          'quantity' : $('#quantity').val(),
       //          'price' : $('#vaccine-register').find(':selected').attr('price')
       //      };
       //      if (getFieldNull(info) == "") {
       //          //sweet alert2 to confirm
       //          Swal.fire({
       //            // title: 'Are you sure?',
       //            text: "Đồng ý đăng ký tiêm chủng",
       //            icon: 'question',
       //            showCancelButton: true,
       //            confirmButtonColor: '#3085d6',
       //            cancelButtonColor: '#d33',
       //            confirmButtonText: 'OK'
       //          }).then((result) => {
       //            if (result.value) {
       //              Swal.fire(
       //                  'Đăng ký tiêm chủng thành công',
       //                  //call ajax to add order register
       //                  $.ajax({
       //                      type: "POST",
       //                      url: "/post-register",
       //                      data: {
       //                          customerName : info.fullname,
       //                          customerAddress : info.address,
       //                          customerPhone : info.phone,
       //                          customerEmail : info.email,
       //                          vaccineId : info.vaccineId,
       //                          quantity : info.quantity,
       //                          total : getTotal(info.price, info.quantity),
       //                          state  : 0
       //                      },
       //                      success: function (response) {
       //                          //show Order_Code
       //                          // $('#order-code').css({
       //                          //     'visibility': 'visible',
       //                          //     'display': 'block'
       //                          // });
       //                          // $('#form-register').css({
       //                          //     'visibility': 'hidden',
       //                          //     'display': 'none'
       //                          // });
       //                          // $('#order-code').css({
       //                          //     'visibility': 'visible',
       //                          //     'display': 'block'
       //                          // });
       //                          // $('#vaccine-order-code').text("006");
       //                          $('#vaccine-order-code').text(response.orderCode);
       //                      }
       //                  })
       //              )
       //            }
       //          })  
       //      } else {
       //          let errorArr = getFieldNull(info);
       //          let trueArr = getFieldTrue(info);
       //          resetText(trueArr);
       //          showError(errorArr);
       //      }
       //  });

       //  //check null function
       //  function getFieldNull(info) {
       //      var errorArr = [];
       //      if(info.fullname == "") {
       //          errorArr.push("#help-register-customer");
       //      }
       //      if(info.address == "") {
       //          errorArr.push("#help-address-customer");
       //      }
       //      if(info.phone == "") {
       //          errorArr.push("#help-phone-customer");
       //      }
       //      if(info.vaccineId == 0) {
       //          errorArr.push("#help-vaccine-customer");
       //      }
       //      if(info.quantity == "" || info.quantity == 0) {
       //          errorArr.push("#help-quantity");
       //      }
       //      return errorArr;
       //  }
       //  //get true value arr
       //  function getFieldTrue(info) {
       //      var arr = [];
       //      if(info.fullname != "") {
       //          arr.push("#help-register-customer");
       //      }
       //      if(info.address != "") {
       //          arr.push("#help-address-customer");
       //      }
       //      if(info.phone != "") {
       //          arr.push("#help-phone-customer");
       //      }
       //      if(info.vaccineId != 0) {
       //          arr.push("#help-vaccine-customer");
       //      }
       //      if(info.quantity != "" || info.quantity != 0) {
       //          arr.push("#help-quantity");
       //      }
       //      return arr;
       //  }
       //  //get error
       //  function getError(value) {
       //      if (value == "#help-register-customer") {
       //          return "Vui lòng nhập họ tên người đăng ký đơn tiêm chủng";
       //      }
       //      if (value == "#help-address-customer") {
       //          return "Vui lòng nhập địa chỉ người đăng ký đơn tiêm chủng";
       //      }
       //      if (value == "#help-phone-customer") {
       //          return "Vui lòng nhập số điện thoại người đăng ký đơn tiêm chủng";
       //      }
       //      if (value == "#help-vaccine-customer") {
       //          return "Vui lòng chọn vaccine tiêm chủng";
       //      }
       //      if (value == "#help-quantity") {
       //          return "Vui lòng chọn số lượng vaccine";
       //      }
       //  }
       //  //show error
       //  function showError(errorArr) {
       //      for (let index = 0, n = errorArr.length; index < n; index++) {
       //          $(errorArr[index]).text(getError(errorArr[index]));
       //      }
       //  }
       //  //reset text
       //  function resetText(elementArr) {
       //      for (let index = 0, n= elementArr.length; index < n; index++) {
       //          $(elementArr[index]).text("");
       //      }
       //  }

       //  //price
       //  $('#quantity').change(function (argument) {
       //      let price = $('#vaccine-register').find(':selected').attr('price');
       //      let quantity = $('#quantity').val();
       //      $('#price-total').text(getTotal(price, quantity) + " VNĐ");
       //  })
       //  $('#vaccine-register').change(function (argument) {
       //      let price = $('#vaccine-register').find(':selected').attr('price');
       //      let quantity = $('#quantity').val();
       //      $('#price-total').text(getTotal(price, quantity) + " VNĐ");
       //  })

       //  //get prica total
       //  function getTotal(price, quantity) {
       //      return price*quantity;
       //  }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="/js/vaccine-register.js"></script>
@endsection