@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-video"></i> Videotutoriales
                        <small></small>
                    </div>
                    <div class="card-body">
                        <div id="accordion" role="tablist">
                            <div class="card mb-0">
                                <div class="card-header" id="headingOne" role="tab">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">¿QUÉ ES EL MÉTODO KINYTRON?</a>
                                    </h5>
                                </div>
                                <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <video src="{{asset('video/tutoriales/explicar_metodo.mp4')}}" poster="{{asset('img/perfil.jpg')}}" controls width="640" height="360"></video>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingTwo" role="tab">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">PANTALLA DE INICIO</a>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <video src="{{asset('video/tutoriales/pantalla_inicio.mp4')}}" poster="{{asset('img/perfil.jpg')}}" controls width="640" height="360"></video>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingThree" role="tab">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">¿CÓMO REALIZAR UNA MEDICIÓN?</a>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <video src="{{asset('video/tutoriales/medicion.mp4')}}" poster="{{asset('img/perfil.jpg')}}" controls width="640" height="360"></video>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingFour" role="tab">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">¿CÓMO EVALUAR UN TALLER?</a>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <video src="{{asset('video/tutoriales/evaluar_taller.mp4')}}" poster="{{asset('img/perfil.jpg')}}" controls width="640" height="360"></video>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingFive" role="tab">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">¿CÓMO ENVIAR UNA SUGERENCIA?</a>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseFive" role="tabpanel" aria-labelledby="headingFive" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <video src="{{asset('video/tutoriales/enviar_sugerencia.mp4')}}" poster="{{asset('img/perfil.jpg')}}" controls width="640" height="360"></video>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingSix" role="tab">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">¿CÓMO DESCARGAR LOS VIDEOJUEGOS?</a>
                                    </h5>
                                </div>
                                <div class="collapse" id="collapseSix" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <video src="{{asset('video/tutoriales/descarga_videojuego.mp4')}}" poster="{{asset('img/perfil.jpg')}}" controls width="640" height="360"></video>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>            </div>
        </div>
    </div>

@endsection