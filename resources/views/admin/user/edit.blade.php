@extends('admin.admin_dashboard_step')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.user')}}">User </a></li>
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
                            <form action="{{url('admin/user/update/'.$user->id)}}" method="POST">
                                @csrf
                                @method('PUT') 
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-heading">
                                            <h4>User Form</h4>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Name <span class="login-danger">*</span></label>
                                            <input class="form-control" name="name" value="{{$user->name}}" type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Username <span class="login-danger">*</span></label>
                                            <input class="form-control"  name="username" value="{{$user->username}}"  type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{$errors->first('username')}}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Mobile <span class="login-danger">*</span></label>
                                            <input class="form-control"  name="mobile" value="{{$user->phone}}"  type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{$errors->first('mobile')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms">
                                            <label>Email <span class="login-danger">*</span></label>
                                            <input class="form-control"  name="email" value="{{$user->email}}"  type="email" placeholder="">
                                            <span style="color: red; font-size: 13px">{{$errors->first('email')}}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block local-forms cal-icon">
                                            <label >Date Of Birth  <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" value="{{$user->date_of_birth}}" name="date" type="text"  placeholder="" >
                                            <span style="color: red; font-size: 13px">{{$errors->first('date')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-6">
                                        <div class="input-block select-gender">
                                            <label class="gen-label">Gender<span class="login-danger">*</span></label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender"   class="form-check-input" {{($user->gender == 'Mail' ?'checked' :'')}} value="Mail">Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" name="gender" class="form-check-input"  {{($user->gender == 'Femail' ?'checked' :'')}} value="Femail">Female
                                                </label>
                                            </div>
                                            <span style="color: red; font-size: 13px">{{$errors->first('gender')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Education <span class="login-danger">*</span></label>
                                            <input class="form-control"  name="education" value="{{$user->education}}" type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{$errors->first('education')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Designation <span class="login-danger">*</span></label>
                                            <input class="form-control"  name="designation" value="{{$user->designation}}"  type="text" placeholder="">
                                            <span style="color: red; font-size: 13px">{{$errors->first('designation')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Department <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="department">
                                                <option value="">Select Department</option>
                                                <option {{($user->department == 'Orthopedics' ? 'selected' :'')}} >Orthopedics</option>
                                                <option {{($user->department == 'Radiology' ? 'selected' :'')}} >Radiology</option>
                                                <option {{($user->department == 'Dentist' ? 'selected' :'')}} >Dentist</option>
                                            </select>
                                            <span style="color: red; font-size: 13px">{{$errors->first('department')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <div class="input-block local-forms">
                                            <label>Address <span class="login-danger">*</span></label>
                                            <textarea class="form-control"  name="address" rows="3" cols="30">{{$user->address}}</textarea>
                                            <span style="color: red; font-size: 13px">{{$errors->first('address')}}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-4">
                                        <div class="input-block local-forms">
                                            <label>Postion <span class="login-danger">*</span></label>
                                            <select class="form-control select" name="postion">
                                                <option value="">Select Postion</option>
                                                @foreach ($roles as $item)
                                                <option {{($user->role == $item->id ? 'selected' :'')}} value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red; font-size: 13px">{{$errors->first('postion')}}</span>
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
                                                class="btn btn-primary submit-form me-2">Update</button>
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
