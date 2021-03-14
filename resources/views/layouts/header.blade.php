
<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>

<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand" style="padding:0;">
            <a href="{{route('homepage')}}"><img src="{{asset('assets/img/eec.png')}}" style="width:80px;height:80px; margin-left:20px;" ></a>

            {{-- <a href="index.html"><img src="assets/img/logo-dark.png" Logo" class="img-responsive logo"></a> --}}
        </div>
        <div class="container-fluid">

            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>{{ Auth::check() ? Auth::user()->name : 'User'}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('logout') }}"   onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- LEFT SIDEBAR -->
    @if(auth::check())
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="{{ route('products.index') }}" class=""><i class="lnr lnr-inbox"></i> <span>products</span></a>
                    </li>
                    <li><a href="{{ route('category.index') }}" class=""><i class="lnr lnr-apartment"></i>
                            <span>Categories</span></a></li>
                    <li><a href="{{ route('sections.index') }}" class=""><i class="lnr lnr-list"></i> <span>Sections</span></a>
                    </li>
                    <li><a href="{{ route('departments.index') }}" class=""><i class="lnr lnr-home"></i>
                            <span>Departments</span></a></li>
                    <li><a href="{{ route('orders.index') }}" class=""><i class="lnr lnr-cart"></i>
                            <span>Orders</span></a></li>

                </ul>
            </nav>
        </div>
    </div>
    @endif
    <!-- END LEFT SIDEBAR -->
