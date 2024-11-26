<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function superadmin_index()
    {
        return view('super_admin.dashboard');
    }
    public function superadmin_user()
    {
        return view('super_admin.user.list');
    }
}
