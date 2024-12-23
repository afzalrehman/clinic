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
                            <img class="img-fluid" src="{{ asset('assets/img/login-02.png') }}" alt="Logo">
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
                                    <h2>Appointment Patient</h2>
                                    <!-- Form -->
                                    <form method="POST" action="{{ url('appointment/' . $clinic->clinic_code) }}">
                                        @csrf
                                        <input type="text" hidden name="clinic_id" value="{{ $clinic->clinic_code }}">
                                        <div class="input-block local-forms">
                                            <label for="name">Patient Name <span style="color: red;">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                >
                                               
                                            <span style="color: red; font-size:13px;">{{ $errors->first('name') }}</span>
                                        </div>

                                        <div class="input-block local-forms">
                                            <label for="reason">Reason</label>
                                            <textarea type="text" name="reason" id="reason" class="form-control"></textarea>
                                        </div>
                                        <div class="input-block local-forms">
                                            <label for="number">Patient Number<span style="color: red;">*</span></label>
                                            <input type="text" name="number" id="number" class="form-control"
                                                >
                                            <span style="color: red; font-size:13px;">{{ $errors->first('number') }}</span>

                                        </div>

                                        <!-- Document  -->
                                        <div class="input-block local-forms">
                                            <label>Document</label>
                                            <input class="form-control" multiple type="file" name="document[]"
                                                value="{{ old('document') }}">

                                            @error('document')
                                                <span style="color:red;font-size: 13px">{{ $errors->first('document') }}</span>
                                            @enderror
                                        </div>

                                        <div class="input-block local-forms">
                                            <label>Department <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" id="department_id"
                                                name="department_id">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <span style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="input-block local-forms">
                                            <label>Consulting Doctor <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" id="doctor_id" name="doctor_id">
                                                <option value="">Select Doctor</option>
                                            </select>
                                            @error('doctor_id')
                                                <span style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="input-block local-forms">
                                            <label>Available Days <span class="login-danger">*</span></label>
                                            <div class="time-icon">
                                                {{-- datetimepicker3 --}}
                                                <input type="text" class="form-control" id="availableDays" readonly
                                                    name="available_days" value="">
                                            </div>

                                            @error('available_days')
                                                <span style="color: red; font-size:13px;;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="input-block local-forms cal-icon">
                                            <label>Date of Appointment <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text"
                                                name="appointment_date" value="{{ old('appointment_date') }}">
                                            @error('appointment_date')
                                                <span style="color: red; font-size:13px;;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="input-block login-btn">
                                            <button class="btn btn-primary btn-block" type="submit">Book Appionment</button>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#department_id').change(function() {
                let department_id = $(this).val();

                if (department_id) {
                    $.ajax({
                        url: '/appoinment-doctor-details/' + department_id,
                        type: 'GET',
                        success: function(data) {
                            if (data) {
                                // Clear the existing options
                                $('#doctor_id').empty();
                                $('#doctor_id').append(
                                    '<option value="">Select Doctor</option>');

                                // Append new options
                                data.forEach(function(doctor) {
                                    $('#doctor_id').append('<option value="' + doctor
                                        .mobile + '">' + doctor.name + '</option>');
                                });

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            $('#doctor_id').empty();
                            $('#doctor_id').append('<option value="">Select Doctor</option>');
                        }
                    });
                } else {
                    // Clear the doctor dropdown if no department is selected
                    $('#doctor_id').empty();
                    $('#doctor_id').append('<option value="">Select Doctor</option>');
                }
            });
        });


        $(document).ready(function() {
            $('#doctor_id').change(function() {
                let doctorId = $(this).val();

                if (doctorId) {
                    $.ajax({
                        url: '/get-appoinment-schedule_details/' + doctorId,
                        type: 'GET',
                        success: function(data) {
                            if (data) {
                                $('#availableDays').val(data.available_days);
                                $('#from').val(data.from);
                                $('#to').val(data.to);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    // Clear fields if no patient is selected
                    $('#availableDays').val('');
                    $('#from').val('');
                    $('#to').val('');

                }
            });
        });
    </script>


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
