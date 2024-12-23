<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PatientModel;
use Auth;
use Illuminate\Http\Request;
use Validator;

class PatientController extends Controller
{
    public function admin_patient(Request $request)
    {
        $data['patient_data'] = patientModel::patientData($request);
        return view('clinic.patient.list', $data);
    }
    public function admin_patient_create()
    {
        return view('clinic.patient.add');
    }


    public function admin_patient_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|unique:patient,mobile',
            'email' => 'nullable|email|max:255|unique:patient,email',
            'cnic' => 'nullable|string|max:15|unique:patient,cnic',
            'dob' => 'required',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'gender' => 'required|in:Male,Female',
            'address' => 'nullable|string|max:500',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|digits_between:10,15',
            'known_allergies' => 'nullable|string|max:500',
            'chronic_illnesses' => 'nullable|string|max:500',
            'marital_status' => 'required|string',
            'status' => 'required|string|in:Active,In Active',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Added profile photo validation
        ]);

        // Create the patient record
        $patient = new PatientModel();
        $patient->name = $request->name;
        $patient->mobile = $request->mobile;
        $patient->email = $request->email;
        $patient->cnic = $request->cnic;
        $patient->date_of_birth = $request->dob;
        $patient->blood_group = $request->blood_group;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->emergency_contact_name = $request->emergency_contact_name;
        $patient->emergency_contact_number = $request->emergency_contact_number;
        $patient->known_allergies = $request->known_allergies;
        $patient->chronic_illnesses = $request->chronic_illnesses;
        $patient->city = $request->marital_status;
        // $patient->department = $request->department;
        $patient->marital_status = $request->marital_status;
        $patient->fill_form = 'Clinic';
        $patient->status = $request->status;
        $patient->created_at = date('Y-m-d H:i:s');
        $patient->clinic_id = Auth::user()->clinic_id;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/img/patient/'), $imagename);
            $patient->profile_photo = $imagename;
        }

        // Save the patient
        $patient->save();

        return redirect()->route('clinic.patient')->with('success', 'Patient created successfully.');
    }


    public function admin_patient_edit($id)
    {
        $data['patient'] = PatientModel::find($id);
        return view('clinic.patient.edit', $data);
    }
    public function admin_patient_view($id)
    {
        $data['patient'] = PatientModel::find($id);
        return view('clinic.patient.view', $data);
    }


    public function admin_patient_update(Request $request, $id)
    {
        // Find the existing patient by ID
        $patient = PatientModel::findOrFail($id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|unique:patient,mobile,' . $patient->id,
            'email' => 'nullable|email|max:255|unique:patient,email,' . $patient->id,
            'cnic' => 'nullable|string|max:15|unique:patient,cnic,' . $patient->id,
            'dob' => 'required',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'gender' => 'required|in:Male,Female',
            'address' => 'nullable|string|max:500',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|digits_between:10,15',
            'known_allergies' => 'nullable|string|max:500',
            'chronic_illnesses' => 'nullable|string|max:500',
            'marital_status' => 'required|string',
            'status' => 'required|string|in:Active,In Active',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the patient record
        $patient->name = $request->name;
        $patient->mobile = $request->mobile;
        $patient->email = $request->email;
        $patient->cnic = $request->cnic;
        $patient->date_of_birth = $request->dob;
        $patient->blood_group = $request->blood_group;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->emergency_contact_name = $request->emergency_contact_name;
        $patient->emergency_contact_number = $request->emergency_contact_number;
        $patient->known_allergies = $request->known_allergies;
        $patient->chronic_illnesses = $request->chronic_illnesses;
        $patient->city = $request->city;
        $patient->fill_form = 'Clinic';
        // $patient->department = $request->department;
        $patient->marital_status = $request->marital_status;
        $patient->status = $request->status;
        $patient->updated_at = date('Y-m-d H:i:s');
        $patient->clinic_id = Auth::user()->clinic_id;

        if ($request->hasFile('profile_photo')) {
            if (!empty($patient->profile_photo) && file_exists(public_path('upload/img/patient/'))) {
                unlink(public_path('upload/img/patient/' . $patient->profile_photo));
            }
            $image = $request->file('profile_photo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/img/patient/'), $imagename);
            $patient->profile_photo = $imagename;
        }

        // Save the updated patient data
        $patient->save();

        return redirect()->route('clinic.patient')->with('success', 'Patient updated successfully.');
    }

    public function admin_patient_delete($id)
    {
        $delete = PatientModel::find($id);
        if (!$delete) {
            return redirect()->back()->with('error', 'Patient not found.');
        }
        if (!empty($delete->profile_photo) && file_exists(public_path('upload/img/patient/' . $delete->profile_photo))) {
            unlink(public_path('upload/img/patient/' . $delete->profile_photo));
        }
        $delete->delete();
        return redirect()->back()->with('success', 'Patient deleted successfully.');
    }



    public function getPatientDetails($id)
    {
        $patient = PatientModel::where( 'cnic', '=',$id)->where('clinic_id', Auth::user()->clinic_id)->first(); // Assuming you have a `Patient` model
        if ($patient) {
            return response()->json([
                'name' => $patient->name,
                'lastname' => $patient->lastname,
                'mobile' => $patient->mobile,
                'email' => $patient->email,
                'gender' => $patient->gender,
                'address' => $patient->address,
            ]);
        } else {
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }

}
