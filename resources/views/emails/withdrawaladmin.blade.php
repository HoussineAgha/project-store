@component('mail::message')
# Hi Admin

You have a new withdrawal request, please review it

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/all-Withdrawal'])
View withdrawal request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
