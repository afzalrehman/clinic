<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ $clinic->name }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">

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
                                    <h2>Register Patient</h2>
                                    <!-- Form -->
                                    <form method="POST" action="{{url('appointment/'.$clinic->id)}}">
                                        @csrf
                                        <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
                                        <div class="input-block local-forms">
                                            <label for="name">Patient Name <span style="color: red">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                required>
                                        </div>

                                        <div class="input-block local-forms">
                                            <label for="email">Patient Email<span style="color: red">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                required>
                                        </div>
                                       

                                       <div class="input-block local-forms">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" placeholder="Please Enter Password"
                                                name="password" type="password">
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('password') }}</span>
                                        </div>


                                       <div class="input-block local-forms">
                                            <label>Confirm Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" placeholder="Please Enter Password"
                                                name="password_confirmation" type="password">
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                        </div>

                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Register Patient
                                                </button>
                                        </div>
                                        <div class="input-block login-btn">
                                            <a href="{{route('login')}}" class="btn btn-success btn-block" type="submit">
                                                Login Patient</a>
                                        </div>
                                    </form>
                                    <!-- /Form -->

                                    <div class="next-sign">
                                        {{-- <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a>
                                        </p> --}}

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

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    <!-- Feather Js -->
    <script src="{{ asset('assets/js/feather.min.js') }}" type="text/javascript"></script>

    <!-- Slimscroll -->
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}" type="text/javascript"></script>

    <!-- Select2 Js -->
    <script src="{{ asset('assets/js/select2.min.js') }}" type="text/javascript"></script>

    <!-- Datatables JS -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>

    <!-- counterup JS -->
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- Datepicker Core JS -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

    <!-- Apexchart JS -->
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="f3c7ca980d41a639d2c3f93e-|49" defer></script>

    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="f8f4d162ec031ee40ac358fc-|49" defer></script>
</body>

</html>
