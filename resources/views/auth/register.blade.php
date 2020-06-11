<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Oreo Store :: register</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/image-picker.css')}}">
</head>

<body class="theme-orange authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="{{url('/')}}" title="Home">Oreo</a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-white btn-round" href="{{url('/login')}}">SIGN IN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{asset('assets/images/login.jpg')}})"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">

                <form class="form" method="POSt" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="header">
                        <h5>Sign Up</h5>
                    </div>

                    @include('admin_errors')
                    <div class="content">

                        <div class="row">
                            <div class="col-sm-6">
                                <div>User Image</div>
                                <div class="img-picker"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                   placeholder="Enter Name">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                   placeholder="Enter Email">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                        </div>

                        <div class="input-group">
                            <input type="password" name="password" placeholder="Enter Password"
                                   class="form-control"/>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                   class="form-control"/>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-block  waves-effect waves-light">
                            SIGN UP
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright float-left">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                ,
                <span>Built With <i class="fa fa-heart text-danger"></i> by Abdallah Abu Amra , Ahmad Faroukh , Tamer Raed</span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
<script>
    $(".navbar-toggler").on('click', function () {
        $("html").toggleClass("nav-open");
    });
</script>
<script src="{{asset('assets/js/image-picker.js')}}"></script>
</body>
</html>
