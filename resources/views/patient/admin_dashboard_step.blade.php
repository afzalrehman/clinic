<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 04:07:51 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{Auth::user()->Getfavicon()}}">
    <title>{{Auth::user()->application_name()}}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    @yield('link')
    

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
    <div class="main-wrapper">
        @include('patient.body.header')
        @include('patient.body.sidebar')

        @yield('content')

    </div>


    <div class="sidebar-overlay" data-reff=""></div>

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <!-- Feather Js -->
    <script src="{{asset('assets/js/feather.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <!-- Slimscroll -->
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <!-- Select2 Js -->
    <script src="{{asset('assets/js/select2.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <!-- Datatables JS -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <!-- counterup JS -->
    <script src="{{asset('assets/js/jquery.waypoints.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>
    <!-- Datepicker Core JS -->
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}" type="f8f4d162ec031ee40ac358fc-text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="f8f4d162ec031ee40ac358fc-text/javascript"></script>
    <!-- Apexchart JS -->
    <script src="{{asset('assets/plugins/apexchart/apexcharts.min.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>
    <script src="{{asset('assets/plugins/apexchart/chart-data.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>


    <!-- Custom JS -->
    <script src="{{asset('assets/js/app.js')}}" type="f3c7ca980d41a639d2c3f93e-text/javascript"></script>

    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="f3c7ca980d41a639d2c3f93e-|49" defer></script>

    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="f8f4d162ec031ee40ac358fc-|49" defer></script></body>
    

    @yield('script')
</body>


<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Nov 2024 04:09:02 GMT -->

</html>
