<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function superadmin_department(Request $request)
    {
        $data['department_data'] = DepartmentModel::DepartmentData($request);
        return view('super_admin.department.list' , $data);
    }
}
