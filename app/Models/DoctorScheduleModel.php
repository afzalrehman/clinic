<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class DoctorScheduleModel extends Model
{
    public $table = 'doctorschedule';

    static public function DoctorSchedule($request)
    {
        // Start the query and include the department name
        $query = self::select('doctorschedule.*', 'department.name as department_name', 'doctor.name as doctor_name' , 'doctor.avatar as doctorprofile')
            ->join('department', 'doctorschedule.department_id', '=', 'department.id')->join('doctor', 'doctorschedule.doctor_id', '=', 'doctor.mobile')
           
            ->where('doctorschedule.clinic_id', Auth::user()->clinic_id);

        // Apply search filters dynamically
        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('department.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.available_days', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.from', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.to', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.notes', 'like', '%' . $search . '%');
            });
        }

        // Execute the query and return the results
        return $query ->orderBy('doctorschedule.id', 'DESC')->get();
    }

    public function doctorprofile()
    {
       if ($this->doctorprofile) {
          return asset('upload/img/doctor/' . $this->doctorprofile);
       }
       return asset('asset/img/user.jpg');
    }

    public function doctor(){
        return $this->belongsTo(DoctorModel::class);
    }
    public function Department(){
        return $this->belongsTo(DepartmentModel::class);
    }
 
    public function getImage()
    {
       if ($this->avatar) {
          return asset('upload/img/doctor/' . $this->avatar);
       }
       return asset('assets/img/user.jpg');
    }
}
