<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="REFRESH" content="1800">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta content="INDEX,FOLLOW" name="robots" />
    <link rel="shortcut icon" href="{{asset('Content/images/logo.png')}}" />
    <meta property="fb:app_id" content="673483492848549" />
    <title>Dịch vụ ti&#234;m chủng v&#224; tư vấn dinh dưỡng</title>
    <link rel="stylesheet" href="{{asset('Content/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('Content/css/common.css?vs=06')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('Content/css/jquery.mmenu.all.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('Content/css/style.css?vs=06')}}">
    <!-- slide chân trang-->
    <link href="{{asset('Content/css/chantrang.css?vs=06')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('Content/css/extend.css?a=5')}}">
    @yield('css')
</head>
<body>
    
    <script src="{{asset('Content/js/jquery.min.js')}}"></script>
    <script src="{{asset('Content/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Content/js/jquery.mmenu.min.all.js')}}"></script>
    <script type="text/javascript" src="{{asset('Content/js/jquery.flexisel.js')}}"></script>
    <script type="text/javascript" src="{{asset('Content/js/jquery.matchHeight.js')}}"></script>
    <script src="{{asset('Content/js/script.js')}}"></script>
    <header>
        <div class="container">
            <div class="logo pull-left">
                <a href="{{asset('')}}"><img src="Images/avt-vaccine.png" alt="Tiêm chủng"></a>
            </div>
            <div class="pull-right nav-right">
                <ul class="list-inline">
                    <li><a href="{{asset('')}}"><img src="{{asset('Content/images/icon-f.png')}}" alt="Facebook"></a></li>
                    <li class="hotline"><img src="{{asset('Content/images/hotline.png?vs=03')}}" alt="1900636036"></li>
                </ul>
                <div class="hotline"></div>
            </div>
        </div>
        <div class="nav-top">
            <nav class="container">
                <ul>
                    <li>
                        <a href="{{asset('')}}">Giới thiệu</a>
                        <ul  class='ul02'>  <li><a  href="">Về công ty</a></li> <li><a  href="">Tầm nhìn</a></li> <li><a  href="">Sứ mệnh</a></li> <li><a  href="">Mục tiêu chất lượng</a></li> <li><a  href="">Đội ngũ chuyên gia</a></li></ul>
                    </li>
                    <li>
                        <a href="{{asset('')}}vaccine">Vắc xin</a>
                        <ul  class='ul02'>  <li><a  href="">Danh mục sản phẩm</a></li> <li><a  href="">Danh mục vắc xin hiện có</a></li></ul>
                    </li>
                    <li>
                        <a href="">Dịch vụ g&#243;i ti&#234;m</a>
                        <ul  class='ul02'>  <li><a  href="">Tiêm chủng trọn gói</a></li> <li><a  href="">Gói Vacxin trẻ em</a></li> <li><a  href="">Gói Vacxin người lớn</a></li> <li><a  href="">Tiêm chúng theo yêu cầu</a></li></ul>
                    </li>
                    <li>
                        <a href="{{asset('')}}news">Tin tức</a>
                    </li>
                    <li>
                        <a href="{{asset('')}}vaccine-register">Đăng ký tiêm chủng</a>
                    </li>
                    <li>
                        <a href="">Dinh dưỡng</a>
                        <ul  class='ul02'>  <li><a  href="">Sản phẩm dinh dưỡng</a></li> <li><a  href="">Dịch vụ tư vấn dinh dưỡng</a></li> <li><a  href="">Cẩm nang dinh dưỡng</a></li></ul>
                    </li>
                    <li>
                        <a href="{{asset('')}}price-list">Bảng gi&#225;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="nav-mobile">
        <div class="header-m">
            <a href="/">
                <img src="{{asset('Content/images/logo-top.png')}}" alt="Tiêm chủng" class="m-logo pull-left">
            </a>
            <a href="#menu" style="display: block; width: 100%;">
                <img src="{{asset('Content/images/ico-menu.png')}}" class="ico-menu">
            </a>
        </div>
        <div id="menu">
            <ul>
                <li>
                    <a href="">Giới thiệu</a>
                    <ul  class='ul02'>  <li><a  href="">Về công ty</a></li> <li><a  href="">Tầm nhìn</a></li> <li><a  href="">Sứ mệnh</a></li> <li><a  href="">Mục tiêu chất lượng</a></li> <li><a  href="">Đội ngũ chuyên gia</a></li></ul>
                </li>
                <li>
                    <a href="">Vắc xin</a>
                    <ul  class='ul02'>  <li><a  href="">Danh mục sản phẩm</a></li> <li><a  href="">Danh mục vắc xin hiện có</a></li></ul>
                </li>
                <li>
                    <a href="">Dịch vụ g&#243;i ti&#234;m</a>
                    <ul  class='ul02'>  <li><a  href="">Tiêm chủng trọn gói</a></li> <li><a  href="">Gói Vacxin trẻ em</a></li> <li><a  href="">Gói Vacxin người lớn</a></li> <li><a  href="">Tiêm chúng theo yêu cầu</a></li></ul>
                </li>
                <li>
                    <a href="">Tin tức</a>
                </li>
                <li>
                    <a href="">Cẩm nang ti&#234;m chủng</a>
                </li>
                <li>
                    <a href="">Dinh dưỡng</a>
                    <ul  class='ul02'>  <li><a  href="">Sản phẩm dinh dưỡng</a></li> <li><a  href="">Dịch vụ tư vấn dinh dưỡng</a></li> <li><a  href="">Cẩm nang dinh dưỡng</a></li></ul>
                </li>
                <li>
                    <a href="">Bảng gi&#225;</a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content')
    <footer>
        <div class="f-content02">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a href="/" style="display:block; margin-top: 20px;"><img src="Images/avt-vaccine.png" alt="Tiêm chủng"></a><br>
                        <strong>CÔNG TY CỔ PHẦN DINH DƯỠNG VÀ SỨC KHỎE - VNVC</strong>
                        <p>
                            Địa chỉ: A12 Tòa CT2A - Khu Đô thị Tân Tây Đô, Tân Lập, Đan Phượng, HN (mặt đường QL32)<br>
                            Tel: <span style="font-size: 17px; font-weight: bold;">1900636036</span><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="top_gototop"><a href="#" class="gototop clearfix"><img src="{{asset('Content/images/gotop.png')}}" alt="lên đầu trang" /></a></div>
    <div id="fb-root"></div>
    <div class="clearfix">
    </div>
    <script>
</script>
@yield('script')
</body>
</html>
