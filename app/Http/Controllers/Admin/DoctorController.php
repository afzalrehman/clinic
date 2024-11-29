<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorModel;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function admin_doctor(Request $request)
    {
        // $data['doctor_data'] = DoctorModel::doctorData($request);
        return view('admin.doctor.list' );
    }
    public function admin_doctor_create()
    {
        return view('admin.doctor.add');
    }

    public function admin_doctor_store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'doctor_name' => 'required|string|max:255|unique:doctor,name',
            'doctor_head' => 'required|string|max:255',
            'doctor_description' => 'required|string',
            'doctor_date' => 'required',
            'status' => 'required|in:Active,In Active', // Assuming 'gender' here represents status
        ]);


        $doctor = new DoctorModel();

        if (!empty($doctor)) {
            $doctor->name = $request->doctor_name;
            $doctor->head = $request->doctor_head;
            $doctor->description = $request->doctor_description;
            $doctor->date = $request->doctor_date;
            $doctor->status = $request->status; // 'Active' or 'In Active'
            $doctor->save();

            // Redirect with success message
            return redirect('admin/doctor')->with('success', 'doctor created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create doctor. Please try again.');
        }
    }


    public function admin_doctor_edit($id)
    {
        $data['doctor'] = DoctorModel::find($id);
        return view('admin.doctor.edit' , $data);
    }
    public function admin_doctor_update($id ,Request $request)
    {
        $doctor =  DoctorModel::find($id);
        // Validate the incoming request
        $request->validate([
            'doctor_name' => 'required|string|max:255|unique:doctor,name,'. $doctor->id,
            'doctor_head' => 'required|string|max:255',
            'doctor_description' => 'required|string',
            'doctor_date' => 'required',
            'status' => 'required|in:Active,In Active', // Assuming 'gender' here represents status
        ]);

        if (!empty($doctor)) {
            $doctor->name = $request->doctor_name;
            $doctor->head = $request->doctor_head;
            $doctor->description = $request->doctor_description;
            $doctor->date = $request->doctor_date;
            $doctor->status = $request->status; // 'Active' or 'In Active'
            $doctor->save();

            // Redirect with success message
            return redirect('admin/doctor')->with('success', 'doctor Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to Updated doctor. Please try again.');
        }
    }
    public function admin_doctor_delete($id)
    {
        // Find the user by ID
        $doctor = DoctorModel::find($id);
        if (!$doctor) {
            return redirect()->back()->with('error', 'Failed to Delete doctor. Please try again');
        }
        $doctor->delete();

        return redirect()->back()->with('error', 'doctor Delete successfully');
    }
}
