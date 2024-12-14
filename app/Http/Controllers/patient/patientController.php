<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Mail\AppoinmentMail;
use App\Models\AppoinmentModel;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\DoctorScheduleModel;
use App\Models\PatientModel;
use App\Models\PaymentModel;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Mail;

class patientController extends Controller
{
    public function patient_dashboard()
    {
        return view('patient.dashboard');
    }




    //profile start
    public function patient_profile()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('patient.profile.view', $data);
    }

    public function patient_profile_edit()
    {
        $data['corrent_user'] = User::find(Auth::user()->id);
        return view('patient.profile.edit', $data);
    }
    public function patient_profile_update(Request $request)
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

    public function patient_appoinment(Request $request)
    {
        $data['appoinment_list'] = AppoinmentModel::getpatientappoinment($request);
        return view('patient.appoinment.list', $data);
    }

    
    public function appoinment_create()
    {
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        $data['patients'] = PatientModel::where('cnic', '=', Auth::user()->user_id)->where('status', '=', 'Active')->first();
        return view('patient.appoinment.add', $data);
    }
    public function appoinment_edit($id)
    {
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['appoinment'] = AppoinmentModel::with(['patient', 'doctor', 'department'])->findOrFail($id);

        return view('patient.appoinment.edit', $data);
    }


    public function appoinment_store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,cnic',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,cnic',
            'treatment' => 'nullable|string',
            'appointment_date' => 'required|date',
            'from_time' => 'required',
            'to_time' => 'required',
            'status' => 'required|in:Upcoming,Completed,Cancelled',
            'notes' => 'nullable|string',
            // 'file' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Prepare data to store
        $data = $request->only([
            'patient_id',
            'department_id',
            'doctor_id',
            'treatment',
            'appointment_date',
            'from_time',
            'to_time',
            'status',
            'notes'
           
        ]);
        $data['created_at'] = date('Y-m-d H:i:s');

        // Fetch related data
        $patient = PatientModel::where('cnic',$request->patient_id)->first();
        $department = DepartmentModel::find($request->department_id);
        $doctor =DoctorModel::where('cnic',$request->doctor_id)->first();

        $email = $patient->email;

        // If a file is uploaded, handle the file storage
        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $filePath = 'upload/appoinment_file/';
        //     $fileName = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path($filePath), $fileName);
        //     $data['file'] = $filePath . $fileName;
        // }
        
        Mail::to($email)->send(new AppoinmentMail($data, $department, $doctor, $patient));
        AppoinmentModel::create($data);
        return redirect()->route('patient.appoinment')->with('success', 'Appointment created successfully!');
    }
    public function appoinment_update($id, Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,cnic',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,cnic',
            'treatment' => 'nullable|string',
            'appointment_date' => 'required|date',
            'from_time' => 'required',
            'to_time' => 'required',
            'status' => 'required|in:Upcoming,Completed,Cancelled',
            'notes' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Prepare data to store
        $data = $request->only([
            'patient_id',
            'department_id',
            'doctor_id',
            'treatment',
            'appointment_date',
            'from_time',
            'to_time',
            'status',
            'notes'
        ]);
        $data['updated_at'] = date('Y-m-d H:i:s');
        // Find the existing appointment
        $appointment = AppoinmentModel::findOrFail($id);

        // If a new file is uploaded, handle the file storage
        // if ($request->hasFile('file')) {
        //     // If there is an existing file, delete it
        //     if ($appointment->file) {
        //         $existingFilePath = public_path('upload/appoinment_file/' . $appointment->file);
        //         if (file_exists($existingFilePath)) {
        //             unlink($existingFilePath); // Delete the old file
        //         }
        //     }

        //     // Store the new file
        //     $file = $request->file('file');
        //     $filePath = 'upload/appoinment_file/';
        //     $fileName = time() . '_' . $file->getClientOriginalName();
        //     $file->move(public_path($filePath), $fileName);
        //     $data['file'] = $filePath . $fileName;
        // }

        // Update the appointment with the new data
        $appointment->update($data);

        return redirect()->route('patient.appoinment')->with('success', 'Appointment updated successfully!');
    }


    public function appoinment_delete($id)
    {
        // Find the appointment by ID
        $appointment = AppoinmentModel::findOrFail($id);

        // Check if a file is associated with this appointment and delete it if exists
        if ($appointment->file) {
            $existingFilePath = public_path('upload/appoinment_file/' . $appointment->file);
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath); // Delete the old file
            }
        }
        // Delete the appointment record
        $appointment->delete();

        return redirect()->route('patient.appoinment')->with('success', 'Appointment deleted successfully!');
    }


    public function payment(Request $request)
    {
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        $data['Payments'] = PaymentModel::getpatientAmmount($request);
        return view('patient.payment.list' ,$data);
    }

}
