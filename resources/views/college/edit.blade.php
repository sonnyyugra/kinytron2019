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
                        {!! Form::open(array('route' => array('college.update', $college->id),'method' => 'PUT')) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name',$college->name,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('version', 'Versión') !!}
                            {!! Form::select('demo', ['1' => 'Demo','0' => 'Completa'],$college->demo,['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection