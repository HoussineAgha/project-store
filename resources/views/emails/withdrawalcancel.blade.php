@component('mail::message')
# Hello

Your withdrawal request has been rejected. Contact us to find out the reasons and problems related to your withdrawal request.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/Withdrawal/request'])
view withdrawal status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
