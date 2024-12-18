@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="schedule.html">Doctor Shedule </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Add Schedule</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.doctor_schedule.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Add Schedule</h4>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Doctor Name <span class="login-danger">*</span></label>
                                            <select name="doctor_id" class=" form-control form-small">
                                                <option value="">Choose...</option>
                                                @foreach ($doctor as $item)
                                                    <option value="{{ $item->cnic }}"
                                                        {{ old('doctor_id') == $item->cnic ? 'selected' : '' }}>
                                                        {{ $item->name . ' ' . $item->lastname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('doctor_id')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Department <span class="login-danger">*</span></label>
                                            <select name="department_id" class=" form-control form-small">
                                                <option value="">Choose...</option>
                                                @foreach ($department as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('department_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms cal-icon">
                                            <label>Available Days <span class="login-danger">*</span></label>
                                            <select class="form-control tagging select2" multiple="multiple"
                                                name="available_days[]">
                                                <option value="Monday"
                                                    {{ in_array('Monday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Monday</option>
                                                <option value="Tuesday"
                                                    {{ in_array('Tuesday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Tuesday</option>
                                                <option value="Wednesday"
                                                    {{ in_array('Wednesday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Wednesday</option>
                                                <option value="Thursday"
                                                    {{ in_array('Thursday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Thursday</option>
                                                <option value="Friday"
                                                    {{ in_array('Friday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Friday</option>
                                                <option value="Saturday"
                                                    {{ in_array('Saturday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Saturday</option>
                                                <option value="Sunday"
                                                    {{ in_array('Sunday', old('available_days', [])) ? 'selected' : '' }}>
                                                    Sunday</option>
                                            </select>
                                            @error('available_days')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>From <span class="login-danger">*</span></label>
                                            <div class="time-icon">
                                                <input name="from" type="text" class="form-control"
                                                    id="datetimepicker3" value="{{ old('from') }}">
                                            </div>
                                            @error('from')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>To <span class="login-danger">*</span></label>
                                            <div class="time-icon">
                                                <input name="to" type="text" class="form-control"
                                                    id="datetimepicker4" value="{{ old('to') }}">
                                            </div>
                                            @error('to')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Notes <span class="login-danger">*</span></label>
                                            <textarea name="notes" class="form-control" rows="3" cols="30">{{ old('notes') }}</textarea>
                                            @error('notes')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-xl-12">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Status <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input"
                                                        value="Active"
                                                        {{ old('status') == 'Active' ? 'checked' : '' }}>Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input"
                                                        value="In Active"
                                                        {{ old('status') == 'In Active' ? 'checked' : '' }}>In Active
                                                </label>
                                            </div>
                                            @error('status')
                                                <span class=""
                                                    style="color: red; font-size:13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit" class="btn btn-primary submit-form me-2">Create
                                                Schedule</button>
                                            <button type="reset" class="btn btn-primary cancel-form">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
    <div id="delete_patient" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this ?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
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
@endsection
