<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('doctor') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-01.svg') }}" alt=""></span>
                        <span>Dashboard</span></a>
                </li>

                <li class="@if (Request::segment(2) == 'doctor' ? 'active bg-light' : '' )@endif">
                    <a href="{{ route('doctor.doctor') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-02.svg') }}" alt=""></span>
                        <span>Doctors</span></a>
                </li>
                <li>
                    <a href="{{ route('doctor.patient') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-03.svg') }}" alt=""></span>
                        <span>Patients</span></a>
                </li>

               
                <li>
                    <a href="{{ route('doctor.appoinment') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-04.svg') }}" alt=""></span>
                        <span>Appointments</span></a>
                </li>

        
                <li>
                    <a href="{{ route('doctor.department') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-06.svg') }}" alt=""></span>
                        <span>Departments</span></a>
                </li>

                {{-- <li class="submenu">
                    <a href="#"><i class="fa fa-flag"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-15.svg') }}" alt=""></span> <span>
                            Invoice </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoices-list.html"> Invoices List </a></li>
                        <li><a href="invoices-grid.html"> Invoices Grid</a></li>
                        <li><a href="add-invoice.html"> Add Invoices</a></li>
                        <li><a href="edit-invoices.html"> Edit Invoices</a></li>
                        <li><a href="view-invoice.html"> Invoices Details</a></li>
                        <li><a href="invoices-settings.html"> Invoices Settings</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="settings.html"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-16.svg') }}" alt=""></span>
                        <span>Settings</span></a>
                </li> --}}
            </ul>
            <div class="logout-btn">
                <a href="login.html"><span class="menu-side"><img src="{{ asset('assets/img/icons/logout.svg') }}"alt=""></span> <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>
