<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ Auth::user()->name }} | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
{{--   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}"> --}}
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- Right navbar links -->
     <a class="nav-link bg-dark" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown btn btn-primary">
             @php
             $mytime = Carbon\Carbon::now();
            @endphp
            {{-- {{date('Y-m-d - H:i:m',strtotime($mytime))}} --}}
            Date: {{date('d-F-Y',strtotime($mytime))}} / Time: {{date('h:i:m A',strtotime($mytime))}}
               
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <img src="{{asset('img/logo.jpeg')}}" alt="" style="height: 135px;
    width: 235px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
 {{--      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     {{--      <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{Request::route()->getName() == 'home' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Add User
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="{{route('occasion')}}" class="nav-link {{Request::route()->getName() == 'occasion' ? 'active' : '' }}" class="nav-link">
              <i class="nav-icon fas fa-bahai"></i>
              <p>
                Occasion
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('investment')}}" class="nav-link {{Request::route()->getName() == 'investment' ? 'active' : '' }}" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Investment 
              </p>
            </a>
          </li>
           <li class="nav-item">
              <a href="{{route('deposit')}}" class="nav-link {{Request::route()->getName() == 'deposit' ? 'active' : '' }}" class="nav-link">
                <i class="nav-icon fas fa-piggy-bank"></i>
                <p>
                  Deposit 
                </p>
              </a>
            </li>
           

          <li class="nav-item">
            <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
             <!--  ==================================SESSION MESSAGES==================================  -->
        @if (session()->has('message'))
            <div class="alert alert-{!! session()->get('type')  !!} alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! session()->get('message')  !!}
            </div>
        @endif
      <!--  ==================================SESSION MESSAGES==================================  -->


      <!--  ==================================VALIDATION ERRORS==================================  -->
          @if($errors->any())
              @foreach ($errors->all() as $error)

                 <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {!!  $error !!}
                  </div>

          @endforeach
       @endif
      <!--  ==================================SESSION MESSAGES==================================  -->
        </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalAmount}}৳</h3>

                <p>All Users Funded</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$totalAmount + $totaladdfund - $totalcutfund - $totalinvst + $totalPaid}}৳</h3>

                <p>Total Amount</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-check-alt"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$totaladdfund - $totalcutfund}}৳</h3>
               {{--  <p>({{$totaladdfund}} - {{$totalcutfund}}) = {{$totaladdfund - $totalcutfund}}৳</p> --}}

                <p>Total Amount(Occasion)</p>
              </div>
              <div class="icon">
                <i class="fas fa-bahai"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3>{{$totalPaid - $totalinvst}}৳</h3>

                <p>Investment Profit Sector</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-bar"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$totaldeposit - $totalwithdraw}}৳</h3>

                <p>Deposit</p>
              </div>
              <div class="icon">
                <i class="fas fa-piggy-bank"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>


    </div>


  <!-- /.content-wrapper -->
  <footer class="main-footer">
   Copyright &copy; {{date('Y')}} <strong>  Sujit Paul.</strong>
    All rights reserved.
    <div class="float-right">
      <b> Developed by </b> <a href="https://mybdhost.com" target="_blank"><strong>Mybdhost</strong></a>
    </div>

 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
{{-- <script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
{{-- <script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.5/dist/sweetalert2.all.min.js"></script>

<script>
  const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000
   });

  @if (session()->has('message'))

    Toast.fire({
      type: "{!! session()->get('type')  !!}",
      title: "{!! session()->get('message')  !!}"
    })
  {{ Session::forget('message')}}
  @endif
</script>
 @yield('scripts')
</body>
</html>



















