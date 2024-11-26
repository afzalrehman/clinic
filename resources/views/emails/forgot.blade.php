@component('mail::message')

<!-- Logo Section -->

# Welcome, {{ $user->name }}

<p>w understand it happens.</p>

@component('mail::button', ['url' => url('reset-password', $user->remember_token)])
Reset your password
@endcomponent

<p>In case you have any issues recovering your password , please contact us</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
