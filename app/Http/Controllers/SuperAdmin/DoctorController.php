<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\DoctorModel;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function superadmin_doctor(Request $request)
    {
        $data['doctor_data'] = DoctorModel::doctorData($request);
        return view('super_admin.doctor.list', $data);
    }
}
