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
}
