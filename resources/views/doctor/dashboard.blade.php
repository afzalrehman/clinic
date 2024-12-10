@extends('doctor.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html">Dashboard </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Doctor Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="good-morning-blk">
                <div class="row">
                    <div class="col-md-6">
                        <div class="morning-user">
                            <h2>Good Morning, <span>Dr.Smith Wayne</span></h2>
                            <p>Have a nice day at work</p>
                        </div>
                    </div>
                    <div class="col-md-6 position-blk">
                        <div class="morning-img">
                            <img src="assets/img/morning-img-02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="doctor-list-blk">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget border-right-bg">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="assets/img/icons/doctor-dash-01.svg" alt="">
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4><span class="counter-up">30</span><span>/85</span><span class="status-green">+60%</span>
                                </h4>
                                <h5>Appointments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget border-right-bg">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="assets/img/icons/doctor-dash-02.svg" alt="">
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4><span class="counter-up">20</span><span>/125</span><span class="status-pink">-20%</span>
                                </h4>
                                <h5>Consultations</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget border-right-bg">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="assets/img/icons/doctor-dash-03.svg" alt="">
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4><span class="counter-up">12</span><span>/30</span><span class="status-green">+40%</span>
                                </h4>
                                <h5>Operations</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="doctor-widget">
                            <div class="doctor-box-icon flex-shrink-0">
                                <img src="assets/img/icons/doctor-dash-04.svg" alt="">
                            </div>
                            <div class="doctor-content dash-count flex-grow-1">
                                <h4>$<span class="counter-up">530</span><span></span><span class="status-green">+50%</span>
                                </h4>
                                <h5>Earnings</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit mb-0">
                                <h4>Income</h4>
                                <div class="income-value">
                                    <h3><span>$</span> 20,560</h3>
                                    <p><span class="passive-view"><i class="feather-arrow-up-right me-1"></i>40%</span> vs
                                        last month</p>
                                </div>
                                <div class="input-block mb-0">
                                    <select class="form-control select">
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div id="apexcharts-area"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-3 d-flex">
                    <div class="card">
                        <div class="card-body">
                            <div id="radial-patients"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-2 d-flex">
                    <div class="struct-point">
                        <div class="card patient-structure">
                            <div class="card-body">
                                <h5>New Patients</h5>
                                <h3>56<span class="status-green"><img src="assets/img/icons/sort-icon-01.svg" alt=""
                                            class="me-1">60%</span></h3>
                            </div>
                        </div>
                        <div class="card patient-structure">
                            <div class="card-body">
                                <h5>Old Patients</h5>
                                <h3>35<span class="status-pink"><img src="assets/img/icons/sort-icon-02.svg" alt=""
                                            class="me-1">-20%</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12  col-xl-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title patient-visit">
                                <h4>Activity Chart</h4>
                                <div>
                                    <ul class="nav chat-user-total">
                                        <li><i class="fa fa-circle low-users" aria-hidden="true"></i>Low</li>
                                        <li><i class="fa fa-circle current-users" aria-hidden="true"></i> High</li>
                                    </ul>
                                </div>
                                <div class="input-block mb-0">
                                    <select class="form-control select">
                                        <option>This Week</option>
                                        <option>Last Week</option>
                                        <option>This Month</option>
                                        <option>Last Month</option>
                                    </select>
                                </div>
                            </div>
                            <div id="activity-chart"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12  col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title d-inline-block">Recent Appointments</h4> <a
                                        href="appointments.html" class="patient-views float-end">Show all</a>
                                </div>
                                <div class="card-body p-0 table-dash">
                                    <div class="table-responsive">
                                        <table class="table mb-0 border-0 custom-table">
                                            <tbody>
                                                <tr>
                                                    <td class="table-image appoint-doctor">
                                                        <img width="28" height="28" class="rounded-circle"
                                                            src="assets/img/profiles/avatar-02.jpg" alt="">
                                                        <h2>Dr.Jenny Smith</h2>
                                                    </td>
                                                    <td class="appoint-time text-center">
                                                        <h6>Today 5:40 PM</h6>
                                                        <span>Typoid Fever</span>
                                                    </td>
                                                    <td>
                                                        <button class="check-point status-green me-1"><i
                                                                class="feather-check"></i></button>
                                                        <button class="check-point status-pink "><i
                                                                class="feather-x"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-image appoint-doctor">
                                                        <img width="28" height="28" class="rounded-circle"
                                                            src="assets/img/profiles/avatar-03.jpg" alt="">
                                                        <h2>Dr.Angelica Ramos</h2>
                                                    </td>
                                                    <td class="appoint-time text-center">
                                                        <h6>Today 5:40 PM</h6>
                                                        <span>Typoid Fever</span>
                                                    </td>
                                                    <td>
                                                        <button class="check-point status-green me-1"><i
                                                                class="feather-check"></i></button>
                                                        <button class="check-point status-pink "><i
                                                                class="feather-x"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="table-image appoint-doctor">
                                                        <img width="28" height="28" class="rounded-circle"
                                                            src="assets/img/profiles/avatar-04.jpg" alt="">
                                                        <h2>Dr.Martin Doe</h2>
                                                    </td>
                                                    <td class="appoint-time text-center">
                                                        <h6>Today 5:40 PM</h6>
                                                        <span>Typoid Fever</span>
                                                    </td>
                                                    <td>
                                                        <button class="check-point status-green me-1"><i
                                                                class="feather-check"></i></button>
                                                        <button class="check-point status-pink "><i
                                                                class="feather-x"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12 col-xl-5 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Recent Appointments</h4> <a href="appointments.html"
                                class="patient-views float-end">Show all</a>
                        </div>
                        <div class="card-body">
                            <div class="teaching-card">
                                <ul class="steps-history">
                                    <li>08:00</li>
                                </ul>
                                <ul class="activity-feed">
                                    <li class="feed-item d-flex align-items-center">
                                        <div class="dolor-activity hide-activity">
                                            <ul class="doctor-date-list mb-2">
                                                <li class="stick-line"><i class="fas fa-circle me-2"></i>08:00
                                                    <span>Benjamin Bruklin</span></li>
                                                <li class="stick-line"><i class="fas fa-circle me-2"></i>08:00
                                                    <span>Andrea Lalema</span></li>
                                                <li class=" dropdown ongoing-blk ">
                                                    <a href="#" class="dropdown-toggle  active-doctor"
                                                        data-bs-toggle="dropdown">
                                                        <i class="fas fa-circle me-2 active-circles"></i>08:00 <span>Andrea
                                                            Lalema</span><span class="ongoing-drapt">Ongoing <i
                                                                class="feather-chevron-down ms-2"></i></span>
                                                    </a>
                                                    <ul class="doctor-sub-list dropdown-menu">
                                                        <li class="patient-new-list dropdown-item">Patient<span>Marie
                                                                kennedy</span><a href="javascript:;"
                                                                class="new-dot status-green"><i
                                                                    class="fas fa-circle me-1 fa-2xs"></i>New</a></li>
                                                        <li class="dropdown-item">Time<span>8:30 - 9:00 (30min)</span></li>
                                                        <li class="schedule-blk mb-0 pt-2 dropdown-item">
                                                            <ul class="nav schedule-time">
                                                                <li><a href="javascript:;"><img
                                                                            src="assets/img/icons/trash.svg"
                                                                            alt=""></a></li>
                                                                <li><a href="javascript:;"><img
                                                                            src="assets/img/icons/profile.svg"
                                                                            alt=""></a></li>
                                                                <li><a href="javascript:;"><img
                                                                            src="assets/img/icons/edit.svg"
                                                                            alt=""></a></li>
                                                            </ul>
                                                            <a class="btn btn-primary appoint-start">Start Appointment</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="teaching-card">
                                <ul class="steps-history">
                                    <li>09:00</li>
                                </ul>
                                <ul class="activity-feed">
                                    <li class="feed-item d-flex align-items-center">
                                        <div class="dolor-activity">
                                            <ul class="doctor-date-list mb-2">
                                                <li><i class="fas fa-circle me-2"></i>09:00 <span>Galaviz Lalema</span>
                                                </li>
                                                <li><i class="fas fa-circle me-2"></i>09:20 <span>Benjamin Bruklin</span>
                                                </li>
                                                <li><i class="fas fa-circle me-2"></i>09:40 <span>Jenny Smith</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="teaching-card">
                                <ul class="steps-history">
                                    <li>10:00</li>
                                </ul>
                                <ul class="activity-feed">
                                    <li class="feed-item d-flex align-items-center">
                                        <div class="dolor-activity">
                                            <ul class="doctor-date-list mb-2">
                                                <li><i class="fas fa-circle me-2"></i>10:00 <span>Cristina Groves</span>
                                                </li>
                                                <li><i class="fas fa-circle me-2"></i>10:30 <span>Benjamin Bruklin</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="teaching-card">
                                <ul class="steps-history">
                                    <li>11:00</li>
                                </ul>
                                <ul class="activity-feed">
                                    <li class="feed-item d-flex align-items-center">
                                        <div class="dolor-activity">
                                            <ul class="doctor-date-list mb-2">
                                                <li><i class="fas fa-circle me-2"></i>11:00 <span>Cristina Groves</span>
                                                </li>
                                                <li><i class="fas fa-circle me-2"></i>11:30 <span>Benjamin Bruklin</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
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
