<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Mail\ComposeMail;
use App\Models\MailModel;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
   
    public function superadmin_mail_index()
    
    {
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('to', '!=', 0)->count();
        $data['counttrash'] = MailModel::where('status'  , '=', 'In Active')->where('to', '!=', 0)->count();
        $data['users_admin'] = User::where('role', '=', 1)->get();
        $data['users_doctor'] = User::where('role', '=', 2)->get();
        $data['users_patient'] = User::where('role', '=', 3)->get();
        return view('super_admin.mail.compose', $data);
    }


    public function superadmin_mail_store(Request $request)
    {
        // Validation rules
        $request->validate([
            'to' => 'required',
            'role' => $request->input('role'),
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create the mail entry in the database (if necessary)
        $mail = MailModel::create([
            'to' => $request->input('to'), // Store the recipient's ID
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        $recipientEmail = User::where('id', $request->to)->pluck('email');
        if ($recipientEmail->isEmpty()) {
            return redirect()->back()->withErrors(['to' => 'Invalid recipient']);
        }
        // Send the email
        Mail::to($recipientEmail)->send(new ComposeMail($mail));

        return redirect()->back()->with('success', 'Mail sent and saved successfully!');
    }



    public function superadmin_mail_inbox()
    {
        $data['emails'] = MailModel::supergetemail();
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('to', '!=', 0)->count();
        $data['counttrash'] = MailModel::where('status' , '=' ,'In Active')->where('to', '!=', 0)->count();
        return view('super_admin.mail.inbox', $data);
    }
    public function superadmin_mail_trash()
    {
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('to', '!=', 0)->count();
        $data['counttrash'] = MailModel::where('status'  , '=', 'In Active')->where('to', '!=', 0)->count();

        $data['trashemail'] = MailModel::supergetemailtrash();
        return view('super_admin.mail.trash', $data);
    }

    public function superadmin_mail_mail_view()
    {
        return view('super_admin.mail.mail_view');
    }
    public function superadmin_mail_delete($id)
    {
        $delete = MailModel::find($id);
        $delete->status = 'In Active';
        $delete->save();
        return redirect()->back()->with('error', 'Mail Delete successfully!');
    }
    public function superadmin_trashemail_delete($id)
    {
        $delete = MailModel::find($id);
        $delete->delete();
        return redirect()->back()->with('error', 'Mail Delete successfully!');
    }

}
