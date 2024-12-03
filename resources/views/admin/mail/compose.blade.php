@extends('admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="inbox.html">App </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-xl-4 d-flex">
                    <div class="card chat-box">
                        <div class="chat-widgets">
                            <div class="chat-user-group d-flex align-items-center">
                                <div class="img-users call-user">
                                    <img src="assets/img/profiles/avatar-01.jpg" alt="img">
                                </div>
                                <div class="chat-users user-main">
                                    <div class="user-titles user-head-compse">
                                        <h5> William Stephin </h5>
                                        <div class="chat-user-time">
                                            <p>10:22 AM</p>
                                        </div>
                                    </div>
                                    <div class="drop-item chat-menu user-dot-list">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                                            <i class="feather-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="javascript:;"><i
                                                    class="feather-user me-2 text-primary"></i> Profile</a>
                                            <a class="dropdown-item" href="javascript:;"><i
                                                    class="feather-plus-circle me-2 text-success"></i> Archive</a>
                                            <a class="dropdown-item" href="javascript:;"><i
                                                    class="feather-trash-2 me-2 text-danger"></i> Delete</a>
                                            <a class="dropdown-item " href="javascript:;"><i
                                                    class="feather-slash me-2 text-secondary"></i> Block</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="compose-mail">
                                <a href="compose.html" class="btn btn-primary"><img src="assets/img/icons/edit-2.svg"
                                        class="me-2" alt="img">Compose Mail</a>
                            </div>
                            <div class="email-menu-blk">
                                <ul>
                                    <li class="active"><a href="javascript:;"><img src="assets/img/icons/inbox.svg"
                                                class="me-2" alt="img">Inbox<span class="comman-flex">50</span></a>
                                    </li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/sent.svg" class="me-2"
                                                alt="img">Sent <span class="comman-flex">120</span></a></li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/draft.svg" class="me-2"
                                                alt="img">Draft <span class="comman-flex">20</span></a></li>
                                    <!-- <li><a href="javascript:;"><img src="assets/img/icons/star.svg" class="me-2" alt="img">Starred <span class="comman-flex">05</span></a></li> -->
                                    <li><a href="javascript:;"><img src="assets/img/icons/trash.svg" class="me-2"
                                                alt="img">Trash <span class="comman-flex">12</span></a></li>
                                </ul>
                            </div>
                            <!-- <div class="label-blk comman-space-flex">
                                <h4>Labels</h4>
                                <ul class="nav label-add-list">
                                    <li><a href="javascript:;" class="add-list-btn me-2"><i class="feather-plus "></i></a></li>
                                    <li>
                                        <a href="javascript:;" data-bs-toggle="dropdown" aria-expanded="false" class="add-list-btn">
                                            <i class="feather-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="javascript:;"><i class="feather-user me-2 text-primary"></i> Profile</a>
                                            <a class="dropdown-item" href="javascript:;"><i class="feather-plus-circle me-2 text-success"></i> Archive</a>
                                            <a class="dropdown-item" href="javascript:;"><i class="feather-trash-2 me-2 text-danger"></i> Delete</a>
                                            <a class="dropdown-item " href="javascript:;"><i class="feather-slash me-2 text-secondary"></i> Block</a>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- <div class="email-menu-blk">
                                <ul >
                                    <li ><a href="javascript:;"><img src="assets/img/icons/tag-icon-01.svg" class="me-2" alt="img">Work<span class="comman-flex">50</span></a></li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/tag-icon-02.svg" class="me-2" alt="img">Personal <span class="comman-flex">120</span></a></li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/tag-icon-03.svg" class="me-2" alt="img">Read Later <span class="comman-flex">20</span></a></li>
                                </ul>
                            </div> -->
                            <!-- <div class="label-blk comman-space-flex">
                                <h4>Folders</h4>
                                <ul class="nav label-add-list ">
                                    <li><a href="javascript:;" class="add-list-btn me-2"><i class="feather-plus "></i></a></li>
                                    <li>
                                        <a href="javascript:;" data-bs-toggle="dropdown" aria-expanded="false" class="add-list-btn">
                                            <i class="feather-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="javascript:;"><i class="feather-user me-2 text-primary"></i> Profile</a>
                                            <a class="dropdown-item" href="javascript:;"><i class="feather-plus-circle me-2 text-success"></i> Archive</a>
                                            <a class="dropdown-item" href="javascript:;"><i class="feather-trash-2 me-2 text-danger"></i> Delete</a>
                                            <a class="dropdown-item " href="javascript:;"><i class="feather-slash me-2 text-secondary"></i> Block</a>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                            <!-- <div class="email-menu-blk">
                                <ul class="mb-0">
                                    <li ><a href="javascript:;"><img src="assets/img/icons/folder-icon-01.svg" class="me-2" alt="img">Personal<span class="comman-flex">50</span></a></li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/folder-icon-02.svg" class="me-2" alt="img">Office <span class="comman-flex">120</span></a></li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/folder-icon-03.svg" class="me-2" alt="img">Bills <span class="comman-flex">20</span></a></li>
                                    <li><a href="javascript:;"><img src="assets/img/icons/folder-icon-04.svg" class="me-2" alt="img">Medical <span class="comman-flex">20</span></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card chat-box mb-2">
                        <div class="compose-mail">
                            <h3>Compose New Mail</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-block local-forms">
                                    <label>To</label>
                                    <input type="text" class="form-control ">
                                    <ul class="nav sub-mails">
                                        <li><a href="javascript:;">CC</a></li>
                                        <li><a href="javascript:;">Bcc</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-block local-forms">
                                    <label>Subject</label>
                                    <input type="text" class="form-control ">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-block summer-mail">
                                    <textarea rows="4" cols="5" class="form-control summernote" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="input-block local-top-form">
                                    <label class="local-top">Attachments <span class="login-danger">*</span></label>
                                    <div class="settings-btn upload-files-avator">
                                        <input type="file" accept="image/*" name="image" id="file"
                                            onchange="if (!window.__cfRLUnblockHandlers) return false; loadFile(event)"
                                            class="hide-input" data-cf-modified-7a072a2f107b3e4a75aa16d0-="">
                                        <label for="file" class="upload">Choose File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mail-send">
                                    <a href="javascript.html"><img src="assets/img/icons/trash.svg" class="me-2"
                                            alt="img"></a>
                                    <a href="javascript.html"><img src="assets/img/icons/ram.svg" class="me-2"
                                            alt="img"></a>
                                    <a href="javascript.html" class="btn btn-primary">Send</a>
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
