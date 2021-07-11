@extends('layouts.masterad')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-3 col-xl-3">
              <div class="card card-body has-bg-image" style="background: #0052D4;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #6FB1FC, #4364F7, #0052D4);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #6FB1FC, #4364F7, #0052D4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
              border-radius: 1rem;
              padding: 1rem;">
                  <div class="media" style="display: flex;
                  justify-content: space-between;">
                      <div class="media-body" style="padding-left: 3rem;">
                          <h3 class="mb-0"><a href="{{route('admin.vaccine')}}" style="color : white;">{{$vaccines}}</a></h3>
                          <span class="text-uppercase font-size-theme"><a href="{{route('admin.vaccine')}}" style="color : white;">{{ __('Vaccine tiêm chủng') }}</a></span>
                      </div>
  
                      <div class="ml-3" style="align-self: center; font-size: 3rem; padding-right: 3rem;">
                        <a href="{{route('admin.vaccine')}}" style="color : white;">
                          <i class="fa fa-eyedropper" aria-hidden="true"></i>
                        </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 col-xl-3">
              <div class="card card-body has-bg-image" style="background: #FF512F;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #F09819, #FF512F);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #F09819, #FF512F); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
              border-radius: 1rem;
              padding: 1rem;">
                  <div class="media" style="display: flex;
                  justify-content: space-between;">
                      <div class="media-body" style="padding-left: 3rem;">
                          <h3 class="mb-0"><a href="{{route('admin.post')}}" style="color : white;">{{$posts}}</a></h3>
                          <span class="text-uppercase font-size-theme"><a href="{{route('admin.post')}}" style="color : white;">{{ __('Bài viết - thông tin') }}</a></span>
                      </div>
  
                      <div class="ml-3" style="align-self: center; font-size: 3rem; padding-right: 3rem;">
                        <a href="{{route('admin.post')}}" style="color : white;">
                          <i class="fa fa-file-word-o" aria-hidden="true"></i>
                        </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 col-xl-3">
              <div class="card card-body has-bg-image" style="background: #4DA0B0;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to bottom, #D39D38, #4DA0B0);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to bottom, #D39D38, #4DA0B0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
              border-radius: 1rem;
              padding: 1rem;">
                  <div class="media" style="display: flex;
                  justify-content: space-between;">
                      <div class="media-body" style="padding-left: 3rem;">
                          <h3 class="mb-0"><a href="{{route('admin.order')}}" style="color : white;">{{$orders}}</a></h3>
                          <span class="text-uppercase font-size-theme"><a href="{{route('admin.order')}}" style="color : white;">{{ __('đơn đăng ký') }}</a></span>
                      </div>
  
                      <div class="ml-3" style="align-self: center; font-size: 3rem; padding-right: 3rem;">
                        <a href="{{route('admin.order')}}" style="color : white;">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 col-xl-3">
            <div class="card card-body has-bg-image" style="background: #BE93C5;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #7BC6CC, #BE93C5);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #7BC6CC, #BE93C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
            border-radius: 1rem;
            padding: 1rem;">
                <div class="media" style="display: flex;
                justify-content: space-between;">
                    <div class="media-body" style="padding-left: 3rem;">
                        <h3 class="mb-0"><a href="{{route('admin.vaccine')}}" style="color : white;">{{$limit}}</a></h3>
                        <span class="text-uppercase font-size-theme"><a href="{{route('admin.vaccine')}}" style="color : white;">{{ __('Vaccine sắp hết - số lượng ít') }}</a></span>
                    </div>

                    <div class="ml-3" style="align-self: center; font-size: 3rem; padding-right: 3rem;">
                      <a href="{{route('admin.vaccine')}}" style="color : white;">
                        <i class="fa fa-eyedropper" aria-hidden="true"></i>
                      </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection