<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ComposeMail;
use App\Models\DoctorModel;
use App\Models\MailModel;
use App\Models\PatientModel;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as MailFacade;
class MailController extends Controller
{

    public function mail_index()
    
    {
        $data['mail'] = MailModel::where('created_id', Auth::user()->id)->get();
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        $data['counttrash'] = MailModel::where('status'  , '=', 'In Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        $data['users_doctor'] = User::where('role', '=', 2)->where('clinic_id', Auth::user()->clinic_id)->get();
        $data['users_patient'] = User::where('role', '=', 3)->where('clinic_id', Auth::user()->clinic_id)->get();
        return view('clinic.mail.compose', $data);
    }



    public function mail_store(Request $request)
    {
        // Validation rules
        $request->validate([
            'to' => 'required', 
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create the mail entry in the database (if necessary)
        $mail = MailModel::create([
            'to' => $request->input('to'), // Store the recipient's ID
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_id' => Auth::user()->id,
            'clinic_id' => Auth::user()->clinic_id,
            
        ]);
        $mail['created_at'] = date('Y-m-d H:i:s');

        // Send the email
        MailFacade::to($request->input('to'))->send(new ComposeMail($mail));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }



    public function mail_inbox()
    {
        $data['emails'] = MailModel::getemail();
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        $data['counttrash'] = MailModel::where('status' , '=' ,'In Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        return view('clinic.mail.inbox', $data);
    }
    public function mail_trash()
    {
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        $data['counttrash'] = MailModel::where('status'  , '=', 'In Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();

        $data['trashemail'] = MailModel::getemailtrash();
        return view('clinic.mail.trash', $data);
    }

    public function mail_mail_view($id)
    {
        $data['countinbox'] = MailModel::where('status' , '=', 'Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        $data['counttrash'] = MailModel::where('status'  , '=', 'In Active')->where('created_id', '=', Auth::user()->id)->where('clinic_id', Auth::user()->clinic_id)->count();
        $data['Mails'] = MailModel::find($id);
        return view('clinic.mail.mail_view' , $data);
    }
    public function mail_delete($id)
    {
        $delete = MailModel::find($id);
        $delete->status = 'In Active';
        $delete->save();
        return redirect()->back()->with('error', 'Mail Delete successfully!');
    }
    public function trashemail_delete($id)
    {
        $delete = MailModel::find($id);
        $delete->delete();
        return redirect()->back()->with('error', 'Mail Delete successfully!');
    }

}
