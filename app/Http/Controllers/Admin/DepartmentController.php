<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use Auth;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function admin_department(Request $request)
    {
        $data['department_data'] = DepartmentModel::DepartmentData($request);
        return view('clinic.department.list' , $data);
    }
    public function admin_department_create()
    {
        return view('clinic.department.add');
    }

    public function admin_department_store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'department_name' => 'required|string|max:255|unique:department,name',
            'department_head' => 'required|string|max:255',
            'department_description' => 'required|string',
            'department_date' => 'required',
            'status' => 'required|in:Active,In Active', // Assuming 'gender' here represents status
        ]);


        $department = new DepartmentModel();

        if (!empty($department)) {
            $department->name = $request->department_name;
            $department->head = $request->department_head;
            $department->description = $request->department_description;
            $department->date = $request->department_date;
            $department->status = $request->status; // 'Active' or 'In Active'
            $department->created_at = date('Y-m-d H:i:s');
            $department->clinic_id = Auth::user()->clinic_id;
            $department->save();

            // Redirect with success message
            return redirect('clinic/department')->with('success', 'Department created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create department. Please try again.');
        }
    }


    public function admin_department_edit($id)
    {
        $data['department'] = DepartmentModel::find($id);
        return view('clinic.department.edit' , $data);
    }
    public function admin_department_update($id ,Request $request)
    {
        $department =  DepartmentModel::find($id);
        // Validate the incoming request
        $request->validate([
            'department_name' => 'required|string|max:255|unique:department,name,'. $department->id,
            'department_head' => 'required|string|max:255',
            'department_description' => 'required|string',
            'department_date' => 'required',
            'status' => 'required|in:Active,In Active', // Assuming 'gender' here represents status
        ]);

        if (!empty($department)) {
            $department->name = $request->department_name;
            $department->head = $request->department_head;
            $department->description = $request->department_description;
            $department->date = $request->department_date;
            $department->status = $request->status; // 'Active' or 'In Active'
            $department->updated_at = date('Y-m-d H:i:s');
            $department->clinic_id = Auth::user()->clinic_id;
            $department->save();

            // Redirect with success message
            return redirect('clinic/department')->with('success', 'Department Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to Updated department. Please try again.');
        }
    }
    public function admin_department_delete($id)
    {
        // Find the user by ID
        $Department = DepartmentModel::find($id);
        if (!$Department) {
            return redirect()->back()->with('error', 'Failed to Delete department. Please try again');
        }
        $Department->delete();

        return redirect()->back()->with('error', 'Department Delete successfully');
    }



}
