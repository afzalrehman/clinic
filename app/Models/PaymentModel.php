<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    public $table = 'payment';

    protected $fillable = [
        'payment_number',
        'payment_date',
        'patient_id',
        'patient_name',
        'mobile',
        'doctor_id',
        'total_amount',
        'discount',
        'payment_method',
        'payment_status',
        'other_info',
        'created_id',
    ];

    public static function getAmmount($request)
    {
        $query = self::with(['patient', 'doctor'])
            ->select(
                'payment.*',
                'patient.name as patient_name',
                'patient.lastname as patient_lastname',
                'patient.profile_photo as patient_image',
                'patient.mobile as patient_mobile',
                'patient.email as patient_email',
                'doctor.name as doctor_name',
                'doctor.lastname as doctor_lastname',
                'department.name as department_name'
            )->where('payment.created_id' , Auth::user()->user_id)
            ->join('patient', 'patient.cnic', '=', 'payment.patient_id')
            ->join('doctor', 'doctor.cnic', '=', 'payment.doctor_id');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('patient.lastname', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.lastname', 'like', '%' . $search . '%')
                    ->orWhere('patient.mobile', 'like', '%' . $search . '%')
                    ->orWhere('payment.treatment', 'like', '%' . $search . '%')
                    ->orWhere('payment.appointment_date', 'like', '%' . $search . '%')
                    ->orWhere('payment.from_time', 'like', '%' . $search . '%')
                    ->orWhere('payment.to_time', 'like', '%' . $search . '%');
            });
        }

        return $query->orderBy('payment.id', 'DESC')->where('payment.created_id' , Auth::user()->user_id)->get();
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

    public function getImage()
    {
       if ($this->profile_photo) {
          return asset('upload/img/patient/' . $this->profile_photo);
       }
       return asset('assets/img/user.jpg');
    }
}
