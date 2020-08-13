@component('mail::message')
# Dear User

You can verify your e-mail adress by pressing button under this text

@component('mail::button', ['url' => $generatedUrl])
Activate
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent