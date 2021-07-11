$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
    $('#order-code').css({
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
    if(vaccineCode != "") {
        $.ajax({
            type: "GET",
            url: "/get-register",
            data: {
                vaccineCode : vaccineCode
            },
            success: function (response) {
                if (response != "") {
                    var order = response.data;
                    $('#vaccine-info').css({
                        'visibility': 'visible',
                        'display': 'block'
                    });
                    //fix css span for vaccine-code
                    $('#for-vaccine-code').text("Nhập mã đơn tiêm chủng đã được gửi đến cho bạn");
                    $('#for-vaccine-code').css('color', 'gray');
                    //assign value for each info field
                    $('p#order-code').text(order['id']);
                    $('#customer-name').text(order['customer_name']);
                    $('#customer-address').text(order['customer_address']);
                    $('#customer-phone').text(order['customer_phone']);
                    $('#vaccine-name').text(order['vaccine_name'] + " - " + order['vaccine_allocate']);
                    $('#vaccine-quantity').text(order['quantity']);
                    $('p#price-total').text(order['total'] + " VNĐ");
                    if(order['state'] == 0) {
                        $('#order-state').text("CHƯA THANH TOÁN");
                    } else {
                        $('#order-state').text("ĐÃ THANH TOÁN");
                    }
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
        'vaccineDate' : $('#vaccineDate').val(),
        'vaccineTime' : $('#vaccineTime').val(),
        'vaccineId' : $('#vaccine-register').val(),
        'quantity' : $('#quantity').val(),
        'price' : $('#vaccine-register').find(':selected').attr('price')
    };
    if (getFieldNull(info) == "") {
        //sweet alert2 to confirm
        Swal.fire({
            // title: 'Are you sure?',
            text: "Xác nhận đăng ký tiêm chủng",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
            Swal.fire(
                'Đăng ký tiêm chủng thành công',
                //call ajax to add order register
                $.ajax({
                    type: "POST",
                    url: "/post-register",
                    data: {
                        customerName : info.fullname,
                        customerAddress : info.address,
                        customerPhone : info.phone,
                        customerEmail : info.email,
                        vaccineDate : info.vaccineDate,
                        vaccineTime : info.vaccineTime,
                        vaccineId : info.vaccineId,
                        quantity : info.quantity,
                        total : getTotal(info.price, info.quantity),
                        state  : 0
                    },
                    success: function (response) {
                        //show Order_Code
                        $('#order-code').css({
                            'visibility': 'visible',
                            'display': 'block'
                        });
                        $('#form-register').css({
                            'visibility': 'hidden',
                            'display': 'none'
                        });
                        $('#vaccine-order-code').text(response.code);
                        $('#order-price').text(response.total);
                    }
                })
            )
            }
        })  
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
    if(info.email == "") {
        errorArr.push("#help-email-customer");
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
    if (value == "#help-email-customer") {
        return "Vui lòng nhập email người đăng ký tiêm chủng";
    }
}
//show error
function showError(errorArr) {
    for (let index = 0, n = errorArr.length; index < n; index++) {
        $(errorArr[index]).text(getError(errorArr[index]));
    }
}
//reset text
function resetText(elementArr) {
    for (let index = 0, n= elementArr.length; index < n; index++) {
        $(elementArr[index]).text("");
    }
}

// check time register
$('input[name=vaccineTime]').change(function() {
    if ($(this).val() != "") {
        date = $('input[name=vaccineDate]').val()
        if (date == "") {
            $(this).after('<div class="text-danger">Vui lòng chọn ngày tiêm chủng.</div>')
        } else {
            var data1 = {
                'time' : $(this).val(),
                'date' : date
            }
            $.ajax({
                type: "GET",
                url: "/check-date-time",
                data: data1,
                success: function (response) {
                    console.log(response);
                    if (response.status == false) {
                        // Swal.fire('Khai báo y tế thành công.')
                        let html = '<div class="text-danger">'+response.message+'</div>'
                        $('#help-quantity').after(html)
                    }
                }
            })
        }
    }
})

//price
$('#quantity').change(function (argument) {
    let price = $('#vaccine-register').find(':selected').attr('price');
    let quantity = $('#quantity').val();
    $('#price-total').text(getTotal(price, quantity) + " VNĐ");
})
$('#vaccine-register').change(function (argument) {
    let price = $('#vaccine-register').find(':selected').attr('price');
    let quantity = $('#quantity').val();
    $('#price-total').text(getTotal(price, quantity) + " VNĐ");
})

//get prica total
function getTotal(price, quantity) {
    return price*quantity;
}

//validate data
function validateInput1(param1, param2)
{
    var check = true
    check = param1 == "" ? false : true
    check = param2 == "" ? false : true
    return check
}
//confirm template
$('#confirm-template').on('click', function() {
    var orderID = $('#vaccine-order-code').text()
    var templateID = $('input[name=templateID]').val()
    var questions = $('input.answes')
    var arr = []
    var checkFill = true
    var validateInput = validateInput1(orderID, templateID)
    $.each(questions, function(index) {
        checkFill = $(this).val() == "" ? false : true
        let item = []
        item = {
            'question' : $($(this).prev()).attr('question-id'),
            'answer' : $(this).val()
        }
        arr.push(item)
    })
    if (validateInput && checkFill) {
        var data1 = {
            'orderID' : orderID,
            'templateID' : templateID,
            'arr' : arr
        }
        $.ajax({
            type: "POST",
            url: "/post-template",
            data: data1,
            success: function (response) {
                if (response.status == true) {
                    Swal.fire('Khai báo y tế thành công.')
                } else {
                    Swal.fire('Khai báo y tế thất bại. Vui lòng thử lại.')
                }
            }
        })
    } else {
        Swal.fire('Vui lòng nhập đầy đủ thông tin các thông tin yêu cầu.')
    }
})