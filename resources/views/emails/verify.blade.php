@component('mail::message')

<!-- Logo Section -->

# Welcome to {{ config('app.name') }}, {{ $user->name }}!

Thank you for registering with us. To complete your account setup, please verify your email address.

@component('mail::button', ['url' => url('verify-email', $user->remember_token)])
Verify Email
@endcomponent

If you encounter any issues while verifying your email or have questions, feel free to contact us for assistance.

Thanks & Regards,  
**{{ config('app.name') }} Team**

@endcomponent
