@component('mail::message')

<!-- Logo Section -->

# Reset Your Password, {{ $user->name }}

We received a request to reset your password. If you made this request, please click the button below to reset your password.

@component('mail::button', ['url' => url('reset-password', $user->remember_token)])
Reset Your Password
@endcomponent

If you did not request a password reset, no action is required. For any issues or further assistance, please feel free to contact our support team.

Thanks & Regards,  
**{{ config('app.name') }} Team**

@endcomponent
