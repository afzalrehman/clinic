<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AppoinmentMail;
use App\Mail\VarifyUser;
use App\Models\appionment_fileModel;
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
        $data['doctors'] = DoctorModel::where('mobile', '=', $data['appoinment']->doctor_id)->first();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['patients'] = PatientModel::where('clinic_id', Auth::user()->clinic_Id)->get();
        $data['editpatients'] = PatientModel::where('mobile', $data['appoinment']->patient_id)->first();
        $data['appoinment'] = AppoinmentModel::with(['patient', 'doctor', 'department'])->findOrFail($id);

        return view('clinic.appoinment.edit', $data);
    }


    public function appoinment_store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,mobile',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,mobile',
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
        $patient = PatientModel::where('mobile', $request->patient_id)->first();
        $department = DepartmentModel::find($request->department_id);
        $doctor = DoctorModel::where('mobile', $request->doctor_id)->first();

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
            'patient_id' => 'required|exists:patient,mobile',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,mobile',
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

    // online 
    public function Online_DoctorScheduleDetails($id)
    {
        $DoctorSchedule = DoctorScheduleModel::where('doctor_id', '=', $id)->first(); // Assuming you have a `Patient` model
        if ($DoctorSchedule) {
            return response()->json([
                'available_days' => $DoctorSchedule->available_days,
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
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->where('clinic_id', $data['clinic']->clinic_code)->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', $data['clinic']->clinic_code)->get();
        return view('clinic.online.appoinment', $data);
    }

    public function register_patient_online($clinic_id, Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|numeric', // Number is required
            'doctor_id' => 'required', // Number is required
            'department_id' => 'required|integer',
            'appointment_date' => 'required',
            'document.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',

        ]);

        // Check if the patient already exists in the patient table
        $existingPatient = PatientModel::where('mobile', $request->number)->first();

        if ($existingPatient) {
            // If patient exists, insert appointment only
            $appointment = AppoinmentModel::create([
                'patient_id' => $existingPatient->mobile,
                'clinic_id' => $request->clinic_id,
                'doctor_id' => $request->doctor_id,
                'department_id' => $request->department_id,
                'notes' => $request->reason,
                'fill_form' => 'Online',
                'appointment_date' => $request->appointment_date,
            ]);

            if ($request->hasFile('document')) {
                foreach ($request->file('document') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $destinationPath = public_path('upload/appointments_file/');

                    // Move the file to the destination
                    $file->move($destinationPath, $fileName);

                    // Save file details in the appointment_files table or related model
                    appionment_fileModel::create([
                        'appointments_id' => $appointment->id,
                        'file_path' => 'upload/appointments_file/' . $fileName,
                    ]);
                }
            }



            return redirect()->back()->with('success', 'Appointment booked successfully.');
        } else {
            // If patient doesn't exist, insert patient and appointment
            $patient = PatientModel::create([
                'name' => $request->name,
                'clinic_id' => $request->clinic_id,
                'mobile' => $request->number,
                'fill_form' => 'Online',
            ]);

            $appointment = AppoinmentModel::create([
                'patient_id' => $request->number,
                'clinic_id' => $request->clinic_id,
                'doctor_id' => $request->doctor_id,
                'department_id' => $request->department_id,
                'notes' => $request->reason,
                'fill_form' => 'Online',
                'appointment_date' => $request->appointment_date,
            ]);

            if ($request->hasFile('document')) {
                foreach ($request->file('document') as $file) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $destinationPath = public_path('upload/appointments_file/');

                    // Move the file to the destination
                    $file->move($destinationPath, $fileName);

                    // Save file details in the appointment_files table or related model
                    appionment_fileModel::create([
                        'appointments_id' => $appointment->id,
                        'file_path' => 'upload/appointments_file/' . $fileName,
                    ]);
                }
            }


            return redirect()->back()->with('success', 'Appointment booked successfully.');
        }
    }



}
