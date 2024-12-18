@extends('clinic.admin_dashboard_step')
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
                @include('_message')
                <div class="col-xl-4 d-flex">
                    <div class="card chat-box">
                        <div class="chat-widgets">
                            <div class="chat-user-group d-flex align-items-center">
                                <div class="img-users call-user">
                                    <img src="{{Auth::user()->AdminGetImage()}}" alt="Image">
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
                                <a href="{{ route('clinic.compose') }}" class="btn btn-primary"><img
                                        src="{{ asset('assets/img/icons/edit-2.svg') }}" class="me-2"
                                        alt="img">Compose Mail</a>
                            </div>
                            <div class="email-menu-blk">
                                <ul>
                                    <li class="{{ Route::is('clinic.inbox') ? 'active' : '' }}"><a href="{{ route('clinic.inbox') }}"><img
                                                src="{{ asset('assets/img/icons/inbox.svg') }}" class="me-2"
                                                alt="img">Inbox<span class="comman-flex">{{$countinbox}}</span></a></li>
                                    {{-- <li><a href="javascript:;"><img src="{{asset('assets/img/icons/star.svg" class="me-2" alt="img">Starred <span class="comman-flex">05</span></a></li> --}}
                                    <li class="{{ Route::is('clinic.trash') ? 'active' : '' }}"><a  href="{{ route('clinic.trash') }}"><img src="{{ asset('assets/img/icons/trash.svg') }}"
                                                class="me-2" alt="img">Trash <span class="comman-flex">{{$counttrash}}</span></a>
                                    </li>
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
                                        <input type="checkbox" class="form-check-input">
                                    </div>
                                </div>

                                <div class="top-liv-search top-chat-search top-action-search">
                                    <form>
                                        <div class="chat-search mb-0">
                                            <div class="input-block me-2 mb-0">
                                                <input type="text" class="form-control" placeholder="Search here">
                                                <a class="btn"><img
                                                        src="{{ asset('assets/img/icons/search-normal.svg') }}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="top-action-right">
                                <ul class="nav">
                                    <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/refresh-icon.svg') }}"
                                                alt="img"></a></li>
                                    <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/inbox.svg') }}"
                                                alt="img"></a></li>
                                    <li><a href="javascript:;"><img src="{{ asset('assets/img/icons/trash.svg') }}"
                                                alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="email-content">
                        <div class="table-responsive">
                            <table class="table table-inbox table-hover">
                                <tbody>
                                    @forelse ($trashemail as $item)
                                        <tr class="unread clickable-row" data-href="mail-view.html">
                                            <td>
                                                <div class="top-check">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="name">
                                                <div class="email-img-blk">
                                                    <div class="email-img">
                                                        <!-- You can dynamically display the avatar if needed -->
                                                        <img 
                                                        src="{{ 
                                                            $item->userRole == 2 ? asset('upload/img/doctor/' . $item->userprofile) : 
                                                            ($item->userRole == 3 ? asset('upload/img/patient/' . $item->userprofile) : 
                                                            asset('assets/img/user.jpg'))
                                                        }}"
                                                        alt="img">
                                                    </div>
                                                    <div class="send-user">
                                                        <?php
                                                        $roles = [
                                                            2 => 'Doctor',
                                                            3 => 'Patient',
                                                        ];
                                                        
                                                        ?>
                                                        <!-- Display doctor name and patient name dynamically -->
                                                        <h4>{{ $item->username }} <span
                                                                class="email-market">{{ $roles[$item->userRole] }}</span>
                                                        </h4>

                                                        <p>{!! $item->message !!}</p>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->useremail }}</td>

                                            <td class="mail-date">
                                                {{ $item->created_at }}
                                            </td>

                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <form action="{{ url('admin/trashemail/delete/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div id="delete_patient" class="modal fade delete-modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('assets/img/sent.png') }}" alt=""
                                                                width="50" height="46">
                                                            <h3>Are you sure want to delete this ?</h3>
                                                            <div class="m-t-20"> <a href="#" class="btn btn-white"
                                                                    data-bs-dismiss="modal">Close</a>
                                                                <button class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    @empty
                                    <tr>
                                        <td>
                                            Email Data Not Found
                                        </td>
                                    </tr>
                                    @endforelse

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

        <script>
            function showTime() {
                const now = new Date(); // Current date and time fetch kare
                const timeString = now.toLocaleTimeString(); // Local time format
                document.getElementById('clock').textContent = timeString;
            }
        
            setInterval(showTime, 1000); // Update every second
            showTime(); // Immediate initialization
        </script>
        

@endsection
