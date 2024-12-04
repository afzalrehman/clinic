<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ComposeMail;
use App\Models\DoctorModel;
use App\Models\MailModel;
use App\Models\PatientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as MailFacade;
class MailController extends Controller
{

    public function mail_index()
    {
        $data['patient'] = PatientModel::where('status', '=', 'Active')->get();
        $data['doctor'] = DoctorModel::where('status', '=', 'Active')->get();
        return view('admin.mail.compose', $data);
    }


    public function mail_store(Request $request)
    {
        // Validation rules
        $request->validate([
            'to' => 'required|array', // Multiple recipients
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $mail = MailModel::create([
            'to' => json_encode($request->input('to')),
            'cc' => $request->input('cc'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        $recipientEmails = DoctorModel::whereIn('id', $request->to)
            ->pluck('email')
            ->merge(PatientModel::whereIn('id', $request->to)->pluck('email'));
        // Send mail to recipients
        foreach ($recipientEmails as $email) {
            MailFacade::to($email)->cc($request->cc)->send(new ComposeMail($mail));
        }

        return redirect()->back()->with('success', 'Mail sent and saved successfully!');
    }


    public function mail_inbox()
    {
        return view('admin.mail.inbox');
    }

    public function mail_mail_view()
    {
        return view('admin.mail.mail_view');
    }

}
