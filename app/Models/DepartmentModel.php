<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
   public $table = "department";

   static public function DepartmentData($request)
   {
       $query = self::select('department.*')->orderBy('id', 'DESC');
   
       if (!empty($request->get('search'))) {
           $search = $request->get('search');
           $query->where(function ($q) use ($search) {
               $q->where('department.name', 'like', '%' . $search . '%')
                 ->orWhere('department.head', 'like', '%' . $search . '%')
                 ->orWhere('department.status', 'like', '%' . $search . '%');
           });
       }
   
       return $query->get();
   }
   
}
