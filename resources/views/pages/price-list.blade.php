@extends('layouts.master')
@section('content')
<div class="clearfix"></div>
<div class="container">
<ul class="breadcrumb col-lg-12 col-sm-12 col-xs-12">
<li><a href="/">Trang chủ</a></li>
<li>Bảng gi&#225;</li>
</ul>
</div>
<div class="container reset-pading">
<div class="row news-page-content mt20">
<div class="col-md-8 col-sm-12 col-xs-12 news-detail">
<div class="clearfix"></div>
<div class="hiden-over content-clear" id="NewsContent">
    <h2 class="text-center text-uppercase font-weight-bold">Bảng giá vaccine tiêm phòng tại trung tâm tiêm chủng</h2>
    <br>
    <h3 class="text-center text-uppercase font-weight-bold">được áp dụng từ ngày : {{$list[0]->updated_at->format('d-m-Y')}}</h3>
    <table class="table-bordered table">
        <thead>
            <tr>
                <th>Tên vaccine</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $item)    
            <tr>
                <td>{{$item->name}}</td>
                <td>{{number_format($item->reser_price)}} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="clear">
</div>
<div class="clear">
</div>
<div class="clear">
</div>
</div><!-- end col-md-8-->
<div class="col-md-4 col-sm-12 col-xs-12 side-right">
<div class="mt15">
<a href="/tin-tuc/c23/hoi-dap.html" class="title-cm2">Hỏi đ&#225;p<span></span></a>
<img src="Images/Upload/User/quantri/2019/5/hinh-4-1499938641.jpg?w=480&h=320&mode=crop" />
<h4><a href="/tin-tuc/t19/ban-than-vac-xin-co-gay-ra-nhung-phan-ung-gi-khong-.html">Bản th&#226;n vắc xin c&#243; g&#226;y ra những phản ứng g&#236; kh&#244;ng?</a></h4>
<ul class="news-list">
<li><a href="/tin-tuc/t18/co-nen-tiem-vac-xin-cho-cac-ba-me-dang-cho-con-bu-khong-.html"> C&#243; n&#234;n ti&#234;m vắc xin cho c&#225;c b&#224; mẹ đang cho con b&#250; kh&#244;ng?</a></li>
<li><a href="/tin-tuc/t17/nhung-ai-nen-tiem-vac-xin-phong-cum-.html">Những ai n&#234;n ti&#234;m vắc xin ph&#242;ng c&#250;m?</a></li>
<li><a href="/tin-tuc/t16/tai-sao-phai-tiem-vac-xin-cum-nhac-lai-hang-nam-.html">Tại sao phải ti&#234;m vắc xin c&#250;m nhắc lại h&#224;ng năm?</a></li>
</ul>
</div>
<ul class="bnr-linkhot ">
<li class="col-md-12 col-sm-6 col-xs-12"><a rel="nofollow" target="_blank"><img src="Images/Upload/User/quantri/2019/5/banner3.jpg"></a></li>
<li class="col-md-12 col-sm-6 col-xs-12"><a rel="nofollow" target="_blank"><img src="Images/Upload/User/quantri/2019/5/banner4.jpg"></a></li>
<li class="col-md-12 col-sm-6 col-xs-12"><a rel="nofollow" target="_blank"><img src="Images/Upload/User/quantri/2019/5/banner1.jpg"></a></li>
<li class="col-md-12 col-sm-6 col-xs-12"><a rel="nofollow" target="_blank"><img src="Images/Upload/User/quantri/2019/5/banner2.jpg"></a></li>
</ul>
</div>
</div><!-- end content-->
</div>
<script>
$('#NewsContent table').css("width", "");
$('#NewsContent table').removeAttr('width');
$('#NewsContent  img').removeAttr('width');
</script>
@endsection