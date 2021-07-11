<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Vaccine - Admin Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('../css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('../css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('../css/_all-skins.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('../css/toastr.min.css')}}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="stylesheet" href="{{asset('../css/custom.css')}}">
  @yield('css')
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a class="logo">
        <span class="logo-mini"><b>VC</b></span>
        <span class="logo-lg"><b>Vaccine</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">{{Auth::user()->fullname}}</span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="img-circle" alt="User Image">
                  <p>
                    {{Auth::user()->fullname}}
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a class="btn btn-default btn-flat" href="{{route('changepassword')}}">Đổi mật khẩu</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng xuất</a>
                  </div>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" class="user-image" alt="User Image">
          </div>
          <div class="pull-left info">
            <span class="hidden-xs">{{Auth::user()->fullname}} 
            </span>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Danh sách chức năng</li>
          @if (Auth::user()->role == 1)
          <li class="">
            <a href="{{asset('')}}admin/user">
              <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý người dùng</span>
            </a>
          </li>
          @endif
          <li class="treeview">
            <a>
              <i class="fa fa-eyedropper" aria-hidden="true"></i> <span>Quản lý Vaccine</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{asset('')}}admin/vaccine"><i class="fa fa-circle-o"></i> Vaccine</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a>
              <i class="fa fa-rss" aria-hidden="true"></i> <span>Quản lý thông tin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{asset('')}}admin/post"><i class="fa fa-circle-o"></i> Bài viết</a></li>
            </ul>
          </li>
          <li class="">
            <a href="{{asset('')}}admin/order">
              <i class="fa fa-cart-plus" aria-hidden="true"></i> <span>Đăng ký tiêm chủng</span>
            </a>
          </li>
          @if (Auth::user()->role == 1)
          <li class="">
            <a href="{{asset('')}}admin/import-vaccine">
              <i class="fa fa-plus-circle" aria-hidden="true"></i> <span>Bổ sung vaccine</span>
            </a>
          </li>
          @endif
          <li class="">
            <a href="{{asset('')}}admin/template">
              <i class="fa fa-file-text" aria-hidden="true"></i> <span>Mẫu khai báo</span>
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      {{-- <section class="content-header">
        <h1>
          Table
        </h1>
        <ol class="breadcrumb">
          <li><a><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a>Table</a></li>
        </ol>
      </section> --}}
      <section class="content">
        @yield('content')
      </section>
    </div>
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2021<a> Vaccine</a>.</strong> Reserved
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="{{asset('../js/jquery.min.js')}}"></script>
  <script src="{{asset('../js/bootstrap.min.js')}}"></script>
  <script src="{{asset('../js/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('../js/fastclick.js')}}"></script>
  <script src="{{asset('../js/adminlte.min.js')}}"></script>
  <script src="{{asset('../js/demo.js')}}"></script>
  <script src="{{asset('../js/toastr.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  @yield('foot')
</body>
</html>