{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Đăng ký tiêm chủng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  </head>
  <body> --}}
    {{-- margin: 191px auto; --}}
    @extends('layouts.master')
    @section('content')
    <div class="container my-4" style="margin: 191px auto;">
        <div class="row direct">
            <div class="col-md-6 text-center">
                <label for="" style="font-size: 12px; font-style: italic;">Nếu bạn muốn đăng ký tiêm chủng, nhấp nút dưới đây để đăng ký</label>
                <button class="btn btn-success btn-lg font-weight-bold" id="btn-register"><i class="fa fa-plus-circle" aria-hidden="true"></i> CHỌN ĐỂ ĐĂNG KÝ TIÊN CHỦNG</button>
            </div>
            <div class="col-md-6 text-center">
                <label for="" style="font-size: 12px; font-style: italic;">Bạn đã đăng ký và muốn xem thông tin tiêm chủng</label>
                <button class="btn btn-info btn-lg font-weight-bold" id="btn-show"><i class="fa fa-eye" aria-hidden="true"></i> XEM THÔNG TIN TIÊM CHỦNG</button>
            </div>
        </div>
    </div>
    <div class="container my-3" style="visibility: hidden; display: none;" id="form-register">
        <div class="title text-center my-5">
            <h2>ĐĂNG KÝ TIÊM CHỦNG</h2>
        </div>
        <div class="row">
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">HỌ VÀ TÊN : </label>
                <input type="text" name="" id="register-customer" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="help-register-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">ĐỊA CHỈ : </label>
                <input type="text" name="" id="address-register" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="help-address-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">SỐ ĐIỆN THOẠI : </label>
                <input type="text" name="" id="phone-register" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="help-phone-customer" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">EMAIL (nếu có) : </label>
                <input type="text" name="" id="email-register" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">VACCINE ĐĂNG KÝ : </label>
                <select id="vaccine-register" name="" class="form-control">
                    <option value="0">Chọn vaccine cần đăng ký</option>
                    <option value="volvo">Volvo XC90</option>
                    <option value="saab">Saab 95</option>
                    <option value="mercedes">Mercedes SLK</option>
                    <option value="audi">Audi TT</option>
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
    <div class="container my-4" style="visibility: hidden; display: none;" id="order-code">
        <div class="title text-center my-5">
            <h2 class="my-5 text-success">ĐĂNG KÝ THÀNH CÔNG</h2>
            <h4 class="d-inline">Mã đơn đăng ký tiêm chủng của khách hàng : </h4> <h4 id="vaccine-order-code" class="text-success d-inline font-weight-bold">005</h4>
            <br>
            <h4 class="d-inline">Chi phí đăng ký tiêm chủng của khách hàng : </h4> <h4 id="order-price" class="text-warning d-inline font-weight-bold">005</h4> <h4 class="font-weight-bold d-inline text-warning">VNĐ</h4>
            <div class="pay-info my-5" style="width: 50%; margin: auto; border: 3px solid green;">
                <span class="d-block my-3 font-weight-bold">Khách hàng vui lòng thanh toán đơn đăng ký tiêm chủng đến số tài khoản dưới đây để hoàn tất thanh toán đăng ký tiên chủng</span>
                <span class="font-italic d-block my-3">STK : 105867843215</span>
                <span class="font-italic d-block my-3">BANK : VIETINBANK</span>
                <span class="font-italic d-block my-3">CHI NHÁNH : CHI NHÁNH THÀNH ĐÔ</span>
                <span class="font-italic d-block my-3">NỘI DUNG : Thanh toán mã đăng ký tiêm chủng + mã đơn tiêm chủng đã được cung cấp</span>
            </div>
            <span class="font-italic d-block my-3">Khách hàng có thể dùng mã đơn đăng ký tiêm chủng trên để kiểm tra thông tin tiêm chủng tại mục "Xem thông tin tiêm chủng"</span>
        </div>
    </div>
    <div class="container my-3" style="visibility: hidden; display: none;" id="form-info">
        <div class="title text-center my-5">
            <h2>THÔNG TIN TIÊM CHỦNG</h2>
        </div>
        <div class="row">
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">MÃ ĐƠN TIÊM CHỦNG : </label>
                <input type="text" name="" id="vaccine-code" class="form-control" placeholder="" aria-describedby="helpId">
                <span id="for-vaccine-code" class="font-italic" style="font-size: 13px; font-weight: 400; color: gray;">Nhập mã đơn tiêm chủng đã được gửi đến cho bạn</span>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <button class="btn btn-lg btn-success" id="btn-info">XEM THÔNG TIN</button>
            </div>
            
            <div class="col-md-6 form-group my-3" id="vaccine-info" style="margin: auto; visibility: hidden; display: none;">
                <hr>
                <label for="" class="font-weight-bold">MÃ TIÊM CHỦNG : </label> <p class="d-inline" id="order-code">002</p>
                <br>
                <label for="" class="font-weight-bold">NGƯỜI ĐĂNG KÝ : </label> <p class="d-inline text-capitalize" id="customer-name">hà văn lợi</p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">ĐỊA CHỈ : </label> <p class="d-inline text-capitalize" id="customer-address">Hà Nội</p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">số điện thoại : </label> <p class="d-inline" id="customer-phone">096666478</p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">vaccine đã đăng ký : </label> <p class="d-inline text-uppercase" id="vaccine-name">vaccine-ymb</p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">số lượng : </label> <p class="d-inline" id="vaccine-quantity">2</p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">tổng tiền : </label> <p class="d-inline" id="price-total">560000 VNĐ</p>
                <br>
                <label for="" class="font-weight-bold text-uppercase">trạng thái : </label> <p class="d-inline text-uppercase" id="order-state">đã thanh toán</p>
            </div>
        </div>
    </div>

    <script>
        $('#btn-register').click(function(){
            $('#form-info').css({
                'visibility': 'hidden',
                'display': 'none'
            });
            $('#form-register').css({
                'visibility': 'visible',
                'display': 'block'
            });
        });

        $('#btn-show').click(function(){
            $('#form-register').css({
                'visibility': 'hidden',
                'display': 'none'
            });
            $('#vaccine-info').css({
                'visibility': 'hidden',
                'display': 'none'
            });
            $('#form-info').css({
                'visibility': 'visible',
                'display': 'block'
            });
        });

        $('#btn-info').click(function(){
            let vaccineCode = $('#vaccine-code').val();
            console.log(vaccineCode);
            if(vaccineCode != "") {
                $.ajax({
                    type: "method",
                    url: "url",
                    data: {
                        vaccineCode : vaccineCode
                    },
                    success: function (response) {
                        console.log(response);
                        if (response != null) {
                            $('#vaccine-info').css({
                                'visibility': 'visible',
                                'display': 'block'
                            });
                            //fix css span for vaccine-code
                            $('#for-vaccine-code').text("Nhập mã đơn tiêm chủng đã được gửi đến cho bạn");
                            $('#for-vaccine-code').css('color', 'gray');
                            //assign value for each info field
                            // $('#order-code').val() = response.value;
                            // $('#customer-name').val() = response.value;
                            // $('#customer-address').val() = response.value;
                            // $('#customer-phone').val() = response.value;
                            // $('#vaccine-name').val() = response.value;
                            // $('#vaccine-quantity').val() = response.value;
                            // $('#price-total').val() = response.value;
                            // $('#order-state').val() = response.value;
                        } else {
                            $('#for-vaccine-code').text("Mã đơn tiêm chủng không tồn tại, vui lòng nhập lại");
                            $('#for-vaccine-code').css('color', 'red');
                        }
                    }
                });
            } else {
                $('#for-vaccine-code').text("Mã đơn tiêm chủng không được để trống");
                $('#for-vaccine-code').css('color', 'red');
            }
        });

        $('#confirm-register').click(function(){
            var info = {
                'fullname' : $('#register-customer').val(),
                'address' : $('#address-register').val(),
                'phone' : $('#phone-register').val(),
                'email' : $('#email-register').val(),
                'vaccineId' : $('#vaccine-register').val(),
                'quantity' : $('#quantity').val()
            };
            if (getFieldNull(info) == "") {
                //sweet alert2 to confirm

                //call ajax to add order register
                // $.ajax({
                //     type: "method",
                //     url: "url",
                //     data: {

                //     },
                //     success: function (response) {
                //         //show Order_Code
                //         $('#order-code').css({
                //             'visibility': 'visible',
                //             'display': 'block'
                //         });
                //         $('#vaccine-order-code').text(response.orderCode);
                //     }
                // });
                $('#form-register').css({
                    'visibility': 'hidden',
                    'display': 'none'
                });
                $('#order-code').css({
                    'visibility': 'visible',
                    'display': 'block'
                });
                $('#vaccine-order-code').text("006");
            } else {
                let errorArr = getFieldNull(info);
                let trueArr = getFieldTrue(info);
                resetText(trueArr);
                showError(errorArr);
            }
        });

        //check null function
        function getFieldNull(info) {
            var errorArr = [];
            if(info.fullname == "") {
                errorArr.push("#help-register-customer");
            }
            if(info.address == "") {
                errorArr.push("#help-address-customer");
            }
            if(info.phone == "") {
                errorArr.push("#help-phone-customer");
            }
            if(info.vaccineId == 0) {
                errorArr.push("#help-vaccine-customer");
            }
            if(info.quantity == "" || info.quantity == 0) {
                errorArr.push("#help-quantity");
            }
            return errorArr;
        }
        //get true value arr
        function getFieldTrue(info) {
            var arr = [];
            if(info.fullname != "") {
                arr.push("#help-register-customer");
            }
            if(info.address != "") {
                arr.push("#help-address-customer");
            }
            if(info.phone != "") {
                arr.push("#help-phone-customer");
            }
            if(info.vaccineId != 0) {
                arr.push("#help-vaccine-customer");
            }
            if(info.quantity != "" || info.quantity != 0) {
                arr.push("#help-quantity");
            }
            return arr;
        }
        //get error
        function getError(value) {
            if (value == "#help-register-customer") {
                return "Vui lòng nhập họ tên người đăng ký đơn tiêm chủng";
            }
            if (value == "#help-address-customer") {
                return "Vui lòng nhập địa chỉ người đăng ký đơn tiêm chủng";
            }
            if (value == "#help-phone-customer") {
                return "Vui lòng nhập số điện thoại người đăng ký đơn tiêm chủng";
            }
            if (value == "#help-vaccine-customer") {
                return "Vui lòng chọn vaccine tiêm chủng";
            }
            if (value == "#help-quantity") {
                return "Vui lòng chọn số lượng vaccine";
            }
        }
        //show error
        function showError(errorArr) {
            for (let index = 0, n= errorArr.length; index < n; index++) {
                $(errorArr[index]).text(getError(errorArr[index]));
                
            }
        }
        //reset text
        function resetText(elementArr) {
            for (let index = 0, n= elementArr.length; index < n; index++) {
                $(elementArr[index]).text("");
            }
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @endsection