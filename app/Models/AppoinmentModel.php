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
        $query = self::with(['patient', 'department', 'doctor'])
            ->select(
                'appointments.*',
                'patient.name as patient_name',
                'patient.lastname as patient_lastname',
                'patient.profile_photo as patient_image',
                'patient.mobile as patient_mobile',
                'patient.email as patient_email',
                'doctor.name as doctor_name',
                'doctor.lastname as doctor_lastname',
                'department.name as department_name'
            )
            ->join('patient', 'patient.cnic', '=', 'appointments.patient_id')
            ->join('doctor', 'doctor.cnic', '=', 'appointments.doctor_id')
            ->join('department', 'department.id', '=', 'appointments.department_id');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('patient.lastname', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.lastname', 'like', '%' . $search . '%')
                    ->orWhere('patient.mobile', 'like', '%' . $search . '%')
                    ->orWhere('appointments.treatment', 'like', '%' . $search . '%')
                    ->orWhere('appointments.appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('appointments.from_time', 'like', '%' . $search . '%')
                    ->orWhere('appointments.to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('appointments.id', 'DESC')->get();
    }

    public static function getdoctorappoinment($request)
    {
        $query = self::with(['patient', 'department', 'doctor'])
            ->select(
                'appointments.*',
                'patient.name as patient_name',
                'patient.lastname as patient_lastname',
                'patient.profile_photo as patient_image',
                'patient.mobile as patient_mobile',
                'patient.email as patient_email',
                'doctor.name as doctor_name',
                'doctor.lastname as doctor_lastname',
                'department.name as department_name'
            )
            ->join('patient', 'patient.cnic', '=', 'appointments.patient_id')
            ->join('doctor', 'doctor.cnic', '=', 'appointments.doctor_id')
            ->join('department', 'department.id', '=', 'appointments.department_id');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('patient.lastname', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.lastname', 'like', '%' . $search . '%')
                    ->orWhere('patient.mobile', 'like', '%' . $search . '%')
                    ->orWhere('appointments.treatment', 'like', '%' . $search . '%')
                    ->orWhere('appointments.appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('appointments.from_time', 'like', '%' . $search . '%')
                    ->orWhere('appointments.to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('appointments.id', 'DESC')->get();
    }
    public static function getpatientappoinment($request)
    {
        $query = self::with(['patient', 'department', 'doctor'])
            ->select(
                'appointments.*',
                'patient.name as patient_name',
                'patient.lastname as patient_lastname',
                'patient.profile_photo as patient_image',
                'patient.mobile as patient_mobile',
                'patient.email as patient_email',
                'doctor.name as doctor_name',
                'doctor.lastname as doctor_lastname',
                'department.name as department_name'
            )
            ->join('patient', 'patient.cnic', '=', 'appointments.patient_id')
            ->join('doctor', 'doctor.cnic', '=', 'appointments.doctor_id')
            ->join('department', 'department.id', '=', 'appointments.department_id');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('patient.lastname', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.lastname', 'like', '%' . $search . '%')
                    ->orWhere('patient.mobile', 'like', '%' . $search . '%')
                    ->orWhere('appointments.treatment', 'like', '%' . $search . '%')
                    ->orWhere('appointments.appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('appointments.from_time', 'like', '%' . $search . '%')
                    ->orWhere('appointments.to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('appointments.id', 'DESC')->get();
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
