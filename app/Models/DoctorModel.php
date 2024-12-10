<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
   public $table = "doctor";

   static public function doctorData($request)
   {
      // Start the query and include the department name
      $query = self::select('doctor.*', 'department.name as department_name')
         ->join('department', 'doctor.department_id', '=', 'department.id')
         ->orderBy('doctor.id', 'DESC');

      // Apply search filters dynamically
      if (!empty($request->get('search'))) {
         $search = $request->get('search');
         $query->where(function ($q) use ($search) {
            $q->where('doctor.name', 'like', '%' . $search . '%')
               ->orWhere('department.name', 'like', '%' . $search . '%')
               ->orWhere('doctor.designation', 'like', '%' . $search . '%')
               ->orWhere('doctor.education', 'like', '%' . $search . '%')
               ->orWhere('doctor.mobile', 'like', '%' . $search . '%')
               ->orWhere('doctor.email', 'like', '%' . $search . '%');
         });
      }

      // Execute the query and return the results
      return $query->get();
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
      return asset('asset/img/user.jpg');
   }



}
