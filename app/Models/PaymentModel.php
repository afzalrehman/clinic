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
                'patient.profile_photo as patient_image',
                'patient.mobile as patient_mobile',
                'patient.email as patient_email',
                'doctor.name as doctor_name',
            )->where('payment.created_id', Auth::user()->id)->where('payment.clinic_id', Auth::user()->clinic_id)
            ->join('patient', 'patient.cnic', '=', 'payment.patient_id')
            ->join('doctor', 'doctor.cnic', '=', 'payment.doctor_id');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('payment.payment_date', 'like', '%' . $search . '%')
                    ->orWhere('payment.payment_status', 'like', '%' . $search . '%')
                ;
            });
        }

        // Filter by Payment Status
        if (!empty($request->get('payment_status'))) {
            $query->where('payment.payment_status', $request->get('payment_status'));
        }

        // Filter by From Date
        if (!empty($request->get('from_date'))) {
            $query->where('payment.payment_date', '>=', $request->get('from_date'));
        }

        // Filter by To Date
        if (!empty($request->get('to_date'))) {
            $query->where('payment.payment_date', '<=', $request->get('to_date'));
        }

        return $query->orderBy('payment.id', 'DESC')->where('payment.created_id', Auth::user()->id)->get();
    }
    public static function getpatientAmmount($request)
    {
        $query = self::with(['patient', 'doctor'])
            ->select(
                'payment.*',
                'patient.name as patient_name',
                'patient.profile_photo as patient_image',
                'patient.mobile as patient_mobile',
                'patient.email as patient_email',
                'doctor.name as doctor_name',
            )->where('payment.patient_id', Auth::user()->user_id)
            ->join('patient', 'patient.cnic', '=', 'payment.patient_id')
            ->join('doctor', 'doctor.cnic', '=', 'payment.doctor_id');

        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('patient.name', 'like', '%' . $search . '%')
                    ->orWhere('doctor.name', 'like', '%' . $search . '%')
                    ->orWhere('payment.payment_date', 'like', '%' . $search . '%')
                    ->orWhere('payment.payment_status', 'like', '%' . $search . '%')
                ;
            });
        }

        // Filter by Payment Status
        if (!empty($request->get('payment_status'))) {
            $query->where('payment.payment_status', $request->get('payment_status'));
        }

        // Filter by From Date
        if (!empty($request->get('from_date'))) {
            $query->where('payment.payment_date', '>=', $request->get('from_date'));
        }

        // Filter by To Date
        if (!empty($request->get('to_date'))) {
            $query->where('payment.payment_date', '<=', $request->get('to_date'));
        }

        return $query->orderBy('payment.id', 'DESC')->where('payment.patient_id', Auth::user()->user_id)->get();
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
