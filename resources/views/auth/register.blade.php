@extends('layouts.auth')

@section('auth')
    <div class="col-md-6">
        <div class="card mx-4">
            @if(Session::has('msg'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Gracias!</h4>
                    Ahora te invitamos a visitar nuestro blog en donde encontrarás información que te puede interesar.
                    <p align="center">
                        <a style="text-decoration: none" href="https://blog.kinytron.com/" class="btn btn-warning" role="button">VISITAR BLOG</a>
                    </p>
                </div>
            @endif
            <div class="card-body p-4">
                <h1>{{ __('Demo') }}</h1>
                <p class="text-muted">Conozcámonos</p>

                <form action="{{ url('/contact') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                        </div>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="{{ __('Nombre') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-graduation"></i>
                        </span>
                        </div>
                        <input id="cargo" type="text" class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo" value="{{ old('cargo') }}"  placeholder="{{ __('Cargo') }}" required autofocus>

                        @if ($errors->has('cargo'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cargo') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-home"></i>
                        </span>
                        </div>
                        <input id="colegio" type="text" class="form-control{{ $errors->has('colegio') ? ' is-invalid' : '' }}" name="colegio" value="{{ old('colegio') }}"  placeholder="{{ __('Colegio') }}" required autofocus>

                        @if ($errors->has('colegio'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('colegio') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-phone"></i>
                        </span>
                        </div>
                        <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}"  placeholder="{{ __('Telefono') }}" required autofocus>

                        @if ($errors->has('telefono'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span>
                        @endif
                    </div>



                    <button type="submit" class="btn btn-block btn-success btn-primary">
                        {{ __('Enviar') }}
                    </button>
                </form>
            </div>
            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-primary btn-block" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
