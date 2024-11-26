<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 04:09:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>DPS - Medical & Hospital</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="container-fluid px-0">
            <div class="row">

                <!-- Login logo -->
                <div class="col-lg-6 login-wrap">
                    <div class="login-sec">
                        <div class="log-img">
                            <img class="img-fluid" src="assets/img/login-02.png" alt="Logo">
                        </div>
                    </div>
                </div>
                <!-- /Login logo -->

                <!-- Login Content -->
                <div class="col-lg-6 login-wrap-bg">
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="login-right">
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <!-- <a href="index-2.html"><img src="assets/img/login-logo.png" alt=""></a> -->
                                    </div>
                                    <h2>Login</h2>
                                    <!-- Form -->
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="input-block">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" type="text">
                                            <span class="" style="color: red; font-size: 13px"  >{{$errors->first('email')}}</span>

                                        </div>
                                        <div class="input-block">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" name="password" type="password">
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                            <span style="color: red; font-size: 13px">{{$errors->first('password')}}</span>
                                        </div>
                                        <div class="forgotpass">
                                            <div class="remember-me">
                                                <label class="custom_check mr-2 mb-0 d-inline-flex remember-me">
                                                    Remember me
                                                    <input type="checkbox"  name="remember">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <a href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                    </form>
                                    <!-- /Form -->

                                    <div class="next-sign">
                                        <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a>
                                        </p>

                                        <!-- Social Login -->
                                        <!-- <div class="social-login">
            <a href="javascript:;" ><img src="assets/img/icons/login-icon-01.svg" alt=""></a>
            <a href="javascript:;" ><img src="assets/img/icons/login-icon-02.svg" alt=""></a>
            <a href="javascript:;" ><img src="assets/img/icons/login-icon-03.svg" alt=""></a>
           </div> -->
                                        <!-- /Social Login -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /Login Content -->

            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}" type="67032408e0023e159be74642-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="67032408e0023e159be74642-text/javascript"></script>

    <!-- Feather Js -->
    <script src="{{asset('assets/js/feather.min.js')}}" type="67032408e0023e159be74642-text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{asset('assets/js/app.js')}}" type="67032408e0023e159be74642-text/javascript"></script>

    <script src="{{ asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="67032408e0023e159be74642-|49" defer></script>
</body>

<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 04:09:41 GMT -->

</html>
