<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
   public $table = "department";

   static public function DepartmentData($request)
   {
      $return = self::select('department.*')->orderBy('id', 'DESC')->get();

      if (!empty($request->get('search'))) {
         $return = $return->where('department.name', 'like', '%' . $request->get('search') . '%');
      } 
      elseif (!empty($request->get('search'))) {
         $return = $return->where('department.head', 'like', '%' . $request->get('search') . '%');
      }
      elseif (!empty($request->get('search'))) {
         $return = $return->where('department.status', 'like', '%' . $request->get('search') . '%');
      }
      return $return;
   }
}
