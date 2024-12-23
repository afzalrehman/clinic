@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('clinic.appoinment') }}">Appointment </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Appointment List</li>
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
                                            <h3>Appointment</h3>
                                            <div class="doctor-search-blk">
                                                <div class="top-nav-search table-search-blk">
                                                    <form action="" method="get">
                                                        <input type="text" class="form-control" placeholder="Search here" name="search" value="{{request('search')}}">
                                                        <a class="btn"><img src="{{asset('assets/img/icons/search-normal.svg')}}" alt=""></a>
                                                    </form>
                                                </div>
                                                <div class="add-group">
                                                    <a href="{{ route('clinic.appoinment.create') }}"
                                                        class="btn btn-primary add-pluss ms-2"><img
                                                            src="{{ asset('assets/img/icons/plus.svg') }}"
                                                            alt=""></a>
                                                    <a href="{{ route('clinic.appoinment') }}" class="btn btn-primary doctor-refresh ms-2"><img
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
                                            <th>Consulting Doctor</th>
                                            <th>Department</th>
                                            <th>Treatment</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                         
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($appoinment_list as $value)
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
                                                            <a class="dropdown-item" href="{{url('clinic/appoinment/edit/'.$value->id)}}"><i
                                                                    class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                                data-bs-target="#delete_patient{{$value->id}}"><i
                                                                    class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="profile-image"><a href="{{url('/clinic/patient?search='. $value->patient_name )}}"><img width="28"
                                                            height="28"
                                                            src="{{ $value->patient_image ? asset('upload/img/patient/'.$value->patient_image) : asset('asset/img/user.jpg') }}"
                                                            class="rounded-circle m-r-5" alt=""> {{$value->patient_name}} </a>
                                                </td>
                                                <td><a href="{{url('/clinic/doctor?search='. $value->doctor_name)}}">{{$value->doctor_name}}</a></td>
                                                <td>{{$value->department_name}}</td>
                                                <td>{{$value->treatment}}</td>
                                                <td><a href="tail:{{$value->patient_mobile}}">{{$value->patient_mobile}}</a></td>
                                                <td><a href="mailto:{{$value->patient_email}}" >{{$value->patient_email}}</a>
                                                </td>
                                                <td>{{$value->appointment_date}}</td>
                                                <td>
                                                    <select id="{{ $value->id }}" name="status"
                                                        class="custom-badge status-green changeStatus"
                                                        style="border: none; outline: none;"
                                                        onchange="updateStatusClass(this)">
                                                        <option value="Upcoming" class="status-pink"
                                                            {{ $value->status == 'Upcoming' ? 'selected' : '' }}>
                                                            Upcoming
                                                        </option>
                                                        <option value="Completed" class="status-green"
                                                            {{ $value->status == 'Completed' ? 'selected' : '' }}>
                                                            Completed
                                                        </option>
                                                        <option value="Cancelled" class="status-red"
                                                            {{ $value->status == 'Cancelled' ? 'selected' : '' }}>
                                                            Cancelled
                                                        </option>
                                                    </select>
                                                </td>
                                                
                                            </tr>
                                            <div id="delete_patient{{$value->id}}" class="modal fade delete-modal" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('assets/img/sent.png') }}" alt="" width="50" height="46">
                                                            <h3>Are you sure want to delete this ?</h3>
                                                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                                                                <a href="{{url('clinic/appoinment/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                        @empty
                                        <tr>
                                            <td colspan="100">Appointment Not Found</td>
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

@section('script')
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript">
        // Handle status change event with AJAX
        $('.changeStatus').change(function() {
            var status_id = $(this).val();
            var appoinment_id = $(this).attr('id');

            $.ajax({
                type: "GET",
                url: "{{ url('clinic/appoinment/ChangeStatus/') }}",
                data: {
                    status_id: status_id,
                    appoinment_id: appoinment_id
                },
                dataType: 'json',
                success: function(response) {
                        // location.reload(); 
                    // Display success message
                    if (response.success) {
                    $('#successMessage').html(`
                        <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show">
                            <div class="text-white">${response.success}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    }
                    else {
        $('#successMessage').html(`
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                <div class="text-white">${response.message}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `);
    }
                }
            });
        });

        // Function to update the status class based on the selected option
        function updateStatusClass(selectElement) {
            // Remove all status classes
            selectElement.classList.remove('status-green', 'status-red', 'status-pink');

            // Add the class based on the selected value
            if (selectElement.value === 'Upcoming') {
                selectElement.classList.add('status-pink');
            } else if (selectElement.value === 'Completed') {
                selectElement.classList.add('status-green');
            } else if (selectElement.value === 'Cancelled') {
                selectElement.classList.add('status-red');
            }
        }

        // Automatically set the class on page load for all select elements
        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.changeStatus');
            selectElements.forEach(function(selectElement) {
                updateStatusClass(selectElement); // Apply the status class for each select element
            });
        });
    </script>
@endsection
