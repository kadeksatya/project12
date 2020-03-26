<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('asset/css/logo.png')}}" type="image/x-icon">

    {{-- Link Css Start Now  --}}
        <link rel="stylesheet" href="{{asset('asset/plugins/toastr/toastr.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/css/adminlte.css')}}">
        <link rel="stylesheet" href="{{asset('asset/plugins/sweetalert2/sweetalert2.min.css')}}">



    {{-- Script Javascript Start Here --}}

        <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('asset/js/demo.js')}}"></script>
        <script src="{{asset('asset/js/adminlte.min.js')}}"></script>
        <script src="{{asset('asset/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('asset/plugins/sweetalert2/sweetalert2.all.js')}}"></script>



</head>
<body class="hold-transition sidebar-mini">
  @if (session('login'))
    <div class="alert-login">
        
    </div>
  @endif
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/dashboard" class="nav-link">Home</a>
          </li>

        </ul>

    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-turn-off"></i> 
             {{auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="{{route('setting.edit',auth::user()->id )}}" class="dropdown-item">
                <i class="fas fa-cogs mr-2" style="color:red"></i> Setting User
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-key mr-2" style="color:greenyellow"></i> Changes Password
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                <i class="fas fa-arrow-right mr-2"></i> Logout
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
           
            </div>
          </li>

        </ul>
      </nav>
      <!-- /.navbar -->
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
          <img src="{{asset('asset/css/logo.png')}}"
               alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">{{config('app.name')}} </span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{URL('/')}}/asset/imageuser/{{auth::user()->photo}}" class="rounded mx-auto d-block elevation-3" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">
                {{auth::user()->username}}
              </a>
              <a href="#" class="d-block">
                @foreach (auth::user()->role as $item)
                    {{$item->role}}
                @endforeach
              </a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href="/dashboard" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                   
                  </p>
                </a>
              </li>
            
            



              <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                  <i class="nav-icon fa fa-copy"></i>
                  <p>
                    Postingan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/postingan" class="nav-link {{ (request()->is('postingan')) ? 'active' : '' }}">
                      <i class="fas fa-table nav-icon"></i>
                      <p>Daftar Postingan</p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview">
                    <a href="/tags" class="nav-link {{ (request()->is('tags')) ? 'active' : '' }}">
                      <i class="fa fa-tag nav-icon"></i>
                      <p>
                        Tags
                     
                      </p>
                    </a>
                 
                  </li>
                  <li class="nav-item">
                    <a href="/label" class="nav-link {{ (request()->is('label')) ? 'active' : '' }}">
                      <i class="fa fa-info nav-icon"></i>
                      <p>Label</p>
                    </a>
                  </li>
                </ul>
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
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>@yield('namecontent')</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">{{config('app.name')}}</a></li>
                  <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
              </div>
            </div>
          </div>
        </section>

        @yield('content')

      </div>



    
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">{{config('app.name')}}</a>.</strong> All rights
        reserved.
      </footer>
      <aside class="control-sidebar control-sidebar-dark">

      </aside>

    </div>

    <script>
      $(document).ready(function(){

        $(".alert-login").show(function(){
          toastr.success("{{ session('login') }}")
        })

      });
    </script>
    </body>
</html>