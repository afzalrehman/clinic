@extends('super_admin.admin_dashboard_step')
@section('link')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs5.min.css') }}">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    @include('_message')
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
                                    <img src="{{ Auth::user()->AdminGetImage() }}" alt="img">
                                </div>
                                <div class="chat-users user-main">
                                    <div class="user-titles user-head-compse">
                                        <h5> {{ Auth::user()->username }}</h5>
                                        <div class="chat-user-time">
                                            <p id="clock"></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="compose-mail">
                                <a href="{{ route('superadmin.compose') }}" class="btn btn-primary"><img
                                        src="{{ asset('assets/img/icons/edit-2.svg') }}" class="me-2"
                                        alt="img">Compose Mail</a>
                            </div>
                            <div class="email-menu-blk">
                                <ul>
                                    <li class="{{ Route::is('superadmin.inbox') ? 'active' : '' }}"><a
                                            href="{{ route('superadmin.inbox') }}"><img
                                                src="{{ asset('assets/img/icons/inbox.svg') }}" class="me-2"
                                                alt="img">Inbox<span class="comman-flex">{{ $countinbox }}</span></a>
                                    </li>
                                    {{-- <li><a href="javascript:;"><img src="{{asset('assets/img/icons/star.svg" class="me-2" alt="img">Starred <span class="comman-flex">05</span></a></li> --}}
                                    <li class="{{ Route::is('superadmin.trash') ? 'active' : '' }}"><a
                                            href="{{ route('superadmin.trash') }}"><img
                                                src="{{ asset('assets/img/icons/trash.svg') }}" class="me-2"
                                                alt="img">Trash <span
                                                class="comman-flex">{{ $counttrash }}</span></a>
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
                <div class="col-xl-8">
                    <div class="card chat-box mb-2">
                        <div class="compose-mail">
                            <h3>Compose New Mail</h3>
                        </div>
                        <form action="{{ route('superadmin.mail.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf <!-- CSRF Token -->
                            <div class="row">
                                <!-- To Field -->
                                <div class="col-lg-12">
                                    <div class="input-block local-forms">
                                        <label for="to">To</label>
                                        <select id="to" name="to" class="form-small form-control tagging">
                                            <optgroup label="Patient">
                                                @foreach ($users_patient as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('to') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->username }} - {{ $item->email }}
                        
                                                    </option>
                                                    <input type="hidden" hidden name="role"
                                                    value="{{ $admin->role }}">
                                                @endforeach
                                            </optgroup>
                                            
                                            <optgroup label="Patient">
                                                @foreach ($users_patient as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('to') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->username }} - {{ $item->email }}
                        
                                                    </option>
                                                    <input type="hidden" hidden name="role"
                                                    value="{{ $admin->role }}">
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Doctor">
                                                @foreach ($users_doctor as $doctor)
                                                    <option value="{{ $doctor->id }}"
                                                        {{ old('to') == $doctor->id ? 'selected' : '' }}>
                                                        {{ $doctor->username }} - {{ $doctor->email }}
                                                       

                                                    </option>
                                                    <input type="hidden" hidden name="role"
                                                    value="{{ $admin->role }}">
                                                @endforeach
                                            </optgroup>
                                        </select>

                                        @if ($errors->has('to'))
                                            <span class="text-danger">{{ $errors->first('to') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- CC Field -->
                                {{-- <div class="col-lg-12">
                                    <div class="input-block local-forms">
                                        <label for="cc">CC</label>
                                        <input id="cc" type="text" name="cc" class="form-control"
                                            value="{{ old('cc') }}">
                                        @if ($errors->has('cc'))
                                            <span class="text-danger">{{ $errors->first('cc') }}</span>
                                        @endif
                                    </div>
                                </div> --}}

                                <!-- Subject Field -->
                                <div class="col-lg-12">
                                    <div class="input-block local-forms">
                                        <label for="subject">Subject</label>
                                        <input id="subject" type="text" name="subject" class="form-control"
                                            value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Message Field -->
                                <div class="col-lg-12">
                                    <div class="input-block summer-mail">
                                        <label for="message">Message</label>
                                        <textarea id="message" rows="4" cols="5" name="message" class="form-control "
                                            placeholder="Enter your message here">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Attachments Field -->
                                {{-- <div class="col-12 col-md-6 col-xl-12">
                                    <div class="input-block local-top-form">
                                        <label for="attachment" class="local-top">Attachments</label>
                                        <div class="settings-btn upload-files-avator">
                                            <input type="file" accept="image/*,application/pdf" name="attachment"
                                                id="attachment" class="hide-input">
                                            <label for="attachment" class="upload">Choose File</label>
                                            @if ($errors->has('attachment'))
                                                <span class="text-danger">{{ $errors->first('attachment') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Send Button -->
                                <div class="col-lg-12">
                                    <div class="mail-send">
                                        <button type="submit" class="btn btn-primary me-2">Send</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <!-- Select 2 -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js') }}" type="5650539c0f26ab12eb5493c5-text/javascript"></script>
    <script src="{{asset('assets/plugins/select2/js/custom-select.js') }}" type="5650539c0f26ab12eb5493c5-text/javascript"></script>
    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="5650539c0f26ab12eb5493c5-|49" defer></script>
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
