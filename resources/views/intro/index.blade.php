@extends('layouts.auth')

@section('auth')
    <div class="col-md-8">
        <div class="card-group">
            <div class="card">
                <div class="card-body p-5">
                    <div class="text-center">
                        <img src="{{asset('img/isotipo.png')}}" class="mb-5" width="120" alt="Kinytron">
                    </div>
                    <h1 align="center">Hola {{ Auth::user()->name }}</h1>
                    <p class="text-muted" align="center">Por favor descarga el archivo y divirtamonos juntos</p>
                    <a href="{{asset('workshops/4/1.pdf')}}" class="btn btn-primary btn-lg" target="_blank" style="margin:20px auto; text-align:center; display:block; width:120px;"> Click Aquí</a>


                </div>
                <div class="card-footer">
                    <div class="col-12 text-right">
                        <a href="/tarea" class="btn btn-success"> Siguiente</a>

                        <!-- <a class="btn btn-outline-primary btn-block mt-3" href="{{ route('register') }}">{{ __('Register') }}</a>  -->
                    </div>
                </div>
            </div>
            {{-- <div class="card text-white bg-success py-5 d-md-down-none">
                <div class="card-body text-center">
                    <div align="center">
                        <img src="{{asset('img/cara.png')}}" class="mb-5" width="190" alt="logo">

                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
