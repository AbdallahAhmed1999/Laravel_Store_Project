<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>Oreo Store</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/vendors/linericon/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/flaticon.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/vendors/owl-carousel/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/vendors/lightbox/simpleLightbox.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/vendors/nice-select/css/nice-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/vendors/animate-css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/vendors/jquery-ui/jquery-ui.css')}}"/>
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets2/css/responsive.css')}}"/>
</head>

<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand" href="/">
                    <span class="m-l-10">Oreo</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            @php
                use Illuminate\Support\Facades\Request;
                $url = Request::path();
            @endphp
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item {{str_contains($url,'home') ? 'active':''}}">
                                    <a class="nav-link" href="{{route('home')}}">Home</a>
                                </li>
                                <li class="nav-item {{str_contains($url,'shop') ? 'active':''}}">
                                    <a class="nav-link" href="{{route('shop')}}">Shop</a>
                                </li>
                                <li class="nav-item {{str_contains($url,'cart') ? 'active':''}}">
                                    <a class="nav-link" href="{{route('cart')}}">Shoping Cart</a>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">My Orders</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('orders')}}">Pending Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('orders.history')}}">Delivered Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('orders.canceled')}}">Canceled Orders</a>
                                        </li>
                                    </ul>
                                </li>
                                @canany([
                                    'show-products','show-categories','show-roles',
                                    'show-users','dashboard','show-orders-pending',
                                    'show-orders-delivered','show-orders-canceled'
                                ])
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                           role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">Control Panel</a>
                                        <ul class="dropdown-menu">
                                            @can('dashboard')
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('admin.dashboard')}}">Dashboard</a>
                                                </li>
                                            @endcan
                                            @can('show-orders-pending')
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('admin.orders.pending')}}">Pending Orders</a>
                                                </li>
                                            @endcan
                                            @can('show-orders-delivered')
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('admin.orders.delivered')}}">Delivered Orders</a>
                                                </li>
                                            @endcan
                                            @can('show-orders-canceled')
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('admin.orders.canceled')}}">Canceled Orders</a>
                                                </li>
                                            @endcan
                                            @can('show-products')
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('admin.products.index')}}">Products</a>
                                                </li>
                                            @endcan
                                            @can('show-categories')
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                       href="{{route('admin.categories.index')}}">Categories</a>
                                                </li>
                                            @endcan
                                            @can('show-users')
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('admin.users.index')}}">Users</a>
                                                </li>
                                            @endcan
                                            @can('show-roles')
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('admin.roles.index')}}">Roles</a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </li>
                                @endcan
                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                <li class="nav-item">
                                    <a href="{{route('cart')}}" class="icons mr-4">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="icons" href="{{ route('login') }}">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="icons" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                           role="button"
                                           aria-haspopup="true"
                                           aria-expanded="false">{{ Auth::user()->name }}</a>
                                        <img src="{{url('images/users').'/'.Auth::user()->image}}"
                                             class="ml-3"
                                             width="30px"
                                             height="30px" alt="">
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                            </li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->

@yield('content')

<!--================ start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                Built with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a
                    href="#" target="_blank">Abdallah Abu Amra , Ahmad Faroukh , Tamer Raed</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets2/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets2/js/popper.js')}}"></script>
<script src="{{asset('asset2/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets2/js/stellar.js')}}"></script>
<script src="{{asset('assets2/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('assets2/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets2/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets2/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('assets2/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets2/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets2/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets2/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('assets2/js/mail-script.js')}}"></script>
<script src="{{asset('assets2/js/theme.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
@include('success_notification')
</body>

</html>
