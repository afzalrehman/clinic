<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\DoctorScheduleModel;
use Auth;
use Illuminate\Http\Request;
class DoctorScheduleController extends Controller
{
    public function doctor_schedule(Request $request)
    {
        $data['DoctorSchedule'] = DoctorScheduleModel::DoctorSchedule($request);
        return view('clinic.doctor.schedule_list', $data);
    }
    public function doctor_schedule_create()
    {
        $data['doctor'] = DoctorModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['department'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();

        // $data['department'] = DepartmentModel::where('status', '=', 'Active')->get();
        return view('clinic.doctor.schedule_add', $data);
    }
    public function doctor_schedule_store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'department_id' => 'required',
            'available_days' => 'required|array', // Validate as array
            'available_days.*' => 'string', // Each day should be a string
            'from' => 'required|',
            'to' => 'required|after:from',
            'notes' => 'required|string',
            'status' => 'required|in:Active,In Active',
        ]);
        $schedule = new DoctorScheduleModel();
        $schedule->doctor_id = $request->doctor_id;
        $schedule->department_id = $request->department_id;
        $schedule->available_days = implode(',', $request->available_days); // Convert array to comma-separated string
        $schedule->from = $request->from;
        $schedule->to = $request->to;
        $schedule->notes = $request->notes;
        $schedule->status = $request->status;
        $schedule->created_at = date('Y-m-d H:i:s');
        $schedule->clinic_id = Auth::user()->clinic_id;
        $schedule->save();
        // Schedule successfully create hone ke baad redirect karna
        return redirect()->route('admin.doctor_schedule')->with('success', 'Schedule created successfully.');
    }


    public function doctor_schedule_edit($id)
    {
        $data['doctor'] = DoctorModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['department'] = DepartmentModel::where('status', '=', 'Active')->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['DoctorSchedule'] = DoctorScheduleModel::find($id);
        return view('clinic.doctor.schedule_edit', $data);
    }

    public function doctor_schedule_update($id, Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'department_id' => 'required',
            'available_days' => 'required|array', // Validate as array
            'available_days.*' => 'string', // Each day should be a string
            'from' => 'required',
            'to' => 'required|after:from',
            'notes' => 'required|string',
            'status' => 'required|in:Active,In Active',
        ]);
    
        $schedule = DoctorScheduleModel::find($id);
        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.');
        }
    
        $schedule->doctor_id = $request->doctor_id;
        $schedule->department_id = $request->department_id;
        $schedule->available_days = implode(',', $request->available_days); // Convert array to comma-separated string
        $schedule->from = $request->from;
        $schedule->to = $request->to;
        $schedule->notes = $request->notes;
        $schedule->status = $request->status;
        $schedule->updated_at = date('Y-m-d H:i:s');
        $schedule->clinic_id = Auth::user()->clinic_id;
        $schedule->save();
    
        // Redirect with success message
        return redirect()->route('clinic.doctor_schedule')->with('success', 'Schedule updated successfully.');
    }
    

    public function doctor_schedule_delete($id)
    {
        $delete = DoctorScheduleModel::find($id);
        if (!$delete) {
            return redirect()->back()->with('error', 'DoctorSchedule not found.');
        }
        $delete->delete();
        return redirect()->back()->with('error', 'DotorSchedule deleted successfully.');
    }
}
