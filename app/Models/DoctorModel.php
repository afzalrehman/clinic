<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    public $table = "doctor";

    static public function doctorData($request)
    {
       $return = self::select('doctor.*')->orderBy('id', 'DESC')->get();
 
       if (!empty($request->get('search'))) {
          $return = $return->where('doctor.name', 'like', '%' . $request->get('search') . '%');
       } 
       elseif (!empty($request->get('search'))) {
          $return = $return->where('doctor.head', 'like', '%' . $request->get('search') . '%');
       }
       elseif (!empty($request->get('search'))) {
          $return = $return->where('doctor.status', 'like', '%' . $request->get('search') . '%');
       }
       return $return;
    }
}
