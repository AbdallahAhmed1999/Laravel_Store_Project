
<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Oreo Store :: Login</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">

</head>

<body class="theme-orange authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="/">Oreo</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-white btn-round" href="{{url('/register')}}">SIGN UP</a>
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
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="header">
                        <div class="logo-container">
                            <img src="{{asset('assets/images/logo.svg')}}" alt="">
                        </div>
                        <h5>Log in</h5>
                    </div>
                    @include('admin_errors')
                    <div class="content">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-block">LOG IN</button>
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
                </script>,
                <span>Built With <i class="fa fa-heart text-danger"></i> by Abdallah Abu Amra , Ahmad Faroukh , Tamer Raed</span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

<script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>
</html>
