<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ClinicModel;
use Auth;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function superadmin_clinic(Request $request)
    {
        $data['clinic_data'] = ClinicModel::ClinicData($request);
        return view('super_admin.clinic.list', $data);
    }
    public function superadmin_clinic_create()
    {
        return view('super_admin.clinic.add');
    }

    public function superadmin_clinic_edit($id)
    {
        $data['clinic_data'] = ClinicModel::find($id);
        return view('super_admin.clinic.edit', $data);
    }

    public function superadmin_clinic_store(Request $request)
    {
        $data = $request->validate([
            'clinic_code' => 'required|unique:users,clinic_code',
            'name' => 'required|string|max:255|unique:users,name',
            'address' => 'required|string|max:255',
            'location_pin' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15|unique:users,phone_no',
            'website' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'contact_person' => 'required|string|max:255|unique:users,contact_person',
            'flag' => 'required',
        ]);
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] = now();

        // Save clinic data
        $clinic = ClinicModel::create($data);

        // Generate the kiosk URL
        // $kioskUrl = route('portal.login', ['clinic_id' => $clinic->id]);
        // $clinic->kiosk_url = $kioskUrl;

        // // Generate QR Code and save it as a file
        // $qrCodePath = 'qrcodes/clinic_' . $clinic->id . '.png';
        // QrCode::format('png')->size(300)->generate($kioskUrl, public_path($qrCodePath));

        // $clinic->qr_code_path = $qrCodePath;
        $clinic->save();

        return redirect()->route('superadmin.clinic')->with('success', 'Clinic added and QR Code generated successfully!');
    }


    public function superadmin_clinic_update($id, Request $request)
    {
        // Find the clinic by ID
        $clinic = ClinicModel::findOrFail($id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'clinic_code' => 'required|unique:clinic,clinic_code,' . $id,
            'name' => 'required|string|max:255|unique:clinic,name,' . $id,
            'address' => 'required|string|max:255',
            'location_pin' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15|unique:clinic,phone_no,' . $id,
            'website' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:clinic,email,' . $id,
            'contact_person' => 'required|string|max:255',
            'flag' => 'required',
        ]);

        // Update the clinic data
        $clinic->update([
            'clinic_code' => $validatedData['clinic_code'],
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'location_pin' => $validatedData['location_pin'],
            'phone_no' => $validatedData['phone_no'],
            'website' => $validatedData['website'],
            'email' => $validatedData['email'],
            'contact_person' => $validatedData['contact_person'],
            'flag' => $validatedData['flag'],
            'updated_by' => Auth::user()->id,
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->route('superadmin.clinic')->with('success', 'Clinic updated successfully!');
    }


    public function superadmin_clinic_delete($id)
    {
        // Find the user by ID
        $Department = ClinicModel::find($id);
        if (!$Department) {
            return redirect()->back()->with('error', 'Failed to Delete Clinic. Please try again');
        }
        $Department->delete();

        return redirect()->back()->with('error', 'Clinic Delete successfully');
    }


    public function getClinicDetails($id)
    {
        $data['clinic'] = ClinicModel::where('clinic_code', '=', $id)->first(); // Assuming you have a `Patient` model
        if (!empty($data['clinic'])) {
            return response()->json([
                'clinicName' => $data['clinic']->name,
                'clinicPhone' => $data['clinic']->phone_no,
                'clinicEmail' => $data['clinic']->email,
                'clinicAddress' => $data['clinic']->address,
            ]);
        } else {
            return response()->json(['error' => 'Clinic not found'], 404);
        }
    }


}
