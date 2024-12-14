<?php

namespace App\Models;

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
    ];
}
