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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Enviar reclamo, sugerencia o felicitación
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('message'))
                        @if(Session::get('message') == 'editar')
                            <div class="alert alert-warning" role="alert">Elemento editado correctamente</div>
                        @endif
                        @if(Session::get('message') == 'eliminar')
                            <div class="alert alert-danger" role="alert">Elemento eliminado correctamente</div>
                        @endif
                        @if(Session::get('message') == 'agregar')
                            <div class="alert alert-success" role="alert">Elemento agregado correctamente</div>
                        @endif
                    @endif

                    <div class="card-body">
                        {!! Form::open(['route' => 'suggestion.store']) !!}
                        <div class="form-group">
                            {!! Form::label('desc', 'Descripción') !!}
                            {!! Form::textarea('description',null,['class' => 'form-control','placeholder' => 'Ingresa la sugerencia..']) !!}
                            <p align="right">
                                Máximo 2000 caracteres
                            </p>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        {!! Form::submit('Enviar',['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection