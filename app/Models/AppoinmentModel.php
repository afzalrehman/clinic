<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class AppoinmentModel extends Model
{
    public $table = 'appointments';

    protected $fillable = [
        'patient_id',
        'department_id',
        'doctor_id',
        'treatment',
        'appointment_date',
        'from_time',
        'to_time',
        'status',
        'notes',
        'file',
    ];



    // Relationships
    public static function getappoinment($request)
    {
        $query = self::with(['patient', 'department', 'doctor']) // Eager load relationships
            ->select('appointments.*');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');

            $query->where(function ($q) use ($search) {
                $q->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('doctor', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('patient', function ($q) use ($search) {
                        $q->where('mobile', 'like', '%' . $search . '%');
                    })
                    ->orWhere('treatment', 'like', '%' . $search . '%')
                    ->orWhere('appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('from_time', 'like', '%' . $search . '%')
                    ->orWhere('to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('id', 'DESC')->get(); // Finalize query
    }
    public static function getdoctorappoinment($request)
    {
        $query = self::with(['patient', 'department', 'doctor']) // Eager load relationships
            ->select('appointments.*')->where('appointments.doctor_id' , Auth::user()->user_id);

        if (!empty($request->get('search'))) {
            $search = $request->get('search');

            $query->where(function ($q) use ($search) {
                $q->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('doctor', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('patient', function ($q) use ($search) {
                        $q->where('mobile', 'like', '%' . $search . '%');
                    })
                    ->orWhere('treatment', 'like', '%' . $search . '%')
                    ->orWhere('appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('from_time', 'like', '%' . $search . '%')
                    ->orWhere('to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('id', 'DESC')->where('appointments.doctor_id' , Auth::user()->user_id)->get(); // Finalize query
    }
    public static function getpatientappoinment($request)
    {
        $query = self::with(['patient', 'department', 'doctor']) // Eager load relationships
            ->select('appointments.*')->where('appointments.patient_id' , Auth::user()->user_id);

        if (!empty($request->get('search'))) {
            $search = $request->get('search');

            $query->where(function ($q) use ($search) {
                $q->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('doctor', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('patient', function ($q) use ($search) {
                        $q->where('mobile', 'like', '%' . $search . '%');
                    })
                    ->orWhere('treatment', 'like', '%' . $search . '%')
                    ->orWhere('appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('from_time', 'like', '%' . $search . '%')
                    ->orWhere('to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('id', 'DESC')->where('appointments.patient_id' , Auth::user()->user_id)->get(); // Finalize query
    }

    public function patient()
    {
        return $this->belongsTo(PatientModel::class);
    }

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class);
    }

    public function doctor()
    {
        return $this->belongsTo(DoctorModel::class);
    }


   
}
