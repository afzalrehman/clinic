<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppoinmentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $department_id;
    public $doctor_id;
    public  $patient;

    /**
     * Create a new message instance.
     */
    public function __construct($data , $department_id , $doctor_id , $patient)
    {
        $this->data = $data;
        $this->department_id = $department_id;
        $this->doctor_id = $doctor_id;
        $this->$patient = $patient;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Appoinment Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.appoinment_mails',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
