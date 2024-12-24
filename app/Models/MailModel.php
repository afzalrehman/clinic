<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{
    public $table = 'mails';

    protected $fillable = [
        'to',
        'created_id',
        'clinic_id',
        'cc',
        'subject',
        'message',
    ];

     public static function getemail()
    {
        $return = self::select('mails.*' , 'users.username as username' , 'users.role as userRole' , 'users.email as useremail' , 'users.profile as userprofile')->join('users' , 'users.id' , 'mails.to')->where('mails.status' , 'Active')->where('mails.to', '!=', 0)->where('mails.to', '!=', 1)->where('mails.created_id', '=', Auth::user()->id)
            
            ->where('mails.clinic_id', Auth::user()->clinic_id);
        return $return->orderBy('mails.id', 'DESC')->get();
    }
     public static function supergetemail()
    {
        $return = self::select('mails.*')->where('mails.status' , 'Active')
            ->where('mails.created_id', Auth::user()->id); 
        return $return ->orderBy('mails.id', 'DESC')->get();
    }
    
     public static function getemailtrash()
    {
        $return = self::select('mails.*' , 'users.username as username' , 'users.role as userRole' , 'users.email as useremail' , 'users.profile as userprofile')->join('users' , 'users.id' , 'mails.to')->where('mails.status' , 'In Active')->where('mails.to', '!=', 0)->where('mails.to', '!=', 1)->where('mails.created_id', '=', Auth::user()->id)
           ->where('mails.clinic_id', Auth::user()->clinic_id);
        return $return->orderBy('mails.id', 'DESC')->get();
    }
     public static function supergetemailtrash()
    {
        $return = self::select('mails.*')->where('mails.status' , 'In Active')
        ->where('mails.created_id', Auth::user()->id); 
        return $return->orderBy('mails.id', 'DESC')->get();
    }

   
    

    
    
}
