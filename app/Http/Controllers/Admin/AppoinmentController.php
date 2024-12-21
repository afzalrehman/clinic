<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AppoinmentMail;
use App\Mail\VarifyUser;
use App\Models\AppoinmentModel;
use App\Models\ClinicModel;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\DoctorScheduleModel;
use App\Models\PatientModel;
use App\Models\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use Mail;
use Hash;
use Str;
class AppoinmentController extends Controller
{

    public function appoinment_index(Request $request)
    {
        $data['appoinment_list'] = AppoinmentModel::getappoinment($request);
        return view('clinic.appoinment.list', $data);
    }


    public function appoinment_create()
    {
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['patients'] = PatientModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        return view('clinic.appoinment.add', $data);
    }
    public function appoinment_edit($id)
    {
        $data['appoinment'] = AppoinmentModel::find($id);
        $data['doctorschedule'] = DoctorScheduleModel::where('doctor_id', '=', $data['appoinment']->doctor_id)->first();
        $data['doctors'] = DoctorModel::where('cnic', '=', $data['appoinment']->doctor_id)->first();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['patients'] = PatientModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['appoinment'] = AppoinmentModel::with(['patient', 'doctor', 'department'])->findOrFail($id);

        return view('clinic.appoinment.edit', $data);
    }


    public function appoinment_store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,cnic',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,cnic',
            'treatment' => 'nullable|string',
            'appointment_date' => 'required',
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
        $data['clinic_id'] = Auth::user()->clinic_id;

        // Fetch related data
        $patient = PatientModel::where('cnic', $request->patient_id)->first();
        $department = DepartmentModel::find($request->department_id);
        $doctor = DoctorModel::where('cnic', $request->doctor_id)->first();

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
        return redirect()->route('admin.appoinment')->with('success', 'Appointment created successfully!');
    }
    public function appoinment_update($id, Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,cnic',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,cnic',
            'treatment' => 'nullable|string',
            'appointment_date' => 'required',
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
        $data['clinic_id'] = Auth::user()->clinic_id;
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

        return redirect()->route('clinic.appoinment')->with('success', 'Appointment updated successfully!');
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

        return redirect()->route('admin.appoinment')->with('success', 'Appointment deleted successfully!');
    }

    public function appoinment_get_doctor($id)
    {
        $doctors = DoctorModel::where('department_id', $id)->where('clinic_id', Auth::user()->clinic_id)->get(); // Fetch all doctors
        if ($doctors->count() > 0) {
            $response = $doctors->map(function ($doctor) {
                return [
                    'mobile' => $doctor->mobile,
                    'name' => $doctor->name,
                ];
            });
            return response()->json($response);
        } else {
            return response()->json(['error' => 'No doctors found'], 404);
        }
    }


    // online appionment get doctor
    public function appoinment_online_doctor($id)
    {
        $doctors = DoctorModel::where('department_id', $id)->get(); // Fetch all doctors
        if ($doctors->count() > 0) {
            $response = $doctors->map(function ($doctor) {
                return [
                    'mobile' => $doctor->mobile,
                    'name' => $doctor->name,
                ];
            });
            return response()->json($response);
        } else {
            return response()->json(['error' => 'No doctors found'], 404);
        }
    }



    public function getDoctorScheduleDetails($id)
    {
        $DoctorSchedule = DoctorScheduleModel::where('doctor_id', '=', $id)->where('clinic_id', Auth::user()->clinic_id)->first(); // Assuming you have a `Patient` model
        if ($DoctorSchedule) {
            return response()->json([
                'available_days' => $DoctorSchedule->available_days,
                'from' => $DoctorSchedule->from,
                'to' => $DoctorSchedule->to,
            ]);

        } else {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }

    //online appionment

    public function showForm($encryptedClinicId)
    {
        $clinicId = base64_decode($encryptedClinicId);
        $data['clinic'] = ClinicModel::findOrFail($clinicId);
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->where('clinic_id',  $data['clinic']->clinic_code)->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', $data['clinic']->clinic_code)->get();
        return view('clinic.online.appoinment', $data);
    }

    public function register_patient_online($clinic_id, Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|numeric|unique:patient,mobile|unique:users,phone', // Combine unique checks
            'email' => 'required|email|unique:patient,email|unique:users,email',     // Combine unique checks
            'password' => 'required|string|min:8|confirmed', // Confirmed checks for password confirmation
        ]);


        // Find the clinic
        // $clinic = ClinicModel::findOrFail($clinic_id);

        // Insert into `patients` table
        $patient = new PatientModel();
        $patient->name = $request->name;
        $patient->clinic_id = $request->clinic_id;
        $patient->mobile = $request->number;
        $patient->email = $request->email;
        $patient->save();

        // Insert into `users` table
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->clinic_id = $request->clinic_id;
        $user->user_id = $request->number;
        $user->phone = $request->number;
        $user->remember_token = Str::random(50);
        $user->password = Hash::make($request->password); // Hash the password
        $user->role = 3; // Assuming 'patient' role exists in your system
        Mail::to($user->email)->send(new VarifyUser($user));
        $user->save();

        return redirect()->back()->with('success', 'Registered successfull Please Chack Email and Verif');
    }


}
