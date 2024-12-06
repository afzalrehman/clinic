@extends('admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patients.html">Patients </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Patient</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/patient/update/' . $patient->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <!-- Form Heading -->
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Patient Details</h4>
                                        </div>
                                    </div>

                                    <!-- Name -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="Enter Name" value="{{ old('name', $patient->name) }}">
                                            @error('name')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Username -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>UserName <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="username"
                                                placeholder="Enter UserName"
                                                value="{{ old('username', $patient->username) }}">
                                            @error('username')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Mobile -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="mobile"
                                                placeholder="Enter Mobile Number"
                                                value="{{ old('mobile', $patient->mobile) }}">
                                            @error('mobile')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="Enter Email" value="{{ old('email', $patient->email) }}">
                                            @error('email')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- CNIC -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>CNIC/ID Number <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="cnic"
                                                placeholder="Enter CNIC/ID Number"
                                                value="{{ old('cnic', $patient->cnic_id) }}">
                                            @error('cnic')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms cal-icon">
                                            <label>Date of Birth <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text" name="dob"
                                                placeholder="Enter DOB" value="{{ old('dob', $patient->date_of_birth) }}">
                                            @error('dob')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Blood Group <span class="login-danger">*</span></label>
                                            <select class="form-control" name="blood_group">
                                                <option value="">Select Blood Group</option>
                                                <option value="A+"
                                                    {{ old('blood_group', $patient->blood_group) == 'A+' ? 'selected' : '' }}>
                                                    A+</option>
                                                <option value="A-"
                                                    {{ old('blood_group', $patient->blood_group) == 'A-' ? 'selected' : '' }}>
                                                    A-</option>
                                                <option value="B+"
                                                    {{ old('blood_group', $patient->blood_group) == 'B+' ? 'selected' : '' }}>
                                                    B+</option>
                                                <option value="B-"
                                                    {{ old('blood_group', $patient->blood_group) == 'B-' ? 'selected' : '' }}>
                                                    B-</option>
                                                <option value="O+"
                                                    {{ old('blood_group', $patient->blood_group) == 'O+' ? 'selected' : '' }}>
                                                    O+</option>
                                                <option value="O-"
                                                    {{ old('blood_group', $patient->blood_group) == 'O-' ? 'selected' : '' }}>
                                                    O-</option>
                                                <option value="AB+"
                                                    {{ old('blood_group', $patient->blood_group) == 'AB+' ? 'selected' : '' }}>
                                                    AB+</option>
                                                <option value="AB-"
                                                    {{ old('blood_group', $patient->blood_group) == 'AB-' ? 'selected' : '' }}>
                                                    AB-</option>
                                            </select>
                                            @error('blood_group')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Gender <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"
                                                        value="Male"
                                                        {{ old('gender', $patient->gender) == 'Male' ? 'checked' : '' }}>Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"
                                                        value="Female"
                                                        {{ old('gender', $patient->gender) == 'Female' ? 'checked' : '' }}>Female
                                                </label>
                                            </div>
                                            @error('gender')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>City <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="city"
                                                placeholder="Enter City" value="{{ old('city', $patient->city) }}">
                                            @error('city')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                     <!-- Marital Status -->
                                     <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Marital Status <span class="login-danger">*</span></label>
                                            <select class="form-control" name="marital_status">
                                                <option value="">Select Marital Status</option>
                                                <option value="Single"
                                                    {{ old('marital_status', $patient->marital_status) == 'Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married"
                                                    {{ old('marital_status', $patient->marital_status) == 'Married' ? 'selected' : '' }}>
                                                    Married</option>
                                                <option value="Divorced"
                                                    {{ old('marital_status', $patient->marital_status) == 'Divorced' ? 'selected' : '' }}>
                                                    Divorced</option>
                                                <option value="Widowed"
                                                    {{ old('marital_status', $patient->marital_status) == 'Widowed' ? 'selected' : '' }}>
                                                    Widowed</option>
                                            </select>
                                            @error('marital_status')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12">
                                        <div class="input-block local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="address" rows="3" placeholder="Enter Address">{{ old('address', $patient->address) }}</textarea>
                                            @error('address')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Emergency Contact Name -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Emergency Contact Name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="emergency_contact_name"
                                                placeholder="Enter Emergency Contact Name"
                                                value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}">
                                            @error('emergency_contact_name')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Emergency Contact Number -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>Emergency Contact Number <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="emergency_contact_number"
                                                placeholder="Enter Emergency Contact Number"
                                                value="{{ old('emergency_contact_number', $patient->emergency_contact_number) }}">
                                            @error('emergency_contact_number')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Known Allergies -->
                                    <div class="col-12">
                                        <div class="input-block local-forms">
                                            <label>Known Allergies</label>
                                            <textarea class="form-control" name="known_allergies" rows="3" placeholder="Enter Known Allergies">{{ old('known_allergies', $patient->known_allergies) }}</textarea>
                                            @error('known_allergies')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Chronic Illnesses -->
                                    <div class="col-12">
                                        <div class="input-block local-forms">
                                            <label>Chronic Illnesses</label>
                                            <textarea class="form-control" name="chronic_illnesses" rows="3" placeholder="Enter Chronic Illnesses">{{ old('chronic_illnesses', $patient->chronic_illnesses) }}</textarea>
                                            @error('chronic_illnesses')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                    <!-- Status -->
                                    <div class="col-12 col-md-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Status <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input"
                                                        value="Active"
                                                        {{ old('status', $patient->status) == 'Active' ? 'checked' : '' }}>Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input"
                                                        value="In Active"
                                                        {{ old('status', $patient->status) == 'In Active' ? 'checked' : '' }}>In
                                                    Active
                                                </label>
                                            </div>
                                            @error('status')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Profile Image -->
                                    <div class="col-12 col-md-12">
                                        <div class="input-block local-forms">
                                            <label>Profile Image</label>
                                            <input class="form-control" type="file" name="profile_photo" value="{{$patient->profile_photo}}">
                                            @error('profile_image')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <div class="input-block local-forms">
                                            <button type="submit" class="btn btn-primary">Update Patient</button>
                                        </div>
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
