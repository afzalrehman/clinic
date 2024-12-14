<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\PatientModel;
use App\Models\PaymentModel;
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
        // Fetch the last payment
        $lastPayment = PaymentModel::orderBy('id', 'desc')->first();

        // Default starting number if no payments exist
        if (!$lastPayment) {
            $data['paymentNumber'] = 'PAY-00001';
        } else {
            // Extract the numeric part of the last payment number
            $lastNumber = (int) Str::after($lastPayment->payment_number, 'PAY-');

            // Increment the number and format it with leading zeros
            $data['paymentNumber']  = 'PAY-' . str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
        }
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        return view('admin.payment.add', $data);
    }

    public function getPatientDetails($id)
    {
        $patient = PatientModel::where('cnic', '=', $id)->first(); // Assuming you have a `Patient` model
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
