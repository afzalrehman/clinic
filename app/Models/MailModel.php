<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{
    public $table = 'mails';

    protected $fillable = [
        'to',
        'cc',
        'subject',
        'message',
    ];

     public static function getemail()
    {
        $return = self::select('mails.*' , 'users.username as username' , 'users.role as userRole' , 'users.email as useremail')->join('users' , 'users.id' , 'mails.to')->where('mails.status' , 'Active')
            ->orderBy('mails.id', 'DESC'); 
        return $return->get();
    }
     public static function supergetemail()
    {
        $return = self::select('mails.*' , 'users.username as username' , 'users.role as userRole' , 'users.email as useremail')->join('users' , 'users.id' , 'mails.to')->where('mails.status' , 'Active')
            ->orderBy('mails.id', 'DESC'); 
        return $return->get();
    }
    
     public static function getemailtrash()
    {
        $return = self::select('mails.*' , 'users.username as username' , 'users.role as userRole' , 'users.email as useremail')->join('users' , 'users.id' , 'mails.to')->where('mails.status' , 'In Active')
            ->orderBy('mails.id', 'DESC'); 
        return $return->get();
    }
     public static function supergetemailtrash()
    {
        $return = self::select('mails.*' , 'users.username as username' , 'users.role as userRole' , 'users.email as useremail')->join('users' , 'users.id' , 'mails.to')->where('mails.status' , 'In Active')
            ->orderBy('mails.id', 'DESC'); 
        return $return->get();
    }
    
    
}
