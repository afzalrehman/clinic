<?php

namespace App\Models;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
   public $table = "doctor";

   static public function doctorData($request)
   {
       // Start the query and include the department name
       $query = self::select('doctor.*', 'department.name as department_name')
           ->join('department', 'doctor.department_id', '=', 'department.id')
           ->where('doctor.clinic_id', Auth::user()->clinic_id);
   
       // Apply search filters dynamically
       if (!empty($request->get('search'))) {
           $search = $request->get('search');
           $query->where(function ($q) use ($search) {
               $q->whereRaw("CONCAT(doctor.name, ' ', doctor.lastname) LIKE ?", ["%$search%"])
                   ->orWhere('doctor.name', 'like', "%$search%")
                   ->orWhere('department.name', 'like', "%$search%")
                   ->orWhere('doctor.designation', 'like', "%$search%")
                   ->orWhere('doctor.education', 'like', "%$search%")
                   ->orWhere('doctor.mobile', 'like', "%$search%")
                   ->orWhere('doctor.email', 'like', "%$search%");
           });
       }
   
       // Add sorting and fetch the data
       return $query->orderBy('doctor.id', 'DESC')->get();
   }
   
   public function Department()
   {
      return $this->belongsTo(DepartmentModel::class);
   }
   public function Schedule()
   {
      return $this->belongsTo(DoctorScheduleModel::class);
   }

   public function getImage()
   {
      if ($this->avatar) {
         return asset('upload/img/doctor/' . $this->avatar);
      }
      return asset('assets/img/user.jpg');
   }



}
