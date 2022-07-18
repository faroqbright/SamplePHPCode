<?php
    $user_info= Auth::user();
    $url= url()->current();
	$value= basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Xoric - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- datepicker -->
        <link href="{{ URL::asset('public/assets/libs/air-datepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{ URL::asset('public/assets/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ URL::asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ URL::asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />


        <link href="{{ URL::asset('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  

    </head>

    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php if(Auth::check()){ ?>

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ URL::asset('public/assets/images/logo-sm-dark.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('public/assets/images/logo-dark.png') }}" alt="" height="20">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ URL::asset('public/assets/images/logo-sm-light.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ URL::asset('public/assets/images/logo-light.png') }}" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ (!empty(Auth::user()->image)?asset('/public/assets/imgs/'.Auth::user()->image):asset('/public/assets/imgs/headerImg.png')) }}" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->username }}</span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="{{url('change_password')}}"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('logout') }}"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>

            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{url('dashboard')}}" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                    <span>Dashboard</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{url('tables')}}" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                    <span>Tables</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{url('forms')}}" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                    <span>Forms</span>
                                </a>
                            </li>
                            

                        </ul>

                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
<?php } ?>