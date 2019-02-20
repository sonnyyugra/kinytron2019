@component('mail::message')

    Hola {{$data->name}}, nos contactaremos con usted a la brevedad. Muchas gracias por su paciencia.

@component('mail::button', ['url' => 'https://blog.kinytron.com'])
    Blog
@endcomponent

Gracias, <br>
{{ config('app.name') }}
@endcomponent
