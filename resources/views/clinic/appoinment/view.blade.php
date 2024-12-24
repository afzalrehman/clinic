@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('clinic.appoinment') }}">Appointment </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Book Appointment</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

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
                                        <select class="form-control form-small" id="patient_id" hidden name="patient_id">
                                            <option value="">Select ID Number</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->mobile }}"
                                                    {{ old('patient_id', $appoinment->patient_id) == $patient->mobile ? 'selected' : '' }}>
                                                    {{ $patient->mobile }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('patient_id')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Name <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" readonly name="patient_name"
                                            id="patient_name" value="{{ old('patient_name', $editpatients->name ?? '') }}">
                                        @error('patient_name')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-12 col-md-4 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Mobile <span class="login-danger">*</span></label>
                                        <input class="form-control" readonly type="text" name="mobile" id="mobile"
                                            value="{{ old('mobile', $editpatients->mobile ?? '') }}">
                                        @error('mobile')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-block local-forms">
                                    <label for="reason">Reason</label>
                                    <textarea type="text" name="reason" id="reason" readonly class="form-control">{{ old('reason', $appoinment->notes) }}</textarea>
                                    @error('reason')
                                        <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                    @enderror
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
                                                <option value="{{ $department->id }}"
                                                    {{ old('department_id', $appoinment->department_id) == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Consulting Doctor</label>
                                        <select class="form-control form-small" id="doctor_id" name="doctor_id">
                                            <option value="{{ $editdoctors->mobile }}">{{ $editdoctors->name }}
                                            </option>
                                        </select>
                                        @error('doctor_id')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Available Days <span class="login-danger">*</span></label>
                                        <div class="time-icon">
                                            {{-- datetimepicker3 --}}
                                            <input type="text" class="form-control" id="availableDays" readonly
                                                name="available_days" value="{{ $doctorschedule->available_days }}">
                                        </div>

                                        @error('available_days')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>From <span class="login-danger">*</span></label>
                                        <div class="time-icon">
                                            {{-- datetimepicker3 --}}
                                            <input type="text" class="form-control" id="from" readonly
                                                name="from_time" value="{{ $appoinment->from_time }}">
                                        </div>
                                        @error('from_time')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>To <span class="login-danger">*</span></label>
                                        <div class="time-icon">
                                            {{-- datetimepicker4 --}}
                                            <input type="text" class="form-control" id="to" readonly
                                                name="to_time" value="{{ $appoinment->to_time }}">
                                        </div>
                                        @error('to_time')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Treatment</label>
                                        <input class="form-control" type="text" name="treatment" readonly
                                            value="{{ old('treatment', $appoinment->treatment ?? '') }}">
                                        @error('treatment')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms cal-icon">
                                        <label>Date of Appointment <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" readonly
                                            name="appointment_date"
                                            value="{{ old('appointment_date', $appoinment->appointment_date ?? '') }}">
                                        @error('appointment_date')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Status <span class="login-danger">*</span></label>
                                        <select class="form-control form-small" hidden name="status">
                                            <option value="Upcoming"
                                                {{ old('status', $appoinment->status ?? '') == 'Upcoming' ? 'selected' : '' }}>
                                                Upcoming</option>
                                            <option value="Completed"
                                                {{ old('status', $appoinment->status ?? '') == 'Completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="Cancelled"
                                                {{ old('status', $appoinment->status ?? '') == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                        </select>
                                        @error('status')
                                            <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row">

                                    <!-- Appointment Details Section -->
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Document Details</h4>
                                        </div>
                                    </div>
                                    @forelse($appoinment_file as $document)
                                    <div class="col-4">
                                        <div class="existing-document">
                                            @php
                                                $fileExtension = pathinfo($document->file_path, PATHINFO_EXTENSION);
                                            @endphp
                                
                                            @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) 
                                                <!-- Image Files -->
                                                <a href="{{ asset($document->file_path) }}" target="_blank">
                                                    <img src="{{ asset($document->file_path) }}" alt="Document" width="100px">
                                                </a>
                                            @elseif(strtolower($fileExtension) == 'pdf')
                                                <!-- PDF Files -->
                                                <a href="{{ asset($document->file_path) }}" target="_blank">
                                                    <button class="btn btn-info">View PDF</button>
                                                </a>
                                            @else
                                                <!-- Other files -->
                                                <a href="{{ asset($document->file_path) }}" target="_blank">
                                                    <button class="btn btn-info">Download File</button>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <p>No documents uploaded yet.</p>
                                @endforelse
                                
                                </div>
                            </div>


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

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#department_id').change(function() {
                let department_id = $(this).val();

                if (department_id) {
                    $.ajax({
                        url: '/clinic/appoinment-doctor-details/' + department_id,
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
                                        .cnic + '">' + doctor.name + ' ' + doctor
                                        .lastname + '</option>');
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
                        url: '/clinic/get-appoinment-schedule_details/' + doctorId,
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

    <script>
        $(document).ready(function() {
            $('#patient_id').change(function() {
                let patientId = $(this).val();

                if (patientId) {
                    $.ajax({
                        url: '/clinic/get-patient-details/' + patientId,
                        type: 'GET',
                        success: function(data) {
                            if (data) {

                                $('#patient_name').val(data.name);
                                $('#mobile').val(data.mobile);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    // Clear fields if no patient is selected
                    $('#patient_name').val('');
                    $('#mobile').val('');
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
