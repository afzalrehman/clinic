<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    public function appoinment_index()
    {
        return view('admin.appoinment.list');
    }
    public function appoinment_create()
    {
        return view('admin.appoinment.add');
    }
}
