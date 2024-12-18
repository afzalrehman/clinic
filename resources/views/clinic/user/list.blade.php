@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="user.html">User </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">User List</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    @include('_message')
                    <div class="card card-table show-entire">
                        <div class="card-body">

                            <!-- Table Header -->
                            <div class="page-table-header mb-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="doctor-table-blk">
                                            <h3>User List</h3>
                                            <div class="doctor-search-blk">
                                                <div class="top-nav-search table-search-blk">
                                                    <form action="" method="GET">
                                                        <input type="text" class="form-control" name="search"
                                                            value="{{ request('search') }}" placeholder="Search here">


                                                        <a class="btn"><img
                                                                src="{{ asset('assets/img/icons/search-normal.svg') }}"
                                                                alt=""></a>
                                                    </form>
                                                </div>
                                                <div class="add-group">
                                                    <a href="{{ route('admin.user.create') }}"
                                                        class="btn btn-primary add-pluss ms-2"><img
                                                            src="{{ asset('assets/img/icons/plus.svg') }}"
                                                            alt=""></a>
                                                    <a href="{{ route('admin.user') }}"
                                                        class="btn btn-primary doctor-refresh ms-2"><img
                                                            src="{{ asset('assets/img/icons/re-fresh.svg') }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="javascript:;" class=" me-2"><img
                                                src="{{ asset('assets/img/icons/pdf-icon-01.svg') }}" alt=""></a>
                                        <a href="javascript:;" class=" me-2"><img
                                                src="{{ asset('assets/img/icons/pdf-icon-02.svg') }}" alt=""></a>
                                        <a href="javascript:;" class=" me-2"><img
                                                src="{{ asset('assets/img/icons/pdf-icon-03.svg') }}" alt=""></a>
                                        <a href="javascript:;"><img src="{{ asset('assets/img/icons/pdf-icon-04.svg') }}"
                                                alt=""></a>

                                    </div>
                                </div>
                            </div>
                            <!-- /Table Header -->

                            <div class="table-responsive">
                                <table class="table border-0 custom-table comman-table datatable mb-0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Postion</th>
                                            <th>Verify</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/user/edit/' . $item->id) }}"><i
                                                                    class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#delete_patient"><i
                                                                    class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="profile-image"><a href="profile.html"><img width="28"
                                                            height="28"
                                                            src="{{ $item->profile ? $item->getImage() : asset('assets/img/user.jpg') }}"
                                                            class="rounded-circle m-r-5" alt="">
                                                        {{ $item->name }} </a>

                                                </td>

                                                <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                                                <td><a href="mail:{{ $item->email }}" class="__cf_email__"
                                                        data-cfemail="dabfa2bbb7aab6bf9abfb7bbb3b6f4b9b5b7">{{ $item->email }}</a>
                                                </td>
                                                @php
                                                    // Define role mapping
                                                    $roles = [
                                                        0 => 'super-admin',
                                                        1 => 'admin',
                                                        2 => 'doctor',
                                                        3 => 'patient',
                                                    ];

                                                    $role_color = [
                                                        0 => 'status-green',
                                                        1 => 'status-pink',
                                                        2 => 'status-gray',
                                                        3 => 'status-orange',
                                                    ];
                                                @endphp
                                                <td><button
                                                        class="custom-badge {{ $role_color[$item->role] ?? 'status-red' }} ">{{ $roles[$item->role] ?? 'Unknown Role' }}</button>
                                                </td>


                                                <td><button
                                                        class="custom-badge {{ $item->status == 'active' ? 'status-green' : 'status-pink' }}  ">{{ $item->status }}</button>
                                                </td>

                                               
                                            </tr>

                                            <div id="delete_patient" class="modal fade delete-modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('assets/img/sent.png') }}" alt=""
                                                                width="50" height="46">
                                                            <h3>Are you sure want to delete this ?</h3>
                                                            <div class="m-t-20"> <a href="#" class="btn btn-white"
                                                                    data-bs-dismiss="modal">Close</a>
                                                                <a href="{{ url('admin/user/delete/' . $item->id) }}"
                                                                    class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @empty
                                            <tr>
                                                <td>Data not Found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
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
