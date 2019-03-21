@extends('layouts.auth')

@section('auth')
    <div class="col-md-8">
        <div class="card-group">
            <div class="card">
                <div class="card-body p-5">
                    <div class="text-center d-lg-none">
                        <img src="{{asset('img/isotipo.png')}}" class="mb-5" width="120" alt="Kinytron">
                    </div>
                    <h1 align="center">{{ __('Login') }}</h1>
                    <p class="text-muted" align="center">Accede a tu cuenta</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                            </div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Contraseña') }}" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-success px4">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                            <!--
                            <div class="col-8 text-right">
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                            -->
                        </div>
                    </form>
                </div>
                <div class="card-footer p-4 d-lg-none">
                    <div class="col-12 text-right">
                        <!-- <a class="btn btn-outline-primary btn-block mt-3" href="{{ route('register') }}">{{ __('Register') }}</a>  -->
                    </div>
                </div>
            </div>
            <div class="card text-white bg-success py-5 d-md-down-none">
                <div class="card-body text-center">
                    <div align="center">
                        <img src="{{asset('img/cara.png')}}" class="mb-5" width="190" alt="logo">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
