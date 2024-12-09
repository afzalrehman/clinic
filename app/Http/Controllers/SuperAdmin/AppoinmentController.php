<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\AppoinmentModel;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    public function superadmin_appoinment_index(Request $request)
    {
        $data['appoinment_list'] = AppoinmentModel::getappoinment($request);
        return view('admin.appoinment.list', $data);
    }


}
