<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    public $table = "patient";


    static public function patientData($request)
    {
        $return = self::orderBy('id', 'DESC');

        $search = $request->get('search');
        if (!empty($search)) {
            $return = $return->where(function ($query) use ($search) {
                $query->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('patient.lastname', 'like', '%' . $search . '%')
                    ->orWhere(DB::raw("CONCAT(patient.name, ' ', patient.lastname)"), 'like', '%' . $search . '%')
                    ->orWhere('patient.department', 'like', '%' . $search . '%')
                    ->orWhere('patient.blood_group', 'like', '%' . $search . '%')
                    ->orWhere('patient.chronic_illnesses', 'like', '%' . $search . '%')
                    ->orWhere('patient.mobile', 'like', '%' . $search . '%')
                    ->orWhere('patient.email', 'like', '%' . $search . '%');
            });
        }

        return $return->get();
    }


    public function getImage()
    {
       if ($this->profile_photo) {
          return asset('upload/img/patient/' . $this->profile_photo);
       }
       return asset('asset/img/user.jpg');
    }
}
