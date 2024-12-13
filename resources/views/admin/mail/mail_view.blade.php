@extends('admin.admin_dashboard_step')
@section('link')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs5.min.css') }}">
@endsection
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
                                    <img src="{{Auth::user()->AdminGetImage()}}" alt="img">
                                </div>
                                <div class="chat-users user-main">
                                    <div class="user-titles user-head-compse">
                                        <h5> {{Auth::user()->username}}</h5>
                                        <div class="chat-user-time">
                                            <p id="clock"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="compose-mail">
                                <a href="{{ route('admin.compose') }}" class="btn btn-primary"><img
                                        src="{{ asset('assets/img/icons/edit-2.svg') }}" class="me-2"
                                        alt="img">Compose Mail</a>
                            </div>
                            <div class="email-menu-blk">
                                <ul>
                                    <li class="{{ Route::is('admin.inbox') ? 'active' : '' }}"><a href="{{ route('admin.inbox') }}"><img
                                                src="{{ asset('assets/img/icons/inbox.svg') }}" class="me-2"
                                                alt="img">Inbox<span class="comman-flex">{{$countinbox}}</span></a></li>
                                    {{-- <li><a href="javascript:;"><img src="{{asset('assets/img/icons/star.svg" class="me-2" alt="img">Starred <span class="comman-flex">05</span></a></li> --}}
                                    <li class="{{ Route::is('admin.trash') ? 'active' : '' }}"><a  href="{{ route('admin.trash') }}"><img src="{{ asset('assets/img/icons/trash.svg') }}"
                                                class="me-2" alt="img">Trash <span class="comman-flex">{{$counttrash}}</span></a>
                                    </li>
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
                                                                                        <li ><a href="javascript:;"><img src="{{ asset('assets/img/icons/tag-icon-01.svg') }}" class="me-2" alt="img">Work<span class="comman-flex">50</span></a></li>
                                                                                        <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/tag-icon-02.svg') }}" class="me-2" alt="img">Personal <span class="comman-flex">120</span></a></li>
                                                                                        <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/tag-icon-03.svg') }}" class="me-2" alt="img">Read Later <span class="comman-flex">20</span></a></li>
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
                                                                                        <li ><a href="javascript:;"><img src="{{ asset('assets/img/icons/folder-icon-01.svg') }}" class="me-2" alt="img">Personal<span class="comman-flex">50</span></a></li>
                                                                                        <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/folder-icon-02.svg') }}" class="me-2" alt="img">Office <span class="comman-flex">120</span></a></li>
                                                                                        <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/folder-icon-03.svg') }}" class="me-2" alt="img">Bills <span class="comman-flex">20</span></a></li>
                                                                                        <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/folder-icon-04.svg') }}" class="me-2" alt="img">Medical <span class="comman-flex">20</span></a></li>
                                                                                    </ul>
                                                                                </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 ">
                    <div class="card chat-box ">
                        <div class="mailview-content view-content-bottom">
                            <div class="mail-view-list">
                                <ul class="nav">
                                    <li><a href="javascript:;"><img alt=""
                                                src="assets/img/icons/warning.svg"></a></li>
                                    <li><a href="javascript:;"><img alt=""
                                                src="assets/img/icons/tag-icon-04.svg"></a></li>
                                    <li><a href="javascript:;"><img alt="" src="assets/img/icons/inbox.svg"></a>
                                    </li>
                                    <li><a href="javascript:;"><img alt=""
                                                src="assets/img/icons/folder-icon-05.svg"></a></li>
                                </ul>
                            </div>
                            <div class="mailview-header comman-space-flex">
                                <div class="sender-info comman-flex">
                                    <div class="sender-img">
                                        <img alt="" src="assets/img/profiles/avatar-01.jpg"
                                            class="rounded-circle me-2">
                                    </div>
                                    <div class="send-user send-user-name">
                                        <h4>Bernardo James <span class="email-market">Marketting</span></h4>
                                        <p><span>From:</span> <a
                                                href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="b2ffd3c0d9dad3cbc1dfdbc6daf2d7cad3dfc2ded79cd1dddf">[email&#160;protected]</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="mail-reports">
                                    <ul class="nav">
                                        <li><a href="javascript:;" class="ford-angle star-bg"><i
                                                    class="fas fa-star starred"></i></a></li>
                                        <li><a href="javascript:;" class="ford-angle"><img alt=""
                                                    src="assets/img/icons/forward-icon-01.svg"></a></li>
                                        <li><a href="javascript:;" class="ford-angle"><img alt=""
                                                    src="assets/img/icons/forward-icon-02.svg"></a></li>
                                        <li><a href="javascript:;" class="ford-angle"><img alt=""
                                                    src="assets/img/icons/forward-icon-03.svg"></a></li>
                                        <li>
                                            <a href="javascript:;" class="ford-angle" data-bs-toggle="dropdown"
                                                aria-expanded="false" class="add-list-btn">
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
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mailview-inner">
                                <p>Hola, thanks for reaching me out.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                    est laborum.</p>
                                <p>Scelerisque purus semper eget duis at. Feugiat in fermentum posuere urna net.</p>
                                <p>Leo in vitae turpis massa sed element ?</p>
                            </div>
                            <div class="thank-mail">
                                <h5>Thanks</h5>
                                <h4>Mark hay smith</h4>
                            </div>
                            <div class="mail-attach">
                                <h2>Attachments<a href="javascript:;">Download All</a></h2>
                                <ul class="msg-sub-list nav">
                                    <li><img src="assets/img/icons/document-icon.svg" alt=""
                                            class="me-1">Expense.txt <span class="ms-1">30.0 MB</span><img
                                            src="assets/img/icons/chat-icon-07.svg" alt="" class="ms-2 "><i
                                            class="feather-x ms-2"></i></li>
                                    <li><img src="assets/img/icons/gallery-icon.svg" alt=""
                                            class="me-1">Expense.img <span class="ms-1">4.0 MB</span><img
                                            src="assets/img/icons/chat-icon-07.svg" alt="" class="ms-2 "><i
                                            class="feather-x ms-2"></i></li>
                                </ul>
                            </div>
                            <div class="forward-send">
                                <a href="javascript.html" class="btn btn-primary replay-btn me-2"><img
                                        src="assets/img/icons/replay.svg" class="me-2" alt="img">Reply</a>
                                <a href="javascript.html" class="btn btn-primary forwrd-btn"><img
                                        src="assets/img/icons/replay-01.svg" class="me-2" alt="img">Forward</a>
                                <a href="javascript.html"><img src="assets/img/icons/printer.svg" class="ms-2 me-2"
                                        alt="img"></a>
                                <a href="javascript.html"><img src="assets/img/icons/trash.svg" class="me-2"
                                        alt="img"></a>
                            </div>
                        </div>
                        <div class="mailview-content">
                            <div class="mail-view-list">
                                <ul class="nav">
                                    <li><a href="javascript:;"><img alt=""
                                                src="assets/img/icons/warning.svg"></a></li>
                                    <li><a href="javascript:;"><img alt=""
                                                src="assets/img/icons/tag-icon-04.svg"></a></li>
                                    <li><a href="javascript:;"><img alt="" src="assets/img/icons/inbox.svg"></a>
                                    </li>
                                    <li><a href="javascript:;"><img alt=""
                                                src="assets/img/icons/folder-icon-05.svg"></a></li>
                                </ul>
                            </div>
                            <div class="mailview-header comman-space-flex">
                                <div class="sender-info comman-flex">
                                    <div class="sender-img">
                                        <img alt="" src="assets/img/profiles/avatar-01.jpg"
                                            class="rounded-circle me-2">
                                    </div>
                                    <div class="send-user send-user-name">
                                        <h4>Bernardo James <span class="email-market">Marketting</span></h4>
                                        <p><span>From:</span> <a
                                                href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="a3eec2d1c8cbc2dad0cecad7cbe3c6dbc2ced3cfc68dc0ccce">[email&#160;protected]</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="mail-reports">
                                    <ul class="nav">
                                        <li><a href="javascript:;" class="ford-angle star-bg"><i
                                                    class="fas fa-star starred"></i></a></li>
                                        <li><a href="javascript:;" class="ford-angle"><img alt=""
                                                    src="assets/img/icons/forward-icon-01.svg"></a></li>
                                        <li><a href="javascript:;" class="ford-angle"><img alt=""
                                                    src="assets/img/icons/forward-icon-02.svg"></a></li>
                                        <li><a href="javascript:;" class="ford-angle"><img alt=""
                                                    src="assets/img/icons/forward-icon-03.svg"></a></li>
                                        <li>
                                            <a href="javascript:;" class="ford-angle" data-bs-toggle="dropdown"
                                                aria-expanded="false" class="add-list-btn">
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
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mailview-inner">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit.</p>
                            </div>
                            <div class="thank-mail">
                                <h5>Thanks</h5>
                                <h4>Mark hay smith</h4>
                            </div>
                            <div class="forward-send">
                                <a href="javascript.html" class="btn btn-primary replay-btn me-2"><img
                                        src="assets/img/icons/replay.svg" class="me-2" alt="img">Reply</a>
                                <a href="javascript.html" class="btn btn-primary forwrd-btn"><img
                                        src="assets/img/icons/replay-01.svg" class="me-2" alt="img">Forward</a>
                                <a href="javascript.html"><img src="assets/img/icons/printer.svg" class="ms-2 me-2"
                                        alt="img"></a>
                                <a href="javascript.html"><img src="assets/img/icons/trash.svg" class="me-2"
                                        alt="img"></a>
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
    <!-- Summernote JS -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs5.min.js')}}" type="7a072a2f107b3e4a75aa16d0-text/javascript"></script>
    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="7a072a2f107b3e4a75aa16d0-|49" defer></script>
@endsection
