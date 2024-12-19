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
                            <li class="breadcrumb-item active">Update Clinic</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('super-admin/clinic/update/'.$clinic_data->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>Clinic Form</h4>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Code <span class="login-danger">*</span></label>
                                            <input class="form-control" name="clinic_code"  type="text" readonly value="{{$clinic_data->clinic_code}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Name <span class="login-danger">*</span></label>
                                            <input class="form-control" name="name" type="text" placeholder="Enter clinic name" value="{{old('name' , $clinic_data->name)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Address <span class="login-danger">*</span></label>
                                            <input class="form-control" name="address" type="text" placeholder="Enter clinic address" value="{{old('address' , $clinic_data->address)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('address')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Clinic Location (Location Pin) <span class="login-danger">*</span></label>
                                            <input class="form-control" name="location_pin" type="text" placeholder="Enter location pin" value="{{old('location_pin' , $clinic_data->location_pin)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('location_pin')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Phone No <span class="login-danger">*</span></label>
                                            <input class="form-control" name="phone_no" type="text" placeholder="Enter phone number" value="{{old('phone_no' , $clinic_data->phone_no)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('phone_no')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Website</label>
                                            <input class="form-control" name="website" type="text" placeholder="Enter website URL" value="{{old('website' , $clinic_data->website)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('website')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email Address <span class="login-danger">*</span></label>
                                            <input class="form-control" name="email" type="email" placeholder="Enter email address" value="{{old('email' , $clinic_data->email)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('email')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Contact Person <span class="login-danger">*</span></label>
                                            <input class="form-control" name="contact_person" type="text" placeholder="Enter contact person name" value="{{old('contact_person' , $clinic_data->contact_person)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('contact_person')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Flag <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="flag">
                                                <option value="">Select Flag</option>
                                                <option value="1" {{ old('flag' , $clinic_data->flag) == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('flag' , $clinic_data->flag) == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            <span style="color: red; font-size: 13px">{{$errors->first('flag')}}</span>
                                        </div>
                                    </div>
                            
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Kiosk URL <span class="login-danger">*</span></label>
                                            <input class="form-control" name="kiosk_url" type="text" placeholder="Enter kiosk URL" value="{{old('kiosk_url' , $clinic_data->kiosk_url)}}">
                                            <span style="color: red; font-size: 13px">{{$errors->first('kiosk_url')}}</span>
                                        </div>
                                    </div>
                            
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
