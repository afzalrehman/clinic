@extends('super_admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <form action="{{route('superadmin.profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('_message')
                <div class="card-box">
                    <h3 class="card-title">Basic Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" src="{{($corrent_user->profile ? $corrent_user->getImage() : asset('assets/img/user.jpg')) }}" alt="user">
                                <div class="fileupload btn">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" name="profile" type="file">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block local-forms">
                                            <label class="focus-label">Name</label>
                                            <input type="text" class="form-control floating" name="name" value="{{$corrent_user->name}}" >
                                            <span style="color: red; font-size:13px;">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block local-forms">
                                            <label class="focus-label">UserName</label>
                                            <input type="text" class="form-control floating" name="username" value="{{$corrent_user->username}}">
                                            <span style="color: red; font-size:13px;">{{$errors->first('username')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block local-forms ">
                                            <label class="focus-label">Birth Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control floating datetimepicker" name="date_of_birth" type="text"
                                                    value="{{$corrent_user->date_of_birth}}">
                                            </div>
                                            <span style="color: red; font-size:13px;">{{$errors->first('date_of_birth')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block local-forms">
                                            <label class="focus-label">Gendar</label>
                                            <select class="form-control select" name="gender">
                                                <option value="">Select Gendar</option>
                                                <option  {{($corrent_user->gender == 'Male' ? 'selected' : '')}} value="Male">Male</option>
                                                <option  {{($corrent_user->gender == 'Female' ? 'selected' : '')}} value="Female">Female</option>
                                            </select>
                                            <span style="color: red; font-size:13px;">{{$errors->first('gender')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">Contact Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-block local-forms">
                                <label class="focus-label">Address</label>
                                <input type="text" class="form-control floating" name="address" value="{{$corrent_user->address}}">
                                <span style="color: red; font-size:13px;">{{$errors->first('address')}}</span>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">State</label>
                                <input type="text" class="form-control floating" value="New York">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Country</label>
                                <input type="text" class="form-control floating" value="United States">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Pin Code</label>
                                <input type="text" class="form-control floating" value="10523">
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Email</label>
                                <input type="text" class="form-control floating" name="email" value="{{$corrent_user->email}}">
                                <span style="color: red; font-size:13px;">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Phone Number</label>
                                <input type="text" class="form-control floating" name="phone" value="{{$corrent_user->phone}}">
                                <span style="color: red; font-size:13px;">{{$errors->first('phone')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">Informations</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Education</label>
                                <input type="text" class="form-control floating" name="education" value="{{$corrent_user->education}}">
                                <span style="color: red; font-size:13px;">{{$errors->first('education')}}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Designation</label>
                                <div class="">
                                    <input type="text" class="form-control floating " name="designation"
                                        value="{{$corrent_user->designation}}">
                                        <span style="color: red; font-size:13px;">{{$errors->first('designation')}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block local-forms">
                                <label class="focus-label">Department</label>
                                <div class="">
                                    <input type="text" class="form-control floating " name="department"
                                        value="{{$corrent_user->department}}">
                                        <span style="color: red; font-size:13px;">{{$errors->first('department')}}</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
          
                <div class="text-center ">
                    <button class="btn btn-primary submit-btn mb-4" type="submit">Save</button>
                </div>
            </form>
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
