<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function admin_doctor(Request $request)
    {
        $data['doctor_data'] = DoctorModel::doctorData($request);
        return view('clinic.doctor.list', $data);
    }
    public function admin_doctor_create()
    {
        $data['department'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        return view('clinic.doctor.add', $data);
    }

    public function admin_doctor_store(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|unique:doctor',
            'email' => 'required|email|unique:doctor',
            'cnic' => 'required|unique:doctor',
            'dob' => 'required',
            'gender' => 'required|in:Male,Female',
            'education' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department_id' => 'required|exists:department,id', // assuming you have a departments table
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'biography' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // optional image upload
            'status' => 'required|in:Active,Inactive',
        ]);

        $doctor = new DoctorModel();
        // Handle file upload if avatar is provided
        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/img/doctor/'), $imageName);
            $doctor->avatar = $imageName;
        }


        $doctor->name = $request->input('name');
        $doctor->lastname = $request->input('lastname');
        $doctor->mobile = $request->input('mobile');
        $doctor->email = $request->input('email');
        $doctor->cnic = $request->input('cnic');
        $doctor->dob = $request->input('dob');
        $doctor->gender = $request->input('gender');
        $doctor->education = $request->input('education');
        $doctor->designation = $request->input('designation');
        $doctor->department_id = $request->input('department_id');
        $doctor->address = $request->input('address');
        $doctor->city = $request->input('city');
        $doctor->country = $request->input('country');
        $doctor->state = $request->input('state');
        $doctor->postal_code = $request->input('postal_code');
        $doctor->clinic_id = Auth::user()->clinic_id;
        $doctor->biography = $request->input('biography');
        $doctor->status = $request->input('status');
        $doctor->created_at = date('Y-m-d H:i:s');
        $doctor->clinic_id = Auth::user()->clinic_id;
        // Save the doctor to the database
        $doctor->save();

        // Redirect with success message
        return redirect()->route('clinic.doctor')->with('success', 'Doctor created successfully!');


    }


    public function admin_doctor_edit($id)
    {
        $data['department'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['doctor'] = DoctorModel::find($id);
        return view('clinic.doctor.edit', $data);
    }
    public function admin_doctor_update($id, Request $request)
    {
        // Find the doctor record by ID
        $doctor = DoctorModel::findOrFail($id);

        // Validate form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mobile' => 'required|unique:doctor,mobile,' . $id,
            'email' => 'required|email|unique:doctor,email,' . $id,
            'cnic' => 'required|unique:doctor,cnic,' . $id,
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'education' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department_id' => 'required|exists:department,id',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'biography' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Active,Inactive',
        ]);

        // Handle file upload if avatar is provided
        if ($request->hasFile('profile')) {
            // Delete the old avatar if it exists
            if (!empty($doctor->avatar) && file_exists(public_path('upload/img/doctor/' . $doctor->avatar))) {
                unlink(public_path('upload/img/doctor/' . $doctor->avatar));
            }

            // Upload new avatar
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/img/doctor/'), $imageName);
            $doctor->avatar = $imageName; // Update the avatar field

        }

        // Update other fields
        $doctor->name = $request->input('name');
        $doctor->lastname = $request->input('lastname');
        $doctor->mobile = $request->input('mobile');
        $doctor->email = $request->input('email');
        $doctor->cnic = $request->input('cnic');
        $doctor->dob = $request->input('dob');
        $doctor->gender = $request->input('gender');
        $doctor->education = $request->input('education');
        $doctor->designation = $request->input('designation');
        $doctor->department_id = $request->input('department_id');
        $doctor->address = $request->input('address');
        $doctor->city = $request->input('city');
        $doctor->country = $request->input('country');
        $doctor->state = $request->input('state');
        $doctor->postal_code = $request->input('postal_code');
        $doctor->biography = $request->input('biography');
        $doctor->clinic_id = Auth::user()->clinic_id;
        $doctor->status = $request->input('status');
        $doctor->updated_at = date('Y-m-d H:i:s');
        $doctor->clinic_id = Auth::user()->clinic_id;
        // Save the updated doctor to the database
        $doctor->save();

        // Redirect with success message
        return redirect()->route('clinic.doctor')->with('success', 'Doctor updated successfully!');
    }

    public function admin_doctor_delete($id)
    {
        // Find the user by ID
        $doctor = DoctorModel::find($id);
        if (!$doctor) {
            return redirect()->back()->with('error', 'Failed to Delete doctor. Please try again');
        }
        if (!empty($doctor->avatar) && file_exists(public_path('upload/img/doctor/' . $doctor->avatar))) {
            unlink(public_path('upload/img/doctor/' . $doctor->avatar));
        }
        $doctor->delete();

        return redirect()->back()->with('error', 'doctor Delete successfully');
    }
}
