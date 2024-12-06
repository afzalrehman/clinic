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
                            <form action="{{ route('admin.user.store') }}" method="POST">
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
                                                        <option value="{{ $patient->id }}"
                                                            {{ old('user_id') == $patient->id ? 'selected' : '' }}>
                                                            {{ $patient->cnic_id }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Doctors">
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}"
                                                            {{ old('user_id') == $doctor->id ? 'selected' : '' }}>
                                                            {{ $doctor->cnic_id }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            @error('patient_id')
                                                <span style="color: red;font-size: 13px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Username <span class="login-danger">*</span></label>
                                            <input class="form-control" name="username" type="text"
                                                value="{{ old('username') }}" placeholder="">
                                            <span
                                                style="color: red; font-size: 13px">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control" name="mobile" type="text"
                                                value="{{ old('mobile') }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('mobile') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" type="email"
                                                value="{{ old('email') }}" placeholder="">
                                            <span style="color: red; font-size: 13px">{{ $errors->first('email') }}</span>
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
                                            <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
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
