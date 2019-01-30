@component('mail::message')
    Hola {{$data->nombre}}, nos comunicaremos con usted a la brevedad posible mientras puedes visitar nuestro blog.

    @component('mail::button', ['url' => 'https://blog.kinytron.com'])
        Click!
    @endcomponent

    Gracias,<br>
    Kinytron Staff
@endcomponent
