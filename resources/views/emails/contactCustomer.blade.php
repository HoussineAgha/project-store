@component('mail::message')
# New Message

You have a new message from a client

@component('mail::button', ['url' => 'http://127.0.0.1:8000/contact-us/contact-us'])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
