<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 04:13:13 GMT -->

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
                                @include('_message')
                                <div class="login-right-wrap">
                                    <div class="account-logo">
                                        <!-- <a href="index-2.html"><img src="assets/img/login-logo.png" alt=""></a> -->
                                    </div>
                                    <h2>Reset Password</h2>
                                    <!-- Form -->
                                    <form action="{{url('forgot-password')}}" method="POST">
                                        @csrf
                                        <div class="input-block">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" value="{{old('email')}}" type="text">
                                            <span style="color: red; font-size: 13px">{{$errors->first('email')}}</span>
                                        </div>
                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Reset
                                                Password</button>
                                        </div>
                                    </form>
                                    <!-- /Form -->

                                    <div class="next-sign">
                                        <p class="account-subtitle">Need an account? <a href="{{url('login')}}">Login</a></p>

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
    <!-- Mirrored from preclinic.dreamstechnologies.com/html/template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 04:13:13 GMT -->

</html>
