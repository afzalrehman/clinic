<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('clinic') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-01.svg') }}" alt=""></span>
                        <span>Dashboard</span></a>
                </li>

                <li>
                    <a href="{{ route('clinic.doctor') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt=""></span>
                        <span>Doctors</span></a>
                </li>
                <li>
                    <a href="{{ route('clinic.patient') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-03.svg') }}" alt=""></span>
                        <span>Patients</span></a>
                </li>

                <li>
                    <a href="{{ route('clinic.appoinment') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-04.svg') }}" alt=""></span>
                        <span>Appointments</span></a>
                </li>

                <li>
                    <a href="{{ route('clinic.doctor_schedule') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-05.svg') }}" alt=""></span>
                        <span>Doctor Schedule</span></a>
                </li>


                <li class="submenu">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-12.svg') }}" alt=""></span> <span>
                            Email</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('clinic.compose') }}">Compose Mail</a></li>
                        <li><a href="{{ route('clinic.inbox') }}">Inbox</a></li>
                        {{-- <li><a href="{{route('admin.mail_view')}}">Mail View</a></li> --}}
                    </ul>
                </li>

                <li>
                    <a href="{{ route('clinic.department') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-06.svg') }}" alt=""></span>
                        <span>Departments</span></a>
                </li>
                <li>
                    <a href="{{ route('clinic.payment') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-07.svg') }}" alt=""></span>
                        <span>Payments</span></a>
                </li>




                {{-- <li class="submenu">
                    <a href="#"><i class="fa fa-flag"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li> --}}


                <li>
                    <a href="{{ route('clinic.user') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-16.svg') }}" alt=""></span>
                        <span>User</span></a>
                </li>
                <li>
                    <a href="{{route('clinic.setting')}}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-16.svg') }}" alt=""></span>
                        <span>Settings</span></a>
                </li>

            </ul>
            <div class="logout-btn">
                <a href="{{route('logout')}}"><span class="menu-side"><img src="{{ asset('assets/img/icons/logout.svg') }}"
                            alt=""></span> <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>
