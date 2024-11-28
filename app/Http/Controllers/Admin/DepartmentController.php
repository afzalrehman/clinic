<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function admin_department(){
        return view('admin.department.list');
    }
    public function admin_department_create(){
        return view('admin.department.add');
    }
}
