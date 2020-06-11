<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Oreo Store :: @yield('title')</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    @yield('page_assets')
    <script>
        function logout() {
            $.ajax({
                url: '/logout',
                method: 'POST'
            });
        }
    </script>
</head>

<body
    class="theme-orange menu_dark ">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('assets/images/logo.svg')}}" width="48" height="48"
                                 alt="Oreo"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/"><img src="{{asset('assets/images/logo.svg')}}"
                                                      width="30" alt="Oreo"><span
                        class="m-l-10">Oreo</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
        </li>
        <li class="float-right">
            <form action="{{route('logout')}}" method="POST" style="display: none;" id="logout-form">
                @csrf
            </form>
            <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="mega-menu" data-close="true"><i
                    class="zmdi zmdi-power mr-4"></i></a>

            {{--            <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i--}}
            {{--                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a>--}}
        </li>
    </ul>
</nav>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="tab-content mt-5">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href=""><img src="{{url('images/users/').'/'. auth()->user()->image}}"
                                                               alt="User"></a></div>
                            <div class="detail">
                                <h4>{{auth()->user()->name}}</h4>
                            </div>
                        </div>
                    </li>

                    @php
                        use Illuminate\Support\Facades\Request;
                        $url = Request::path();
                    @endphp
                    @can('dashboard')
                        <li class="{{str_contains($url,'dashboard') ? 'active':''}} open"><a
                                href="{{route('admin.dashboard')}}"><i
                                    class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    @endcan
                    @canany(['show-orders-pending','show-orders-delivered','show-orders-canceled'])
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="fas fa-list"></i>
                                <span>Orders</span>
                            </a>
                            <ul class="ml-menu">
                                @can('show-orders-pending')
                                    <li class='{{str_contains($url,'orders') ? 'active':''}}'><a
                                            href="{{route('admin.orders.pending')}}">Pending</a></li>
                                @endcan
                                @can('show-orders-delivered')
                                    <li><a href="{{route('admin.orders.delivered')}}">Delivered</a></li>
                                @endcan
                                @can('show-orders-canceled')
                                    <li><a href="{{route('admin.orders.canceled')}}">Canceled</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @canany(['show-products','add-product'])
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="zmdi zmdi-collection-item"></i>
                                <span>Products</span>
                            </a>
                            <ul class="ml-menu">
                                @can('show-products')
                                    <li class='{{str_contains($url,'products') ? 'active':''}}'><a
                                            href="{{route('admin.products.index')}}">All Products</a></li>
                                @endcan
                                @can('add-product')
                                    <li><a href="{{route('admin.products.create')}}">Add Product</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('show-categories')
                        <li class="{{str_contains($url,'categories') ? 'active':''}} open"><a
                                href="{{route('admin.categories.index')}}"><i
                                    class="fas fa-briefcase"></i><span>Categories</span></a></li>
                    @endcan
                    @can('show-users')
                        <li class="{{str_contains($url,'users') ? 'active':''}} open"><a
                                href="{{route('admin.users.index')}}"><i
                                    class="fas fa-users"></i><span>Users</span></a></li>
                    @endcan
                    @canany(['show-roles','add-role'])
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="fas fa-user-tag"></i>
                                <span>Roles</span>
                            </a>
                            <ul class="ml-menu">
                                @can('show-roles')
                                    <li class='{{str_contains($url,'roles') ? 'active':''}}'><a
                                            href="{{route('admin.roles.index')}}">All Roles</a></li>
                                @endcan
                                @can('add-role')
                                    <li><a href="{{route('admin.roles.create')}}">Add Role</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image"><a href="profile.html"><img src="assets/images/profile_av.jpg"
                                                                           alt="User"></a></div>
                            <div class="detail">
                                <h4>Dr. Charlotte</h4>
                                <small>Neurologist</small>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a>
                                    <a title="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a>
                                    <a title="instagram" href="#"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                                <div class="col-4 p-r-0">
                                    <h5 class="m-b-5">18</h5>
                                    <small>Exp</small>
                                </div>
                                <div class="col-4">
                                    <h5 class="m-b-5">125</h5>
                                    <small>Awards</small>
                                </div>
                                <div class="col-4 p-l-0">
                                    <h5 class="m-b-5">148</h5>
                                    <small>Clients</small>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <small class="text-muted">Location: </small>
                        <p>795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p>Charlotte@example.com</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>+ 202-555-0191</p>
                        <hr>
                        <small class="text-muted">Website: </small>
                        <p>dr.charlotte.com/ </p>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <div>Colorectal Surgery</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 89%"><span class="sr-only">62% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>Endocrinology</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-green " role="progressbar" aria-valuenow="56"
                                         aria-valuemin="0" aria-valuemax="100" style="  width: 56%"><span
                                            class="sr-only">87% Complete</span></div>
                                </div>
                            </li>
                            <li>
                                <div>Dermatology</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 78%"><span class="sr-only">32% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>Neurophysiology</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar l-blush" role="progressbar" aria-valuenow="43"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 43%"><span class="sr-only">56% Complete</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<section class="content home">

    @yield('content')

</section>
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
{{--<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->--}}
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
{{--<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->--}}
{{--<script src="{{asset('assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->--}}

<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script>
    $('li.active').parent('.ml-menu').siblings().click();
    $('li.active').parent('.ml-menu').parent().addClass('active');
</script>
@include('success_notification')
@yield('page_scripts')
</body>
</html>
