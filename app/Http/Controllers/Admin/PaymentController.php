<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $data['doctors'] = DoctorModel::where('status', '=', 'Active')->get();
        $data['departments'] = DepartmentModel::where('status', '=', 'Active')->get();
        return view('admin.payment.list');
    }


    public function payment_create()
    {
        return view('admin.payment.add');
    }
}
