<?php

namespace App\Models;

use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    public $table = "patient";

    protected $fillable = [
        'name',
        'clinic_id',
        'fill_form',
        'mobile',
    ];
    static public function patientData($request)
    {
        $return = self::where('patient.clinic_id', Auth::user()->clinic_id);

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

        return $return->orderBy('id', 'DESC')->get();
    }


    public function getImage()
    {
        if ($this->profile_photo) {
            return asset('upload/img/patient/' . $this->profile_photo);
        }
        return asset('assets/img/user.jpg');
    }
}
