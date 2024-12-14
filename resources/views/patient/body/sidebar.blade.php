<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
        
                <li>
                    <a href="{{route('patient')}}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-01.svg') }}" alt=""></span>
                        <span>Dashboard</span></a>
                </li>
         
              
                <li>
                    <a href="{{ route('patient.appoinment') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-04.svg') }}" alt=""></span>
                        <span>Appointments</span></a>
                </li>
              
                {{-- <li class="submenu">
                    <a href="#"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-12.svg') }}" alt=""></span> <span>
                            Email</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('patinet.compose') }}">Compose Mail</a></li>
                        <li><a href="{{ route('patinet.inbox') }}">Inbox</a></li>
                        {{-- <li><a href="{{route('admin.mail_view')}}">Mail View</a></li> 
                    </ul>
                </li> --}}


                <li>
                    <a href="{{ route('patient.payment') }}"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-07.svg') }}" alt=""></span>
                        <span>Payments</span></a>
                </li>

              
                {{-- <li>
                    <a href="settings.html"><span class="menu-side"><img
                                src="{{ asset('assets/img/icons/menu-icon-16.svg') }}" alt=""></span>
                        <span>Settings</span></a>
                </li> --}}
             
            </ul>
            <div class="logout-btn">
                <a href="login.html"><span class="menu-side"><img src="{{ asset('assets/img/icons/logout.svg') }}"
                            alt=""></span> <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>
