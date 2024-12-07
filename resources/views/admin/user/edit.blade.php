@extends('admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">User </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Update User</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Update User</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>ID Number <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" id="user_id" name="user_id">
                                                <option value="">Select ID Number</option>

                                                <optgroup label="Patients">
                                                    @foreach ($patients as $patient)
                                                        <option
                                                            value="{{ $patient->cnic }}"{{ old('user_id' , $user->user_id) == $patient->id ? 'selected' : '' }}>
                                                            {{ $patient->cnic }}</option>
                                                    @endforeach
                                                </optgroup>

                                                <optgroup label="Doctors">
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->cnic }}"
                                                            {{ old('user_id', $user->user_id) == $doctor->cnic ? 'selected' : '' }}>
                                                            {{ $doctor->cnic }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            @error('user_id')
                                                <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>FullName<span class="login-danger">*</span></label>
                                            <input class="form-control" name="name" readonly type="text" id="fullname"
                                                value="{{ old('name', $user->name) }}" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Last Name <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly name="lastname" type="text" id="lastname"
                                                value="{{ old('lastname') }}" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('lastname') }}</span>
                                        </div>
                                    </div> --}}
                                    

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly name="mobile" id="mobile" type="text"
                                                value="{{ old('mobile', $user->mobile) }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('mobile') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly name="email" id="email" type="email"
                                                value="{{ old('email', $user->email) }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <textarea class="form-control" readonly name="address" id="address" rows="3" cols="30">{{ old('address', $user->address) }}</textarea>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('address') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>UserName <span class="login-danger">*</span></label>
                                            <input class="form-control" name="username" type="text" id="username"
                                                value="{{ old('username', $user->username) }}" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Postion <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="postion">
                                                <option value="">Select Postion</option>
                                                @foreach ($roles as $item)
                                                    <option {{ old('postion' , $user->role) == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('postion') }}</span>
                                        </div>
                                    </div>

                                   

                                    {{-- <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-top-form">
                                            <label class="local-top">Profile <span class="login-danger">*</span></label>
                                            <div class="settings-btn upload-files-avator">
                                                <input type="file" accept="image/*" name="image" id="file"
                                                    onchange="if (!window.__cfRLUnblockHandlers) return false; loadFile(event)"
                                                    class="hide-input" data-cf-modified-f8f4d162ec031ee40ac358fc-="">
                                                <label for="file" class="upload">Choose File</label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Status <span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input">Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="status" class="form-check-input">In
                                                    Active
                                                </label>
                                            </div>
                                            <span style="color: red; font-size: 13px">{{$errors->first('status')}}</span>
                                        </div>
                                    </div> --}}



                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit" class="btn btn-primary submit-form me-2">Update</button>
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

    </div>
@endsection
@section('script')
    <!-- jQuery -->

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#user_id').change(function() {
                let user_id = $(this).val();

                if (user_id) {
                    $.ajax({
                        url: '/admin/get-user-details/' + user_id,
                        type: 'GET',
                        success: function(data) {
                            if (data) {

                                // $('#name').val(data.name);
                                // $('#lastname').val(data.lastname);
                                $('#mobile').val(data.mobile);
                                $('#email').val(data.email);
                                $('#address').val(data.address);
                                let fullname = data.name + ' ' + data.lastname;
                                $('#fullname').val(fullname);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    // Clear fields if no patient is selected
                    // $('#name').val('');
                    // $('#lastname').val('');
                    $('#fullname').val('');
                    $('#mobile').val('');
                    $('#email').val('');
                    $('#address').val('');
                }
            });
        });
    </script>


    <!-- Fileupload JS -->
    <script src="{{asset('assets/plugins/select2/js/select2.min.js') }}" type="5650539c0f26ab12eb5493c5-text/javascript"></script>
    <script src="{{asset('assets/plugins/select2/js/custom-select.js') }}" type="5650539c0f26ab12eb5493c5-text/javascript"></script>
    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="5650539c0f26ab12eb5493c5-|49" defer></script>
@endsection
