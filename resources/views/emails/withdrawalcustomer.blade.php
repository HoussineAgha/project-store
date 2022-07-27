@component('mail::message')
# hello
Your withdrawal request has been sent and your current balance is:
{{$total_blance}}$
@component('mail::button', ['url' => 'http://127.0.0.1:8000/Withdrawal/request'])
view withdrawal status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
