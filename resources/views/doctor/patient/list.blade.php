@extends('doctor.admin_dashboard_step')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Cards</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Cards -->
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <img alt="Card Image" src="assets/img/img-01.jpg" class="card-img-top">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with image and links</h5>
                    </div>
                    <div class="card-body card-buttons">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="card-link" href="#">Card link</a>
                        <a class="card-link" href="#">Another link</a>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <img alt="Card Image" src="assets/img/img-01.jpg" class="card-img-top">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with image and button</h5>
                    </div>
                    <div class="card-body card-buttons">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary" href="#">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <img alt="Card Image" src="assets/img/img-01.jpg" class="card-img-top">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with image and list</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with links</h5>
                    </div>
                    <div class="card-body card-buttons">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="card-link" href="#">Card link</a>
                        <a class="card-link" href="#">Another link</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with button</h5>
                    </div>
                    <div class="card-body card-buttons">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a class="btn btn-primary" href="#">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with list</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        This is my header
                    </div>
                    <div class="card-body card-buttons">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer text-muted">
                        This is my footer
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <ul role="tablist" class="nav nav-tabs card-header-tabs float-end">
                            <li class="nav-item">
                                <a href="#tab-1" data-bs-toggle="tab" class="nav-link active">Active</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-2" data-bs-toggle="tab" class="nav-link">Link</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-3" data-bs-toggle="tab" class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body card-buttons">
                        <div class="tab-content pt-0">
                            <div role="tabpanel" id="tab-1" class="tab-pane fade show active">
                                <h5 class="card-title">Card with tabs</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn btn-primary" href="#">Go somewhere</a>
                            </div>
                            <div role="tabpanel" id="tab-2" class="tab-pane fade text-center">
                                <h5 class="card-title">Card with tabs</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn btn-primary" href="#">Go somewhere</a>
                            </div>
                            <div role="tabpanel" id="tab-3" class="tab-pane fade">
                                <h5 class="card-title">Card with tabs</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn btn-primary" href="#">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <ul role="tablist" class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a href="#tab-4" data-bs-toggle="tab" class="nav-link active">Active</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-5" data-bs-toggle="tab" class="nav-link">Link</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-6" data-bs-toggle="tab" class="nav-link disabled">Disabled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body card-buttons">
                        <div class="tab-content pt-0">
                            <div role="tabpanel" id="tab-4" class="tab-pane fade show active">
                                <h5 class="card-title">Card with pills</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn btn-primary" href="#">Go somewhere</a>
                            </div>
                            <div role="tabpanel" id="tab-5" class="tab-pane fade text-center">
                                <h5 class="card-title">Card with pills</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn btn-primary" href="#">Go somewhere</a>
                            </div>
                            <div role="tabpanel" id="tab-6" class="tab-pane fade">
                                <h5 class="card-title">Card with pills</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn btn-primary" href="#">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Cards -->							
                            
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
