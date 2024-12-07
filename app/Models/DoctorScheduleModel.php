<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorScheduleModel extends Model
{
    public $table = 'doctorschedule';

    static public function DoctorSchedule($request)
    {
        // Start the query and include the department name
        $query = self::select('doctorschedule.*', 'department.name as department_name', 'doctor.name as doctor_name' , 'doctor.avatar as doctorprofile')
            ->join('department', 'doctorschedule.department_id', '=', 'department.id')->join('doctor', 'doctorschedule.doctor_id', '=', 'doctor.id')
            ->orderBy('doctorschedule.id', 'DESC');

        // Apply search filters dynamically
        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('doctorschedule.name', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.available_days', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.from', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.to', 'like', '%' . $search . '%')
                    ->orWhere('doctorschedule.notes', 'like', '%' . $search . '%');
            });
        }

        // Execute the query and return the results
        return $query->get();
    }

    public function doctorprofile()
    {
       if ($this->doctorprofile) {
          return asset('upload/img/doctor/' . $this->doctorprofile);
       }
       return asset('asset/img/user.jpg');
    }
 
}
