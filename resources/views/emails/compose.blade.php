@component('mail::message')
# {{ $mail->subject }}

{!! $mail->message !!} <!-- Corrected Syntax for Raw HTML Rendering -->

@component('mail::button', ['url' => 'https://muhammadafzal.com'])
Visit Our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
