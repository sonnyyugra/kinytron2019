@component('mail::message')
    Buenas noticias, tenemos un nuevo lead<br><br>

    NOMBRE: {{$data->nombre}}<br>
    COLEGIO: {{$data->colegio}}<br>
    PAIS: {{$data->pais}}<br>
    CANTIDAD DE ALUMNOS: {{$data->cantidad}}<br>
    TELEFONO: {{$data->telefono}}<br>
    CARGO: {{$data->cargo}}<br>
    EMAIL: {{$data->email}}<br>


    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
