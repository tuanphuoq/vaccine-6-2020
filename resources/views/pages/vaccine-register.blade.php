@extends('layouts.master')
@section('css')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('../css/custom.css')}}">
@endsection
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
    {{-- <div class="container my-3" style="visibility: hidden; display: none; padding-bottom: 100px;" id="form-register"> --}}
    <div class="container my-3" style="padding-bottom: 100px;" id="form-register">
        <div class="title text-center my-5">
            <h1 class="font-weight-bold" style="font-size: 30px;">THÔNG TIN ĐĂNG KÝ TIÊM CHỦNG</h1>
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
                <label for="">EMAIL (Vui lòng nhập chính xác email để chúng tôi có thể gửi thông tin đến bạn sau khi đăng ký tiêm chủng thành công) : </label>
                <input type="text" name="" id="email-register" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
                <small id="help-email-customer" class="text-danger font-italic"></small>
            </div>
            {{-- time --}}
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">CHỌN NGÀY TIÊM CHỦNG : </label>
                <input type="text" name="vaccineDate" id="vaccineDate" class="form-control" placeholder="" aria-describedby="helpId" style="height: 35px;font-size: 15px;">
                <small id="help-vaccine-date" class="text-danger font-italic"></small>
            </div>
            <div class="col-md-9 form-group font-weight-bold my-3" style="margin: auto;">
                <label for="">CHỌN GIỜ TIÊM CHỦNG (8:00 - 17:00) : </label>
                <input type="number" id="vaccineTime" name="vaccineTime" min="8" max="17" class="form-group"> (giờ)
                <small id="help-quantity" class="text-danger font-italic"></small>
            </div>
            {{-- end --}}
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
    {{-- <div class="container my-4" style="padding-bottom: 100px;" id="order-code"> --}}
        <div class="title text-center my-5">
            <h2 class="my-5 text-success font-weight-bold" style="font-size: 30px;">ĐĂNG KÝ THÀNH CÔNG</h2>
            <h4 class="text-danger">Chú ý : Chúng tôi đã gửi thông tin tiêm chủng qua email bạn đã đăng ký, Vui lòng kiểm tra email để xác nhận các thông tin tiêm chủng.</h4>
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
            <hr>
            <section style="margin-top : 5rem;">
                <div>
                    <h1 style="font-size: 2.5rem; font-weight : 700;" class="text-primary text-uppercase">Vui lòng khai báo y tế tại đây</h1>
                    <div class="text-left" style="margin-top : 1rem;">Khai báo y tế giúp tiết kiệm thời gian của bạn khi đến trung tâm tiêm chủng. Nếu bạn không muốn khai báo ngay lúc này, bạn có thể khai báo trực tiếp tại trung tâm tiêm chủng.</div>
                </div>
                <section class="template-section" style="padding: 2rem 1rem;">
                    {{-- <h1 style="font-size: 2.5rem; font-weight : 700;">MẪU KHAI BÁO Y TẾ</h1> --}}
                    <h1 style="font-size: 2.5rem; font-weight : 700;" class="text-uppercase">{{isset($template) ? $template->template_name : "MẪU KHAI BÁO CHƯA XÁC ĐỊNH"}}</h1>
                    <input type="hidden" class="form-control question-input" name="templateID" value="{{isset($template) ? $template->id : 0 }}">
                    @if (isset($template->questions))
                        @foreach ($template->questions as $item)
                        <div class="mt-3 text-left">
                            <div class="form-group">
                                <label question-id="{{isset($item) ? $item->id : 0}}" for="">{{isset($item) ? $item->question : "Câu hỏi chưa xác định"}} :</label>
                                <input type="text" class="form-control question-input answes" name="questions[]" value="" required maxlength="255">
                            </div>
                        </div>    
                        @endforeach
                    @endif
                    <div class="mt-3"><button class="btn btn-lg btn-success" id="confirm-template">Xác nhận khai báo y tế</button></div>
                </section>
            </section>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="/js/vaccine-register.js"></script>
    <script>
        $(document).ready(function() {
            $(".input-group-addon > .glyphicon-calendar").remove();
            html = '<i class="fa fa-calendar" aria-hidden="true"></i>'
            $(".input-group-addon").append(html)
        })
        $('#vaccineDate').datepicker({
            uiLibrary: 'bootstrap',
        });
    </script>
@endsection