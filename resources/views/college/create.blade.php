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
                        Agregar Colegio
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        {!! Form::open(['route' => 'college.store']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Nombre') !!}
                            {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingresa el nombre..']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dm', 'Versión') !!}
                            {!! Form::select('demo', ['1' => 'Demo','0' => 'Completo'],null,['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection