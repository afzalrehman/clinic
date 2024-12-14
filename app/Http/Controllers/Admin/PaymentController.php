<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\PatientModel;
use Illuminate\Http\Request;
use Str;

class PaymentController extends Controller
{
    public function payment()
    {
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        return view('admin.payment.list');
    }


    public function payment_create()
    {
        $data['paymentNumber'] = 'PAY-' . strtoupper(Str::random(6));
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        return view('admin.payment.add', $data);
    }

    public function getPatientDetails($id)
    {
        $patient = PatientModel::where( 'cnic', '=',$id)->first(); // Assuming you have a `Patient` model
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
