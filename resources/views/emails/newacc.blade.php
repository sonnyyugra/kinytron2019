@component('mail::message')
    Hola {{$data->name}}, le hemos creado una cuenta de Tutor en nuestra plataforma, recuerda que puedes solicitar asistencia técnica y profesional sobre todo lo relacionado a nuestra plataforma en cualquier momento enviando un correo a contacto@kinytron.com
    <br><br>
    Usuario     : {{$data->email}}<br>
    Contraseña  : {{$data->password}}<br>
@component('mail::button', ['url' => 'https://www.kinytron.com/login'])
Ingresar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
