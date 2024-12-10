@extends('doctor.admin_dashboard_step')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="activites.html">Activites </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">User Activity</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="activity">
                            <div class="activity-box">
                                <ul class="activity-list">
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.html" title="Lesley Grauer" data-bs-toggle="tooltip" class="avatar">
                                                <img alt="Lesley Grauer" src="assets/img/user-02.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content timeline-group-blk">
                                            <div class="timeline-group flex-shrink-0">
                                                <h4>20 Oct 2022</h4>
                                                <span class="time">5.50 PM</span>
                                            </div>
                                            <div class="comman-activitys flex-grow-1">
                                                <h3>Dr.Henry Markhay <span> Completed the Patient visit at Glory Hospital in Florida, USA .</span></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.html" title="Lesley Grauer" data-bs-toggle="tooltip" class="avatar">
                                                <img alt="Lesley Grauer" src="assets/img/user-06.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content timeline-group-blk">
                                            <div class="timeline-group flex-shrink-0">
                                                <h4>Today</h4>
                                                <span class="time">4.50 PM</span>
                                            </div>
                                            <div class="comman-activitys flex-grow-1">
                                                <h3>Bernardo James <span>  Uploaded 3 new photos for World Safety Event</span></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                                <ul class="nav activity-sub-list mt-2">
                                                    <li><img class="img-fluid" src="assets/img/activity-01.jpg" alt=""></li>
                                                    <li><img class="img-fluid" src="assets/img/activity-02.jpg" alt=""></li>
                                                    <li><img class="img-fluid" src="assets/img/activity-03.jpg" alt=""></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.html" title="Catherine Manseau" data-bs-toggle="tooltip" class="avatar">
                                                <img alt="Catherine Manseau" src="assets/img/user-05.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content timeline-group-blk">
                                            <div class="timeline-group flex-shrink-0">
                                                <h4>Yesterday</h4>
                                                <span class="time">3.20 PM</span>
                                            </div>
                                            <div class="comman-activitys flex-grow-1">
                                                <h3>Dr. Linda Carpenter  <span> Doctors Meeting </span></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                                <div class="activity-maps mt-2">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.686401249513!2d-118.29111468533449!3d34.077552423844466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75d59983353%3A0x14ab68d941678167!2sPATH!5e0!3m2!1sen!2sin!4v1669811489573!5m2!1sen!2sin" ></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="#" title="Bernardo Galaviz" data-bs-toggle="tooltip" class="avatar">
                                                <img alt="Bernardo Galaviz" src="assets/img/user-03.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content timeline-group-blk">
                                            <div class="timeline-group flex-shrink-0">
                                                <h4>05 Sep 2022</h4>
                                                <span class="time">1.20 PM</span>
                                            </div>
                                            <div class="comman-activitys flex-grow-1">
                                                <h3>Dr.Markhay smith <span> was Completed the Operation With in Deadline</span></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="activity-user">
                                            <a href="profile.html" title="Mike Litorus" data-bs-toggle="tooltip" class="avatar">
                                                <img alt="Mike Litorus" src="assets/img/user-04.jpg" class="img-fluid rounded-circle">
                                            </a>
                                        </div>
                                        <div class="activity-content timeline-group-blk">
                                            <div class="timeline-group flex-shrink-0">
                                                <h4>20 Oct 2022</h4>
                                                <span class="time">2.20 PM</span>
                                            </div>
                                            <div class="comman-activitys flex-grow-1">
                                                <h3>Rio Williams <span> Posted a Blog about Corona Safety Measurements</span></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                                <ul class="latest-posts latest-posts-act mt-2">
                                                    <li>
                                                        <div class="post-thumb">
                                                            <a href="javascript:;">
                                                                <img class="img-fluid" src="assets/img/blog/blog-8.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-info">
                                                            <div class="date-posts">
                                                                <h5>Safety</h5>
                                                                <span class="ms-2">10 Oct 2022</span>
                                                            </div>
                                                            <h4>
                                                                <a href="javascript:;">Keep Hand Sanitizers Away from Young Children</a>
                                                            </h4>
                                                            <p> Read more in 8 Minutes<i class="fa fa-long-arrow-right ms-2"></i></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
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
