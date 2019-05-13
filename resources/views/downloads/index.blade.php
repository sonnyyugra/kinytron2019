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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO MODULOS KINYTRON </div>

                    <div class="card-body" align="center">
                        <a href="{{asset('/videojuegos/historia/Modulos Kinytron_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/historia/Modulos Kinytron_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO TEST AUTOESTIMA</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/tests/autoestima/Test Autoestima_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/tests/autoestima/Test Autoestima_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO TEST CLIMA ESCOLAR</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/tests/clima_escolar/Test Clima Escolar_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/tests/clima_escolar/Test Clima Escolar_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO CUESTIONARIO TRABAJO EN EQUIPO</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/Cuestionario Trabajo en Equipo_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/Cuestionario Trabajo en Equipo_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO CUESTIONARIO COMUNICACIÓN ASERTIVA</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/Cuestionario Comunicacion Asertiva_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/Cuestionario Comunicacion Asertiva_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO CUESTIONARIO EMPATÍA</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/cuestionarios/empatia/Cuestionario Empatia_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/empatia/Cuestionario Empatia_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO CUESTIONARIO DISCIPLINA</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/Cuestionario Disciplina_Win_x86.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/Cuestionario Disciplina_Win_x64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="#" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="#" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection