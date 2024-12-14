@extends('admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="payments.html">Accounts </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Payments </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">

                    <div class="card card-table show-entire">
                        <div class="card-body">

                            <!-- Table Header -->
                            <div class="page-table-header mb-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="doctor-table-blk">
                                            <h3>Payment List</h3>
                                            <div class="doctor-search-blk">
                                                <div class="top-nav-search table-search-blk">
                                                    <form>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here">
                                                        <a class="btn"><img
                                                                src="{{ asset('assets/img/icons/search-normal.svg') }}"
                                                                alt=""></a>
                                                    </form>
                                                </div>
                                                <div class="add-group">
                                                    <a href="{{ route('admin.payment.create') }}"
                                                        class="btn btn-primary add-pluss ms-2"><img
                                                            src="{{ asset('assets/img/icons/plus.svg') }}"
                                                            alt=""></a>
                                                    <a href="{{ route('admin.payment') }}"
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
                            <div class="staff-search-table">
                                <form>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="input-block local-forms cal-icon">
                                                <label>From </label>
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="input-block local-forms cal-icon">
                                                <label>To </label>
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4 ">
                                            <div class="input-block local-forms">
                                                <label>Payment Status </label>
                                                <select class="form-control select">
                                                    <option>Select Payment Status</option>
                                                    <option>Paid</option>
                                                    <option>Un Paid</option>
                                                    <option>Patially Paid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4 ms-auto">
                                            <div class="doctor-submit">
                                                <button type="submit"
                                                    class="btn btn-primary submit-list-form me-2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table border-0 custom-table comman-table datatable mb-0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>Invoice Number</th>
                                            <th>Patient</th>
                                            <th>Payment Type</th>
                                            <th>Paid Date</th>
                                            <th>Paid Amount</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($Payments as $item)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td><a href="#">{{ $item->payment_number }}</a></td>
                                                <td class="profile-image"><a href="#"><img width="28"
                                                            height="28"
                                                            src="{{  $item->patient_image->getImage()}}"
                                                            class="rounded-circle m-r-5" alt=""> {{  $item->patient_name . ' ' . $item->patient_lastname}}</a>
                                                </td>
                                                <td>{{ $item->payment_method }}</td>
                                                <td>{{ $item->payment_date }}</td>
                                                <td>{{ $item->total_amount }}</td>
                                                <td>{{ $item->discount }}</td>
                                                <td>
                                                    <button
                                                        class="custom-badge 
                                                {{ $item->payment_status == 'paid' ? 'status-green' : '' }} 
                                                {{ $item->payment_status == 'unpaid' ? 'status-red' : '' }} 
                                                {{ $item->payment_status == 'partially_paid' ? 'status-pink' : '' }}">
                                                        {{ $item->payment_status }}
                                                    </button>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="edit-payment.html"><i
                                                                    class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#delete_patient"><i
                                                                    class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td><a href="invoice-view.html">#INV-0001</a></td>
                                            <td class="profile-image"><a href="profile.html"><img width="28"
                                                        height="28"
                                                        src="{{ asset('assets/img/profiles/avatar-02.jpg') }}"
                                                        class="rounded-circle m-r-5" alt=""> Smith Bruklin</a>
                                            </td>
                                            <td>Debit Card</td>
                                            <td>02.10.2022</td>
                                            <td>$1505</td>
                                            <td><button class="custom-badge status-pink ">Un Paid</button></td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="edit-payment.html"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td><a href="invoice-view.html">#INV-0002</a></td>
                                            <td class="profile-image"><a href="profile.html"><img width="28"
                                                        height="28"
                                                        src="{{ asset('assets/img/profiles/avatar-03.jpg') }}"
                                                        class="rounded-circle m-r-5" alt=""> Bernardo James</a>
                                            </td>
                                            <td>Pay Pal</td>
                                            <td>01.10.2022</td>
                                            <td>$2000</td>
                                            <td><button class="custom-badge status-green ">Paid</button></td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="edit-payment.html"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td><a href="invoice-view.html">#INV-0003</a></td>
                                            <td class="profile-image"><a href="profile.html"><img width="28"
                                                        height="28"
                                                        src="{{ asset('assets/img/profiles/avatar-04.jpg') }}"
                                                        class="rounded-circle m-r-5" alt=""> Mark Hay Smith</a>
                                            </td>
                                            <td>Credit Card</td>
                                            <td>05.10.2022</td>
                                            <td>$1000</td>
                                            <td><button class="custom-badge status-orange ">Patially Paid</button></td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="edit-payment.html"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td><a href="invoice-view.html">#INV-0004</a></td>
                                            <td class="profile-image"><a href="profile.html"><img width="28"
                                                        height="28"
                                                        src="{{ asset('assets/img/profiles/avatar-05.jpg') }}"
                                                        class="rounded-circle m-r-5" alt=""> Galaviz Lalema</a>
                                            </td>
                                            <td>Debit Card</td>
                                            <td>01.10.2022</td>
                                            <td>$2300</td>
                                            <td><button class="custom-badge status-green ">Paid</button></td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="edit-payment.html"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td><a href="invoice-view.html">#INV-0003</a></td>
                                            <td class="profile-image"><a href="profile.html"><img width="28"
                                                        height="28"
                                                        src="{{ asset('assets/img/profiles/avatar-06.jpg') }}"
                                                        class="rounded-circle m-r-5" alt=""> Andrea Lalema</a>
                                            </td>
                                            <td>Pay Pal</td>
                                            <td>05.10.2022</td>
                                            <td>$4000</td>
                                            <td><button class="custom-badge status-orange ">Patially Paid</button></td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="edit-payment.html"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td><a href="invoice-view.html">#INV-0005</a></td>
                                            <td class="profile-image"><a href="profile.html"><img width="28"
                                                        height="28"
                                                        src="{{ asset('assets/img/profiles/avatar-07.jpg') }}"
                                                        class="rounded-circle m-r-5" alt=""> William Stephin</a>
                                            </td>
                                            <td>Pay Pal</td>
                                            <td>10.10.2022</td>
                                            <td>$3000</td>
                                            <td><button class="custom-badge status-pink ">Un Paid</button></td>
                                            <td class="text-end">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="edit-payment.html"><i
                                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#delete_patient"><i
                                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
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
