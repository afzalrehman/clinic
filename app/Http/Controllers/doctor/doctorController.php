<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class doctorController extends Controller
{
    public function doctor_index()
    {
        return view('doctor.dashboard');
    }
}
