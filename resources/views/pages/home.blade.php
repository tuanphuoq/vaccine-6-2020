@extends('layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="banner">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <a>  <img src="Images/Upload/User/quantri/2019/5/1.jpg" alt="Slider"></a>
            </div>
            <div class="item">
                <a>  <img src="Images/Upload/User/quantri/2019/5/bnr03.jpg" alt="Slider"></a>
            </div>
        </div>
    </div>
</div><!-- end banner-->
<div class="about">
    <div class="container">
        <h2 class="title-cm textblue">Giới thiệu về hệ thống ti&#234;m chủng The Sun Care</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 maxheight03">
                <img src="Content/images/about-img.jpg" alt="giới thiệu">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 maxheight03 about-main">
                <div>
                    <p class="about-content">
                        Hệ thống tiêm chủng The Suncare (thuộc Công ty Cổ phần dinh dưỡng và sức khỏe The Sun) chính thức đi vào hoạt động từ tháng 5 năm 2019. Trong bối cảnh thế giới đang phải đương đầu với tình trạng biến đổi phức tạp của các chủng vi khuẩn gây bệnh cũng như sự thiếu hụt vắc xin tại Việt Nam như hiện nay, Hệ thống tiêm chủng The Suncare ra đời nhằm cung cấp cho trẻ em Việt Nam những loại vắc xin có chất lượng tốt nhất cùng với hệ thống phòng tiêm chủng an toàn, hiện đại và cao cấp.<br>
                    </p>
                    <a class="text-center btn-block" href="">
                        <span class="btn-blue">Xem thêm <i class="fa">&#xf101;</i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service">
    <div class="container">
        <h2 class="title-cm textwhite">Dịch vụ tiêm chủng</h2>
        <ul class="row service-list">
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="">
                    <img src="Content/images/dichvu01.jpg" alt="Ti&#234;m chủng trọn g&#243;i" />
                    <p>Ti&#234;m chủng trọn g&#243;i</p>
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="">
                    <img src="Content/images/dichvu02.jpg" alt="G&#243;i Vacxin trẻ em" />
                    <p>G&#243;i Vacxin trẻ em</p>
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="">
                    <img src="Content/images/dichvu03.jpg" alt="G&#243;i Vacxin người lớn" />
                    <p>G&#243;i Vacxin người lớn</p>
                </a>
            </li>
            <li class="col-md-3 col-sm-3 col-xs-6">
                <a href="">
                    <img src="Content/images/dichvu04.jpg" alt="Ti&#234;m ch&#250;ng theo y&#234;u cầu" />
                    <p>Ti&#234;m ch&#250;ng theo y&#234;u cầu</p>
                </a>
            </li>
        </ul>
    </div>
</div><!-- end service-->
<div class="product">
    <div class="slide02 container">
        <h2 class="title-cm textblue"><a href="{{route('vaccine')}}">Danh mục sản phẩm</a></h2>
        <ul id="flexiselDemo2">
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image.jpeg?w=360&h=240&mode=crop"></a>
                <p>SYNFLORIX - Vắc xin ngừa phế cầu</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image_(2).jpeg?w=360&h=240&mode=crop"></a>
                <p>Vắc xin ph&#242;ng vi&#234;m m&#224;ng n&#227;o do n&#227;o m&#244; cầu B+C</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image_(1).jpeg?w=360&h=240&mode=crop"></a>
                <p>Vắc xin ph&#242;ng Vi&#234;m n&#227;o Nhật Bản</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image3942.jpeg?w=360&h=240&mode=crop"></a>
                <p>TETRAXIM - Vắc xin 4 trong 1</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image_(6).jpeg?w=360&h=240&mode=crop"></a>
                <p>Vắc xin 6 trong 1</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image_(4)8819.jpeg?w=360&h=240&mode=crop"></a>
                <p>Vắc xin 3 trong 1 ph&#242;ng Sởi - Quai bị - Rubella</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image_(2).jpeg?w=360&h=240&mode=crop"></a>
                <p>Vắc xin ph&#242;ng ti&#234;u chảy do Rota Virus</p>
            </li>
            <li>
                <a href=""><img src="Images/Upload/User/quantri/2019/7/image_(1)542.jpeg?w=360&h=240&mode=crop"></a>
                <p>Vắc xin ph&#242;ng Lao</p>
            </li>
        </ul>
    </div>
    <a class="text-center btn-block" href="{{route('vaccine')}}">
        <span class="btn-blue">Xem tất cả <i class="fa">&#xf101;</i></span>
    </a>
</div>
<div class="news">
    <div class="container">
        <h2 class="title-cm textblue"><a href="">Dinh dưỡng</a></h2>
        <ul class="row">
            <li class="col-md-4 col-sm-4 col-xs-6">
                <a href="">
                    <img src="Content/images/news01.jpg?w=360&h=216&mode=crop" alt="">
                    <div class="maxheight">
                        <h4>T&#236;nh trạng thiếu vi chất dinh dưỡng: Cải thiện nhờ đa dạng h&#243;a bữa ăn</h4>
                        <p>Để giảm tỷ lệ suy dinh dưỡng thấp c&#242;i v&#224; thiếu vi chất dinh dưỡng ở trẻ, biện ph&#225;p l&#226;u d&#224;i v&#224; cơ bản, c&#243; t&#237;nh bền vững cao l&#224; cải thiện chất lượng bữa ăn, sao cho khẩu phần ăn cung cấp đầy đủ, c&#226;n đối nhu cầu về mặt dinh dưỡng. </p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-6">
                <a href="">
                    <img src="Content/images/news02.jpg?w=360&h=216&mode=crop" alt="">
                    <div class="maxheight">
                        <h4>Thịt lợn kh&#244;ng thể thiếu trong bữa ăn gia đ&#236;nh</h4>
                        <p>Thịt lợn l&#224; m&#243;n ăn truyền thống, th&#244;ng dụng nhất trong mỗi gia đ&#236;nh, đặc biệt l&#224; ở v&#249;ng n&#244;ng th&#244;n người ta sử dụng nhiều v&#224; thường xuy&#234;n trong c&#225;c bữa ăn </p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-6">
                <a href="">
                    <img src="Content/images/news06.jpg?w=360&h=216&mode=crop" alt="">
                    <div class="maxheight">
                        <h4>Chế độ dinh dưỡng cho người bệnh tăng huyết &#225;p</h4>
                        <p>Tăng huyết &#225;p (THA) chiếm tỉ lệ cao trong c&#225;c bệnh tim mạch. Theo Tổ chức Y tế Thế giới, tỉ lệ THA 3 - 18% d&#226;n số thế giới, ở Việt Nam, theo điều tra của Viện Tim mạch (2008), tỉ lệ THA l&#224; 25,1% ở những người &gt; 25 tuổi. </p>
                    </div>
                </a>
            </li>
        </ul>
        <div class="text-center mt20">
            <a href="" class="btn-blue">Xem tất cả <i class="fa">&#xf101;</i></a>
        </div>
    </div>
</div>
@endsection
