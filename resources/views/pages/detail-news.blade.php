@extends('layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="container">
    <ul class="breadcrumb col-lg-12 col-sm-12 col-xs-12">
        <li><a href="/">Trang chủ</a></li>
        <li>Tin tức</li>
    </ul>
</div>
<div class="container reset-pading">
    <div class="row news-page-content mt20">
        <div class="col-md-8 col-sm-12 col-xs-12 news-detail">
            <h3>{{$post->title}}</h3>
            <div class="clearfix"></div>
            <div class="tinlienquan">
            </div>
            <div class="hiden-over content-clear" id="NewsContent">
                ​{!!$post->content!!}
            </div>
            <div class="clear">
            </div>
            <div class="clearfix"></div>
            
            <div class="clearfix"></div>
            <div class="news-other mt30">
                <h3 class="title-blue">CÁC TIN KHÁC</h3>
                <ul class="news-list">
                    <li><a title="The Sun Care nhận mua đặt trước theo y&#234;u cầu c&#225;c loại vắc xin với ph&#237; đặt trước 0 đồng" href="/tin-tuc/t26/the-sun-care-nhan-mua-dat-truoc-theo-yeu-cau-cac-loai-vac-xin-voi-phi-dat-truoc-0-dong.html">The Sun Care nhận mua đặt trước theo y&#234;u cầu c&#225;c loại vắc xin với ph&#237; đặt trước 0 đồng </a></li>
                    <li><a title="Khai trương trung t&#226;m ti&#234;m chủng chất lượng cao The Sun Care" href="/tin-tuc/t24/khai-truong-trung-tam-tiem-chung-chat-luong-cao-the-sun-care.html">Khai trương trung t&#226;m ti&#234;m chủng chất lượng cao The Sun Care </a></li>
                </ul>
            </div>
            <div class="clear">
            </div>
        </div><!-- end col-md-8-->
        <div class="col-md-4 col-sm-12 col-xs-12 side-right">
            <div class="mt15">
                <a href="" class="title-cm2">Hỏi đ&#225;p<span></span></a>
                <img src="/Images/Upload/User/quantri/2019/5/hinh-4-1499938641.jpg?w=480&h=320&mode=crop" />
                <h4><a href="">Bản th&#226;n vắc xin c&#243; g&#226;y ra những phản ứng g&#236; kh&#244;ng?</a></h4>
                <ul class="news-list">
                    <li><a href=""> C&#243; n&#234;n ti&#234;m vắc xin cho c&#225;c b&#224; mẹ đang cho con b&#250; kh&#244;ng?</a></li>
                    <li><a href="">Những ai n&#234;n ti&#234;m vắc xin ph&#242;ng c&#250;m?</a></li>
                    <li><a href="">Tại sao phải ti&#234;m vắc xin c&#250;m nhắc lại h&#224;ng năm?</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
 @endsection