@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('clinic.patient') }}">Patients </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Patient Profile</li>
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
                                <div class="col-md-12">
                                    <div class="about-info">
                                        <h4>Patients Profile <span><a href="javascript:;"><i
                                                        class="feather-more-vertical"></i></a></span></h4>
                                    </div>
                                    <div class="doctor-profile-head">
                                        <div class="profile-bg-img">
                                            <img src="{{ asset('assets/img/profile-bg.jpg') }}" alt="Profile">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-4 col-md-4">
                                                <div class="profile-user-box">
                                                    <div class="profile-user-img">
                                                        <img src="{{ $patient->getImage() }}" alt="Profile">
                                                        {{-- <div class="input-block doctor-up-files profile-edit-icon mb-0">
                                                            <div class="uplod d-flex">
                                                                <label class="file-upload profile-upbtn mb-0">
                                                                    <img src="{{$patient->getImage()}}"
                                                                        alt="Profile"></i><input type="file">
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="names-profiles">
                                                        <h4>{{ $patient->name }}</h4>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="doctor-personals-grp">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="personal-list-out">
                                            <div class="row">
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Full Name</h2>
                                                        <h3>{{ $patient->name }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Mobile </h2>
                                                        <h3>{{ $patient->mobile }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Email</h2>
                                                        <h3><a href="mail:to{{ $patient->email }}" class="__cf_email__"
                                                                data-cfemail="9eedf3f7eaf6defbf3fff7f2b0fdf1f3">{{ $patient->email }}</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Cnic</h2>
                                                        <h3>{{ $patient->cnic }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Date Of Birth</h2>
                                                        <h3>{{ $patient->date_of_birth }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Blood Group</h2>
                                                        <h3>{{ $patient->blood_group }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Gender</h2>
                                                        <h3>{{ $patient->gender }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>City</h2>
                                                        <h3>{{ $patient->city }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Marital Status</h2>
                                                        <h3>{{ $patient->marital_status }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Address</h2>
                                                        <h3>{{ $patient->address }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Emergency Contact Name</h2>
                                                        <h3>{{ $patient->emergency_contact_name }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Emergency Contact Number</h2>
                                                        <h3>{{ $patient->emergency_contact_number }}</h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6 my-3">
                                                    <div class="detail-personal">
                                                        <h2>Status</h2>
                                                        <h3>{{ $patient->status }}</h3>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="hello-park">
                                            <h2>Known Allergies</h2>
                                            <p{{ $patient->known_allergies }}< /p>

                                        </div>
                                        <div class="hello-park">
                                            <h2>Chronic Illnesses</h2>
                                            <p>{{ $patient->chronic_illnesses }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title ">Appointment History</h4>
                                </div>
                                <div class="card-body p-0 table-dash">
                                    <div class="table-responsive">
                                        <table class="table mb-0 border-0 datatable custom-table patient-profile-table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Consulting Doctor</th>
                                                    <th>Department</th>
                                                    <th>Treatment</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ url('clinic/appoinment/edit/' . $appoinment->id) }}"><i
                                                                        class="fa-solid fa-pen-to-square m-r-5"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_patient{{ $appoinment->id }}"><i
                                                                        class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="profile-image"><a
                                                            href="{{ url('/clinic/patient?search=' . $appoinment->patient_id) }}">
                                                            {{ $appoinment_patient->name }} </a>
                                                    </td>
                                                    <td><a
                                                            href="{{ url('/clinic/doctor?search=' . $appoinment->doctor_name) }}">{{ $appoinment->doctor_name }}</a>
                                                    </td>
                                                    <td>{{ $appoinment->department_name }}</td>
                                                    <td>{{ $appoinment->treatment }}</td>
                                                    <td><a
                                                            href="tail:{{ $appoinment->patient_mobile }}">{{ $appoinment->patient_mobile }}</a>
                                                    </td>
                                                    <td><a
                                                            href="mailto:{{ $appoinment->patient_email }}">{{ $appoinment->patient_email }}</a>
                                                    </td>
                                                    <td>{{ $appoinment->appointment_date }}</td>
                                                    <td>
                                                        <select id="{{ $appoinment->id }}" name="status"
                                                            class="custom-badge status-green changeStatus"
                                                            style="border: none; outline: none;"
                                                            onchange="updateStatusClass(this)">
                                                            <option appoinment="Upcoming" class="status-pink"
                                                                {{ $appoinment->status == 'Upcoming' ? 'selected' : '' }}>
                                                                Upcoming
                                                            </option>
                                                            <option appoinment="Completed" class="status-green"
                                                                {{ $appoinment->status == 'Completed' ? 'selected' : '' }}>
                                                                Completed
                                                            </option>
                                                            <option appoinment="Cancelled" class="status-red"
                                                                {{ $appoinment->status == 'Cancelled' ? 'selected' : '' }}>
                                                                Cancelled
                                                            </option>
                                                        </select>
                                                    </td>

                                                </tr>
                                                <div id="delete_patient{{ $appoinment->id }}"
                                                    class="modal fade delete-modal" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('assets/img/sent.png') }}"
                                                                    alt="" width="50" height="46">
                                                                <h3>Are you sure want to delete this ?</h3>
                                                                <div class="m-t-20"> <a href="#"
                                                                        class="btn btn-white"
                                                                        data-bs-dismiss="modal">Close</a>
                                                                    <a href="{{ url('clinic/appoinment/delete/' . $appoinment->id) }}"
                                                                        class="btn btn-danger">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </tbody>
                                        </table>
                                    </div>
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
