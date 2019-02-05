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
                    <div class="card-header" align="center">VIDEOJUEGO MÉTODO KINYTRON</div>

                    <div class="card-body" align="center">
                        <a href="{{asset('/versions/win32.7z')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x32
                        </a>
                        <a href="{{asset('/versions/win64.7z')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/versions/linux32.7z')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/versions/linux64.7z')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/versions/macosx.7z')}}" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" align="center">VIDEOJUEGO ESCALA DE CLIMA ESCOLAR</div>

                    <div class="card-body" align="center">

                        <a href="{{asset('/videojuegos/clima_escolar/win32.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i>
                            Windows x32
                        </a>
                        <a href="{{asset('/videojuegos/clima_escolar/win64.zip')}}" class="btn btn-primary">
                            <i class="fab fa-windows"></i> Windows x64
                        </a>
                        <a href="{{asset('/videojuegos/clima_escolar/linux32.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x32
                        </a>
                        <a href="{{asset('/videojuegos/clima_escolar/linux64.zip')}}" class="btn btn-warning">
                            <i class="fab fa-linux"></i> Linux x64
                        </a>
                        <a href="{{asset('/videojuegos/clima_escolar/macosx.zip')}}" class="btn btn-secondary">
                            <i class="fab fa-apple"></i> Mac OsX
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection