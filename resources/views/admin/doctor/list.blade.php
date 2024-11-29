@extends('admin.admin_dashboard_step')
@section('content')
<div class="page-wrapper">
    <div class="content">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="doctors.html">Doctors </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Doctors List</li>
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
                                        <h3>Doctors List</h3>
                                        <div class="doctor-search-blk">
                                            <div class="top-nav-search table-search-blk">
                                                <form>
                                                    <input type="text" class="form-control" placeholder="Search here">
                                                    <a class="btn"><img src="{{asset('assets/img/icons/search-normal.svg')}}" alt=""></a>
                                                </form>
                                            </div>
                                            <div class="add-group">
                                                <a href="{{route('admin.doctor.create')}}" class="btn btn-primary add-pluss ms-2"><img src="{{asset('assets/img/icons/plus.svg')}}" alt=""></a>
                                                <a href="javascript:;" class="btn btn-primary doctor-refresh ms-2"><img src="{{asset('assets/img/icons/re-fresh.svg')}}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="javascript:;" class=" me-2"><img src="{{asset('assets/img/icons/pdf-icon-01.svg')}}" alt=""></a>
                                    <a href="javascript:;" class=" me-2"><img src="{{asset('assets/img/icons/pdf-icon-02.svg')}}" alt=""></a>
                                    <a href="javascript:;" class=" me-2"><img src="{{asset('assets/img/icons/pdf-icon-03.svg')}}" alt=""></a>
                                    <a href="javascript:;" ><img src="{{asset('assets/img/icons/pdf-icon-04.svg')}}" alt=""></a>
                                    
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
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Specialization</th>
                                        <th>Degree</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th >Joining Date</th>
                                        <th ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-01.jpg')}}" class="rounded-circle m-r-5" alt=""> Andrea Lalema</a></td>
                                        <td>Otolaryngology</td>
                                        <td>Infertility</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c29342d213c20290c29212d2520622f2321">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-02.jpg')}}" class="rounded-circle m-r-5" alt=""> Dr.Smith Bruklin</a></td>
                                        <td>Urology</td>
                                        <td>Prostate</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a4c1dcc5c9d4c8c1e4c1c9c5cdc88ac7cbc9">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-03.jpg')}}" class="rounded-circle m-r-5" alt=""> Dr.William Stephin</a></td>
                                        <td>Radiology</td>
                                        <td>Cancer</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="24415c4549544841644149454d480a474b49">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-04.jpg')}}" class="rounded-circle m-r-5" alt=""> Bernardo James</a></td>
                                        <td>Dentist</td>
                                        <td>Prostate</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="56332e373b263a3316333b373f3a7835393b">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-06.jpg')}}" class="rounded-circle m-r-5" alt="">Cristina Groves</a></td>
                                        <td>Gynocolgy</td>
                                        <td>Prostate</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="107568717d607c7550757d71797c3e737f7d">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-05.jpg')}}" class="rounded-circle m-r-5" alt=""> Mark Hay Smith</a></td>
                                        <td>Gynocolgy</td>
                                        <td>Prostate</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bedbc6dfd3ced2dbfedbd3dfd7d290ddd1d3">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-01.jpg')}}" class="rounded-circle m-r-5" alt=""> Andrea Lalema</a></td>
                                        <td>Otolaryngology</td>
                                        <td>Infertility</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="77120f161a071b1237121a161e1b5914181a">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
                                        <td class="profile-image"><a href="profile.html"><img width="28" height="28" src="{{asset('assets/img/profiles/avatar-02.jpg')}}" class="rounded-circle m-r-5" alt=""> Dr.Smith Bruklin</a></td>
                                        <td>Urology</td>
                                        <td>Prostate</td>
                                        <td>MBBS, MS</td>
                                        <td><a href="javascript:;">+1 23 456890</a></td>
                                        <td><a href="https://preclinic.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="086d70696578646d486d65696164266b6765">[email&#160;protected]</a></td>
                                        <td>01.10.2022</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient"><i class="fa fa-trash-alt m-r-5"></i> Delete</a>
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
<div id="delete_patient" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{asset('assets/img/sent.png')}}" alt="" width="50" height="46">
                <h3>Are you sure want to delete this ?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection