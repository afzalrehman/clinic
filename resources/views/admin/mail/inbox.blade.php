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
                                <img src="{{asset('assets/img/profiles/avatar-01.jpg')}}" alt="img">
                            </div>
                            <div class="chat-users user-main">
                                <div class="user-titles user-head-compse">
                                    <h5> William Stephin	</h5>
                                    <div class="chat-user-time">
                                        <p>10:22 AM</p>
                                    </div>
                                </div>
                                <div class="drop-item chat-menu user-dot-list">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                                        <i class="feather-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="javascript:;"><i class="feather-user me-2 text-primary"></i> Profile</a>
                                        <a class="dropdown-item" href="javascript:;"><i class="feather-plus-circle me-2 text-success"></i> Archive</a>
                                        <a class="dropdown-item" href="javascript:;"><i class="feather-trash-2 me-2 text-danger"></i> Delete</a>
                                        <a class="dropdown-item " href="javascript:;"><i class="feather-slash me-2 text-secondary"></i> Block</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="compose-mail">
                            <a href="compose.html" class="btn btn-primary"><img src="{{asset('assets/img/icons/edit-2.svg')}}" class="me-2" alt="img">Compose Mail</a>
                        </div>
                        <div class="email-menu-blk">
                            <ul >
                                <li class="active"><a href="{{route('admin.inbox')}}"><img src="{{asset('assets/img/icons/inbox.svg')}}" class="me-2" alt="img">Inbox<span class="comman-flex">50</span></a></li>
                                {{-- <li><a href="javascript:;"><img src="{{asset('assets/img/icons/star.svg" class="me-2" alt="img">Starred <span class="comman-flex">05</span></a></li> --}}
                                <li><a href="javascript:;"><img src="{{asset('assets/img/icons/trash.svg')}}" class="me-2" alt="img">Trash <span class="comman-flex">12</span></a></li>
                            </ul>
                        </div>
                   
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card chat-box mb-2">
                    <div class=" chat-search-group ">
                        <div class="chat-user-group mb-0 d-flex align-items-center">
                            <div class="top-check me-3">
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" >
                                </div>
                            </div>
                            <div class="top-inbox-blk comman-flex me-3">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                                    <i class="feather-more-vertical"></i>
                                </a>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="javascript:;"> Reply</a>
                                    <a class="dropdown-item" href="javascript:;"> Forward</a>
                                    <a class="dropdown-item" href="javascript:;"> Archived</a>
                                    <a class="dropdown-item " href="javascript:;"> Mark as Read</a>
                                    <a class="dropdown-item " href="javascript:;"> Mark as Unread</a>
                                    <a class="dropdown-item " href="javascript:;"> Delete</a>
                                </div>
                            </div>
                            <div class="top-liv-search top-chat-search top-action-search">
                                <form>
                                    <div class="chat-search mb-0">
                                        <div class="input-block me-2 mb-0">
                                            <input type="text" class="form-control" placeholder="Search here">
                                            <a class="btn"><img src="{{asset('assets/img/icons/search-normal.svg')}}" alt=""></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="top-action-right">
                            <ul class="nav">
                                <li><a href="javascript:;"><img src="{{asset('assets/img/icons/refresh-icon.svg')}}" alt="img"></a></li>
                                <li><a href="javascript:;"><img src="{{asset('assets/img/icons/tag-icon-04.svg')}}" alt="img"></a></li>
                                <li><a href="javascript:;"><img src="{{asset('assets/img/icons/inbox.svg')}}" alt="img"></a></li>
                                <li><a href="javascript:;"><img src="{{asset('assets/img/icons/folder-icon-05.svg')}}" alt="img"></a></li>
                                <li><a href="javascript:;"><img src="{{asset('assets/img/icons/trash.svg')}}" alt="img"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="email-content">
                    <div class="table-responsive">
                        <table class="table table-inbox table-hover">
                            <tbody>
                                <tr class="unread clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><i class="fas fa-star starred"></i></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-03.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-market">Marketting</span></h4>
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date"><img src="{{asset('assets/img/icons/clip.svg')}}" class="me-2" alt="img">13:14</td>
                                </tr>
                                <tr class="unread clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><img src="{{asset('assets/img/icons/star-empty.svg')}}"  alt="img"></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-04.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Galaviz Lalema <span class="email-bills">Bills</span></h4>
                                                <p>Fwd: quis nostrud exercitation ullamco laboris nisi ut aliquip voluptate velit esse cillum.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date">8:42</td>
                                </tr>
                                <tr class="clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><img src="{{asset('assets/img/icons/star-empty.svg')}}"  alt="img"></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-05.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-work">Work</span></h4>
                                                <p>Fwd: tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date"><img src="{{asset('assets/img/icons/clip.svg')}}" class="me-2" alt="img">13:14</td>
                                </tr>
                                <tr class="unread clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><i class="fas fa-star starred"></i></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-06.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-office">Office</span></h4>
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date">18 Sep</td>
                                </tr>
                                <tr class="clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><i class="fas fa-star starred"></i></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-07.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-market">Marketting</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date"><img src="{{asset('assets/img/icons/clip.svg')}}" class="me-2" alt="img">13:14</td>
                                </tr>
                                <tr class="clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><img src="{{asset('assets/img/icons/star-empty.svg')}}"  alt="img"></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-04.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Galaviz Lalema <span class="email-bills">Bills</span></h4>
                                                <p>Fwd: quis nostrud exercitation ullamco laboris nisi ut aliquip voluptate velit esse cillum.</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date">1 Aug</td>
                                </tr>
                                <tr class="unread clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><img src="{{asset('assets/img/icons/star-empty.svg')}}"  alt="img"></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-05.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-work">Work</span></h4>
                                                <p>Fwd: tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date"><img src="{{asset('assets/img/icons/clip.svg')}}" class="me-2" alt="img">13:14</td>
                                </tr>
                                <tr class="clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check ">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><i class="fas fa-star starred"></i></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-06.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-market">Marketting</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date"><img src="{{asset('assets/img/icons/clip.svg')}}" class="me-2" alt="img">13:14</td>
                                </tr>
                                <tr class="unread clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><img src="{{asset('assets/img/icons/star-empty.svg')}}"  alt="img"></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-04.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-work">Work</span></h4>
                                                <p>Fwd: tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date"><img src="{{asset('assets/img/icons/clip.svg')}}" class="me-2" alt="img">13:14</td>
                                </tr>
                                <tr class="clickable-row" data-href="mail-view.html">
                                    <td>
                                        <div class="top-check">
                                            <div class="form-check">
                                              <input type="checkbox" class="form-check-input" >
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="mail-important"><i class="fas fa-star starred"></i></span></td>
                                    <td class="name">
                                        <div class="email-img-blk">
                                            <div class="email-img">
                                                <img src="{{asset('assets/img/profiles/avatar-02.jpg')}}"  alt="img">
                                            </div>
                                            <div class="send-user">
                                                <h4>Bernardo James <span class="email-office">Office</span></h4>
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="mail-date">Sep 12</td>
                                </tr>
                            </tbody>
                        </table>
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
@section('script')
    <!-- Summernote JS -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs5.min.js')}}" type="7a072a2f107b3e4a75aa16d0-text/javascript"></script>
    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="7a072a2f107b3e4a75aa16d0-|49" defer></script>
@endsection

