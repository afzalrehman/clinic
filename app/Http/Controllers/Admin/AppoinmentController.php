<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppoinmentModel;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\PatientModel;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{

    public function appoinment_index(Request $request)
    {
        $data['appoinment_list'] = AppoinmentModel::getappoinment($request);
        return view('admin.appoinment.list', $data);
    }


    public function appoinment_create()
    {
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        return view('admin.appoinment.add', $data);
    }
    public function appoinment_edit($id)
    {
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['appoinment'] = AppoinmentModel::with(['patient', 'doctor', 'department'])->findOrFail($id);

        return view('admin.appoinment.edit', $data);
    }


    public function appoinment_store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,id',
            'patient_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|string',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,id',
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
            'patient_name',
            'username',
            'gender',
            'mobile',
            'email',
            'address',
            'department_id',
            'doctor_id',
            'treatment',
            'appointment_date',
            'from_time',
            'to_time',
            'status',
            'notes'
        ]);

        // If a file is uploaded, handle the file storage
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = 'upload/appoinment_file/';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($filePath), $fileName);
            $data['file'] = $filePath . $fileName;
        }
        AppoinmentModel::create($data);
        return redirect()->route('admin.appoinment')->with('success', 'Appointment created successfully!');
    }
    public function appoinment_update($id, Request $request)
    {
        // Validate the form data
        $request->validate([
            'patient_id' => 'required|exists:patient,id',
            'patient_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|string',
            'department_id' => 'required|exists:department,id',
            'doctor_id' => 'nullable|exists:doctor,id',
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
            'patient_name',
            'username',
            'gender',
            'mobile',
            'email',
            'address',
            'department_id',
            'doctor_id',
            'treatment',
            'appointment_date',
            'from_time',
            'to_time',
            'status',
            'notes'
        ]);

        // Find the existing appointment
        $appointment = AppoinmentModel::findOrFail($id);

        // If a new file is uploaded, handle the file storage
        if ($request->hasFile('file')) {
            // If there is an existing file, delete it
            if ($appointment->file) {
                $existingFilePath = public_path('upload/appoinment_file/'. $appointment->file);
                if (file_exists($existingFilePath)) {
                    unlink($existingFilePath); // Delete the old file
                }
            }

            // Store the new file
            $file = $request->file('file');
            $filePath = 'upload/appoinment_file/';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($filePath), $fileName);
            $data['file'] = $filePath . $fileName;
        }

        // Update the appointment with the new data
        $appointment->update($data);

        return redirect()->route('admin.appoinment')->with('success', 'Appointment updated successfully!');
    }


    public function appoinment_delete($id)
{
    // Find the appointment by ID
    $appointment = AppoinmentModel::findOrFail($id);

    // Check if a file is associated with this appointment and delete it if exists
    if ($appointment->file) {
        $existingFilePath = public_path('upload/appoinment_file/'.$appointment->file);
        if (file_exists($existingFilePath)) {
            unlink($existingFilePath); // Delete the old file
        }
    }
    // Delete the appointment record
    $appointment->delete();

    return redirect()->route('admin.appoinment')->with('success', 'Appointment deleted successfully!');
}


}
