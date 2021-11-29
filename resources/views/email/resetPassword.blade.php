@component('mail::message')
# Change password Request

Click on the button below to change password

@component('mail::button', ['url' => 'http://localhost:4200/#/response-password?token='.$token])
Reset Password
@endcomponent
@component('mail::button', ['url' => 'https://airpay-inf.herokuapp.com/#/response-password?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
