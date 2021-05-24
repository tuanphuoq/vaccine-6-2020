<!doctype html>
<html lang="en">
    <head>
        <title>Đơn đăng ký tiêm chủng{{isset($order->customer_name) ? " - ".$order->customer_name : ""}}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        @if (isset($order) && $order != null)
        <div class="container mt-4" style="border : 1px solid gray;">
            <h1 class="text-uppercase text-center p-5 mt-2">đơn đăng ký tiêm chủng</h1>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Mã đơn đăng ký</th>
                        <td>{{isset($order->id) ? $order->id : "unknow"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tên khách hàng</th>
                        <td>{{isset($order->customer_name) ? $order->customer_name : "unknow"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Địa chỉ</th>
                        <td>{{isset($order->customer_address) ? $order->customer_address : "unknow"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Điện thoại liên lạc</th>
                        <td>{{isset($order->customer_phone) ? $order->customer_phone : "unknow"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Vaccine đăng ký tiêm chủng</th>
                        <td>{{isset($order->vaccine_name) ? $order->vaccine_name : "unknow"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Số lượng</th>
                        <td>{{isset($order->quantity) ? $order->quantity : "unknow"}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tổng tiền</th>
                        <td>{{isset($order->total) ? $order->total." VNĐ" : "unknow"}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h1 class="text-uppercase text-center py-4">thông tin khai báo y tế</h1>
            <form>
                @if (isset($order->template))
                    @foreach ($order->template as $item)
                    <div class="form-group">
                        <label>{{$item['question']}}</label>
                        <input type="text" class="form-control" value="{{$item['answer']}}">
                    </div>    
                    @endforeach
                @endif
                {{-- <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" value="">
                </div> --}}
            </form>
        </div>
        @else
        <div class="container mt-4" style="border : 1px solid gray;">
            <h1 class="text-uppercase text-center p-5 mt-2 text-danger">không có thông tin đăng ký tiêm chủng</h1>
        </div>
        @endif
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>