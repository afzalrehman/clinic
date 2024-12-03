<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function mail_index(){
        return view('admin.mail.compose');
    }

    public function mail_inbox(){
        return view('admin.mail.inbox');
    }

    public function mail_mail_view(){
        return view('admin.mail.mail_view');
    }
    
}
