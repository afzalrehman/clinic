@extends('clinic.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('clinic.user') }}">User </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('clinic.user.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>User Form</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>ID Number <span class="login-danger">*</span></label>
                                            <select class="form-control form-small" id="user_id" name="user_id">
                                                <option value="">Select ID Number</option>

                                                <optgroup label="Patients">
                                                    @foreach ($patients as $patient)
                                                        <option
                                                            value="{{ $patient->mobile }}"{{ old('user_id') == $patient->mobile ? 'selected' : '' }}>
                                                            {{ $patient->mobile }}</option>
                                                    @endforeach
                                                </optgroup>

                                                <optgroup label="Doctors">
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->mobile }}"
                                                            {{ old('user_id') == $doctor->mobile ? 'selected' : '' }}>
                                                            {{ $doctor->mobile }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            @error('user_id')
                                                <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Name<span class="login-danger">*</span></label>
                                            <input class="form-control" name="name" readonly type="text"
                                                id="name" value="{{ old('name') }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly name="mobile" id="mobile"
                                                type="text" value="{{ old('mobile') }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('mobile') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly name="email" id="email"
                                                type="email" value="{{ old('email') }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>UserName <span class="login-danger">*</span></label>
                                            <input class="form-control" readonly name="username" id="mobile"
                                                type="text" value="{{ old('username') }}" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Postion <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="postion">
                                                <option value="">Select Postion</option>
                                                @foreach ($roles as $item)
                                                    <option {{ old('postion') == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('postion') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" placeholder="Please Enter Password"
                                                name="password" type="password">
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Confirm Password <span class="login-danger">*</span></label>
                                            <input class="form-control pass-input" placeholder="Please Enter Password"
                                                name="password" type="password">
                                            <span class="profile-views feather-eye-off toggle-password"></span>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('password_confirmation') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="doctor-submit text-end">
                                            <button type="submit"
                                                class="btn btn-primary submit-form me-2">Submit</button>
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
                        url: '/clinic/get-user-details/' + user_id,
                        type: 'GET',
                        success: function(data) {
                            if (data) {

                                $('#name').val(data.name);
                                $('#mobile').val(data.mobile);
                                $('#email').val(data.email);

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    $('#name').val('');
                    $('#mobile').val('');
                    $('#email').val('');

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
