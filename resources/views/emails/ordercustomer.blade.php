@component('mail::message')
Hello

You have a new order

@component('mail::button', ['url' => ''])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
