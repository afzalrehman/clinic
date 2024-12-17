@extends('super_admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patients.html">User </a></li>
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
                            <form action="{{ url('super-admin/user/add') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Clinic Details</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Clinic Code<span class="login-danger">*</span></label>
                                            <select class="form-control select"  id="clinicCode" name="clinic_code">
                                                <option value="">Select Clinic Code</option>
                                                @foreach ($clinic as $item)
                                                    <option {{ old('clinic_code') == $item->clinic_code ? 'selected' : '' }}
                                                        value="{{ $item->clinic_code }}">{{ $item->clinic_code }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red; font-size: 13px">{{ $errors->first('postion') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Clinic Name <span class="login-danger">*</span></label>
                                            <input class="form-control" name="clinicName" id="clinicName" type="text" placeholder=""
                                               >
                                            <span style="color: red; font-size: 13px">{{ $errors->first('clinicName') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Clinic Phone <span class="login-danger">*</span></label>
                                            <input class="form-control" name="clinicPhone" id="clinicPhone" type="text" placeholder=""
                                               >
                                            <span style="color: red; font-size: 13px">{{ $errors->first('clinicPhone') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Email <span class="login-danger">*</span></label>
                                            <input class="form-control" name="clinicEmail" id="clinicEmail" type="text" placeholder=""
                                               >
                                            <span style="color: red; font-size: 13px">{{ $errors->first('clinicEmail') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Address <span class="login-danger">*</span></label>
                                            <input class="form-control" name="clinicAddress" id="clinicAddress" type="text" placeholder=""
                                               >
                                            <span style="color: red; font-size: 13px">{{ $errors->first('clinicAddress') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Clinic User Details</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input class="form-control" name="name" type="text" placeholder=""
                                                value="{{ old('name') }}">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Username <span class="login-danger">*</span></label>
                                            <input class="form-control" name="username" value="{{ old('username') }}"
                                                type="text" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" name="mobile" value="{{ old('mobile') }}"
                                                type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('mobile') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" value="{{ old('email') }}"
                                                type="email" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms cal-icon">
                                            <label>Date Of Birth <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" name="date"
                                                value="{{ old('date') }}" type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('date') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Gender<span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"
                                                        value="Mail">Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"
                                                        value="Femail">Female
                                                </label>
                                            </div>
                                            <span style="color: red; font-size: 13px">{{ $errors->first('gender') }}</span>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <textarea class="form-control" name="address" rows="3" cols="30">{{ old('address') }}</textarea>
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('address') }}</span>
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

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Password <span class="login-danger">*</span></label>
                                            <input class="form-control" name="password" type="password" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Confirm Password <span class="login-danger">*</span></label>
                                            <input class="form-control" name="password_confirmation" type="password"
                                                placeholder="">
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
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#clinicCode').change(function() {
                let clinic_code = $(this).val();

                if (clinic_code) {
                    $.ajax({
                        url: '/superadmin/get-clinic-details/' + clinic_code,
                        type: 'GET',
                        success: function(data) {
                            if (data) {
                                $('#clinicName').val(data.clinicName);
                                $('#clinicPhone').val(data.clinicPhone);
                                $('#clinicEmail').val(data.clinicEmail);
                                $('#clinicAddress').val(data.clinicAddress);
                               
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    
                    $('#clinicName').val('');
                    $('#clinicPhone').val('');
                    $('#clinicEmail').val('');
                    $('#clinicAddress').val('');
                }
            });
        });
    </script>
@endsection
