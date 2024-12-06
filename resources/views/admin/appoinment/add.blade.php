@extends('admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.appoinment') }}">Appointment</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <i class="feather-chevron-right"></i>
                                </li>
                                <li class="breadcrumb-item active">Book Appointment</li>
                            </div>
                            <div>
                                <a href="{{ route('admin.appoinment.create') }}" class="btn btn-white add-pluss ms-2 d-flex align-items-center">
                                    <img src="{{ asset('assets/img/icons/plus.svg') }}" alt=""> Add Patient
                                </a>
                            </div>
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.appoinment.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Patient Details Section -->
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Patient Details</h4>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>ID Number <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" id="patient_id" name="patient_id">
                                                <option value="">Select ID Number</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                                        {{ $patient->cnic_id }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('patient_id')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" readonly name="patient_name" id="patient_name" value="{{ old('patient_name') }}">
                                            @error('patient_name')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Username <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" readonly name="username" id="username" value="{{ old('username') }}">
                                            @error('username')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-4 col-xl-4">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Gender <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>Female
                                                </label>
                                            </div>
                                            @error('gender')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-4 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly type="text" name="mobile" id="mobile" value="{{ old('mobile') }}">
                                            @error('mobile')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-4 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly type="email" name="email" id="email" value="{{ old('email') }}">
                                            @error('email')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <textarea class="form-control" readonly id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <!-- Appointment Details Section -->
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Appointment Details</h4>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Department <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" id="department_id" name="department_id">
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Consulting Doctor</label>
                                            <select class="form-control form-small" id="doctor_id" name="doctor_id">
                                                <option value="">Select Doctor</option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                        {{ $doctor->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('doctor_id')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Treatment</label>
                                            <input class="form-control" type="text" name="treatment" value="{{ old('treatment') }}">
                                            @error('treatment')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms cal-icon">
                                            <label>Date of Appointment <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text" name="appointment_date" value="{{ old('appointment_date') }}">
                                            @error('appointment_date')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>From <span class="login-danger">*</span></label>
                                            <div class="time-icon">
                                                <input type="text" class="form-control" id="datetimepicker3" name="from_time" value="{{ old('from_time') }}">
                                            </div>
                                            @error('from_time')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>To <span class="login-danger">*</span></label>
                                            <div class="time-icon">
                                                <input type="text" class="form-control" id="datetimepicker4" name="to_time" value="{{ old('to_time') }}">
                                            </div>
                                            @error('to_time')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Status <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" name="status">
                                                <option value="Upcoming" {{ old('status') == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                                                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                            @error('status')
                                                <span  style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item new-message">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">1 Aug</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">D</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Domenic Houston </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">B</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Buster Wigton </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Rolland Webber </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Claire Mapes </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Melita Faucher</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Jeffery Lalor</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">L</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Loren Gatlin</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Tarah Shropshire</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">See all messages</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- jQuery -->

    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}" ></script>
    <script>
        $(document).ready(function() {
            $('#patient_id').change(function() {
                let patientId = $(this).val();
                
                if (patientId) {
                    $.ajax({
                        url: '/admin/get-patient-details/' + patientId,
                        type: 'GET',
                        success: function(data) {
                            if (data) {
                                
                                $('#patient_name').val(data.name);
                                $('#username').val(data.username);
                                $('#mobile').val(data.mobile);
                                $('#email').val(data.email);
                                $('#address').val(data.address);
                                
                                // Set gender
                                if (data.gender === 'Male') {
                                $('input[name="gender"][value="Male"]').prop('checked', true);
                            } else if (data.gender === 'Female') {
                                $('input[name="gender"][value="Female"]').prop('checked', true);
                            } else {
                                // In case of an invalid value or no gender provided, reset both
                                $('input[name="gender"]').prop('checked', false);
                            }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    // Clear fields if no patient is selected
                    $('#patient_name').val('');
                    $('#username').val('');
                    $('#mobile').val('');
                    $('#email').val('');
                    $('input[name="gender"]').prop('checked', false);
                    $('#address').val('');
                }
            });
        });
    </script>


    <!-- Fileupload JS -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js') }}" type="5650539c0f26ab12eb5493c5-text/javascript"></script>
    <script src="{{asset('assets/plugins/select2/js/custom-select.js') }}" type="5650539c0f26ab12eb5493c5-text/javascript"></script>
    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="5650539c0f26ab12eb5493c5-|49" defer></script>
@endsection
