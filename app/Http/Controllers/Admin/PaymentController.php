<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\PatientModel;
use App\Models\PaymentModel;
use Auth;
use Illuminate\Http\Request;
use Str;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $data['patients'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        $data['Payments'] = PaymentModel::getAmmount($request);
        return view('admin.payment.list' ,$data);
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


    public function payment_store(Request $request)
{
    $request->validate([
        'payment_date' => 'required',
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'total_amount' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'payment_method' => 'required',
        'payment_status' => 'required',
        'other_info' => 'nullable|string',
    ]);

    PaymentModel::create([
        'payment_number' => $request->payment_number, // Include the payment number
        'payment_date' => $request->payment_date,
        'patient_id' => $request->patient_id,
        'doctor_id' => $request->doctor_id,
        'total_amount' => $request->total_amount,
        'discount' => $request->discount,
        'payment_method' => $request->payment_method,
        'payment_status' => $request->payment_status,
        'other_info' => $request->other_info,
        'created_id' => Auth::user()->id,
    ]);

    return redirect()->route('admin.payment')->with('success', 'Payment added successfully!');
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
