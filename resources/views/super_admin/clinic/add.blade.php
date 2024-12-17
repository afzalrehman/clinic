@extends('super_admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('superadmin.clinic')}}">Clinic </a></li>
                            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                            <li class="breadcrumb-item active">Add Clinic</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('super-admin/clinic/add')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Clinic Form</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Code <span class="login-danger">*</span></label>
                                            <input class="form-control" name="clinic_code" placeholder="Enter clinic Code" type="text" value="{{old('clinic_code')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('clinic_code')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Name <span class="login-danger">*</span></label>
                                            <input class="form-control" name="name" type="text" placeholder="Enter clinic name" value="{{old('name')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Address <span class="login-danger">*</span></label>
                                            <input class="form-control" name="address" type="text" placeholder="Enter clinic address" value="{{old('address')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('address')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Location (Location Pin) <span class="login-danger">*</span></label>
                                            <input class="form-control" name="location_pin" type="text" placeholder="Enter location pin" value="{{old('location_pin')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('location_pin')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Phone No <span class="login-danger">*</span></label>
                                            <input class="form-control" name="phone_no" type="text" placeholder="Enter phone number" value="{{old('phone_no')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('phone_no')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Website <span class="login-danger">*</span></label>
                                            <input class="form-control" name="website" type="text" placeholder="Enter website URL" value="{{old('website')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('website')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email Address <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" type="email" placeholder="Enter email address" value="{{old('email')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('email')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Contact Person <span class="login-danger">*</span></label>
                                            <input class="form-control" name="contact_person" type="text" placeholder="Enter contact person name" value="{{old('contact_person')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('contact_person')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Flag <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="flag">
                                                <option value="">Select Flag</option>
                                                <option value="Active" {{ old('flag') == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Inactive" {{ old('flag') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            <span style="color: red; font-size: 13px">{{$errors->first('flag')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Kiosk URL <span class="login-danger">*</span></label>
                                            <input class="form-control" name="kiosk_url" type="text" placeholder="Enter kiosk URL" value="{{old('kiosk_url')}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('kiosk_url')}}</span>
                                        </div>
                                    </div>
                            
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
