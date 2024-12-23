<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\AppoinmentModel;
use App\Models\DoctorModel;
use App\Models\DoctorScheduleModel;
use App\Models\PatientModel;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class doctorController extends Controller
{
    public function doctor_dashboard()
    {
        return view('doctor.dashboard');
    }

    //profile start
    public function admin_profile()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('doctor.profile.view', $data);
    }

    public function admin_profile_edit()
    {
        $data['corrent_user'] = User::find(Auth::user()->id);
        return view('doctor.profile.edit', $data);
    }
    public function admin_profile_update(Request $request)
    {
        $profile = User::where('id', '=', Auth::user()->id)->first();
        if (!empty($profile)) {
            $request->validate([
                'name' => 'required|unique:users,name,' . $profile->id,
                'username' => 'required|unique:users,username,' . $profile->id,
                'phone' => 'required|unique:users,phone,' . $profile->id,
                'email' => 'required|email|unique:users,email,' . $profile->id,
                'gender' => 'required',
                'date_of_birth' => 'required',
                'education' => 'required',
                'designation' => 'required',
                'department' => 'required',
                'address' => 'required',
            ]);

            if ($request->hasFile('profile')) {
                if (!empty($profile->profile) && file_exists(public_path('upload/img/users/' . $profile->profile))) {
                    unlink(public_path('upload/img/users/' . $profile->profile));
                }
                $image = $request->file('profile');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/img/users/'), $imagename);
                $profile->profile = $imagename;
            }
            $profile->name = $request->name;
            $profile->username = $request->username;
            $profile->date_of_birth = $request->date_of_birth;
            $profile->gender = $request->gender;
            $profile->address = $request->address;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->education = $request->education;
            $profile->designation = $request->designation;
            $profile->department = $request->department;
            $profile->save();

            return redirect()->back()->with('success', 'Profile Update Successfully');
        } else {
            abort(404);
        }
    }


    //    =========doctor show/////
    // public function doctor_index(Request $request)
    // {
    //     $data['doctor_data'] = DoctorModel::doctorData($request);
    //     return view('doctor.doctor.list', $data);
    // }


    //    =========doctor schedule
    public function doctor_index(Request $request)
    {
        $data['DoctorSchedule'] = DoctorScheduleModel::DoctorSchedule($request);
        return view('doctor.doctor.list', $data);
    }
    public function doctor_patient(Request $request)
    {
        $data['patient_data'] = PatientModel::patientData($request);
        return view('doctor.patient.list', $data);
    }

    public function doctor_appoinment(Request $request)
    {
        $data['appoinment_list'] = AppoinmentModel::getdoctorappoinment($request);
        return view('doctor.appoinment.list', $data);
    }


    public function appoinment_status_change(Request $request)
    {
        // Retrieve the user using the order_id
        $appoinment = AppoinmentModel::find($request->appoinment_id);

        // Check if user exists before proceeding
        if ($appoinment) {
            // Update the status field with status_id
            $appoinment->status = $request->status_id;

            // Save the updated user record
            $appoinment->save();

            return response()->json(['success' => 'Appoinment Updated successfully.']);
            // Return a JSON response with success
        } else {
            // If no user found, return error response
            return response()->json(['success' => false, 'message' => 'User not found']);
        }
    }

}
