<?php

namespace App\Models;

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
                    ->orWhere('patient.department', 'like', '%' . $search . '%')
                    ->orWhere('patient.blood_group', 'like', '%' . $search . '%')
                    ->orWhere('patient.chronic_illnesses', 'like', '%' . $search . '%')
                    ->orWhere('patient.mobile', 'like', '%' . $search . '%')
                    ->orWhere('patient.email', 'like', '%' . $search . '%');
            });
        }

        return $return->get();
    }

}
