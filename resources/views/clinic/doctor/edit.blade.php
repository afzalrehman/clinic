@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="doctors.html">Doctors </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update Doctor</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/doctor/update/'.$doctor->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Doctor Details</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>First Name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name' , $doctor->name) }}" placeholder="Enter your full name">
                                            @if ($errors->has('name'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Last Name <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="lastname"
                                                value="{{ old('lastname', $doctor->lastname) }}" placeholder="Enter your Last Name">
                                            @if ($errors->has('lastname'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('lastname') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="mobile"
                                                value="{{ old('mobile', $doctor->mobile) }}" placeholder="Enter your mobile number">
                                            @if ($errors->has('mobile'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('mobile') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email', $doctor->email) }}" placeholder="Enter your email">
                                            @if ($errors->has('email'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                     <!-- CNIC -->
                                     <div class="col-12 col-md-6">
                                        <div class="input-block local-forms">
                                            <label>CNIC/ID Number <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="cnic"
                                                placeholder="Enter CNIC/ID Number" value="{{ old('cnic' ,  $doctor->cnic) }}">
                                            @error('cnic')
                                                <span style="color:red;font-size: 13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms cal-icon">
                                            <label>Date Of Birth <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text" name="dob"
                                                value="{{ old('dob', $doctor->dob) }}" placeholder="Select your date of birth">
                                            @if ($errors->has('dob'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Gender <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" value="Male"
                                                        class="form-check-input mt-0"
                                                        {{ old('gender', $doctor->gender) == 'Male' ? 'checked' : '' }}> Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" value="Female"
                                                        class="form-check-input mt-0"
                                                        {{ old('gender', $doctor->gender) == 'Female' ? 'checked' : '' }}> Female
                                                </label>
                                            </div>
                                            @if ($errors->has('gender'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('gender') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Education <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="education"
                                                value="{{ old('education', $doctor->education) }}" placeholder="Enter your education">
                                            @if ($errors->has('education'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('education') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Designation <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="designation"
                                                value="{{ old('designation', $doctor->designation) }}" placeholder="Enter your designation">
                                            @if ($errors->has('designation'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('designation') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Department <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" name="department_id">
                                                <option value="">Select Department</option>
                                                @foreach ($department as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('department_id', $doctor->department_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('department_id'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('department_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="address" rows="3" placeholder="Enter your address">{{ old('address', $doctor->address) }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="input-block local-forms">
                                            <label>City <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="city"
                                                value="{{ old('city', $doctor->city) }}" placeholder="Enter your city">
                                            @if ($errors->has('city'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="input-block local-forms">
                                            <label>Country <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="country"
                                                value="{{ old('country', $doctor->country) }}" placeholder="Enter your country">
                                            @if ($errors->has('country'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('country') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="input-block local-forms">
                                            <label>State/Province <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="state"
                                                value="{{ old('state', $doctor->state) }}" placeholder="Enter your state or province">
                                            @if ($errors->has('state'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-3">
                                        <div class="input-block local-forms">
                                            <label>Postal Code <span class="login-danger">*</span></label>
                                            <input class="form-control" type="text" name="postal_code"
                                                value="{{ old('postal_code', $doctor->postal_code) }}" placeholder="Enter your postal code">
                                            @if ($errors->has('postal_code'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('postal_code') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Start Biography <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="biography" rows="3" placeholder="Write your biography">{{ old('biography', $doctor->biography) }}</textarea>
                                            @if ($errors->has('biography'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('biography') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                     <!-- Profile Image -->
                                     <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Profile Image</label>
                                            <input class="form-control" type="file" name="profile"
                                                value="{{ old('profile' , $doctor->avatar) }}">
                                                <img src="{{$doctor->getImage()}}" style="width: 100px;" alt="">
                                            @error('profile')
                                                <span style="color:red;font-size: 13px">{{ $errors->first('profile') }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Status <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" value="Active"
                                                        class="form-check-input mt-0"
                                                        {{ old('status', $doctor->status) == 'Active' ? 'checked' : '' }}> Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" value="Inactive"
                                                        class="form-check-input mt-0"
                                                        {{ old('status' , $doctor->status) == 'Inactive' ? 'checked' : '' }}> Inactive
                                                </label>
                                            </div>
                                            @if ($errors->has('status'))
                                                <span class=""
                                                    style="color:red;font-size: 13px">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit"
                                                class="btn btn-primary submit-form me-2">Update</button>
                                            <button type="reset" class="btn btn-primary cancel-form">Cancel</button>
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
