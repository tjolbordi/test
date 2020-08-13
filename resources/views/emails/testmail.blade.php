@component('mail::message')
# Dear {{ Auth()->user()->name }}

You can activate your account by pressing button under this text

@component('mail::button', ['url' => 'http://127.0.0.1:8000/store'])
Activate
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent