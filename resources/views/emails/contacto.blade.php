@component('mail::message')

    Buenas noticias, tenemos un nuevo lead<br><br>
    NOMBRE: {{$data->name}}<br>
    COLEGIO: {{$data->colegio}}<br>
    TELEFONO: {{$data->telefono}}<br>
    CARGO: {{$data->cargo}}<br>
    EMAIL: {{$data->email}}<br><br>
    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
