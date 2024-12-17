<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClinicModel extends Model
{
    public $table = 'clinic';
    protected $fillable = [
        'clinic_code',
        'name',
        'address',
        'location_pin',
        'phone_no',
        'website',
        'email',
        'contact_person',
        'is_active',
        'qr_code_path',
        'kiosk_url',
        'created_by',
        'created_at',
    ];

    static public function ClinicData($request)
    {
        $query = self::select('clinic.*')->orderBy('id', 'DESC');
    
        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('clinic.name', 'like', '%' . $search . '%')
                  ->orWhere('clinic.phone_no', 'like', '%' . $search . '%')
                  ->orWhere('clinic.contact_person', 'like', '%' . $search . '%')
                  ->orWhere('clinic.flag', 'like', '%' . $search . '%')
                  ->orWhere('clinic.email', 'like', '%' . $search . '%');
            });
        }
    
        return $query->get();
    }
}
