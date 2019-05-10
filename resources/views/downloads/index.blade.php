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
                        <a href="{{asset('/videojuegos/historia/win32.7z')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/historia/win64.7z')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/historia/linux32.7z')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/historia/linux64.7z')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/historia/macosx.7z')}}" class="btn btn-secondary">
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

                        <a href="{{asset('/videojuegos/tests/autoestima/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/tests/autoestima/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/tests/autoestima/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/tests/autoestima/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/tests/autoestima/macosx.zip')}}" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO CLIMA ESCOLAR</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/tests/clima_escolar/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/tests/clima_escolar/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/tests/clima_escolar/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/tests/clima_escolar/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/tests/clima_escolar/macosx.zip')}}" class="btn btn-secondary">
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

                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/trabajo_en_equipo/macosx.zip')}}" class="btn btn-secondary">
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

                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/comunicacion_asertiva/macosx.zip')}}" class="btn btn-secondary">
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

                        <a href="{{asset('/videojuegos/cuestionarios/empatia/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/empatia/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/empatia/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/empatia/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/empatia/macosx.zip')}}" class="btn btn-secondary">
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

                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/cuestionarios/disciplina/macosx.zip')}}" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection