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
                        {!! Form::open(['route' => 'course.store']) !!}
                        <div class="form-group">
                            {!! Form::label('Nivel', 'Nivel') !!}
                            {!! Form::select('level', ['1' => '1° Básico','2' => '2° Básico','3' => '3° Básico','4' => '4° Básico','5' => '5° Básico','6' => '6° Básico','7' => '7° Básico','8' => '8° Básico'],null,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Letter', 'Curso (A,B,C,D,X)') !!}
                            {!! Form::text('letter',null,['class' => 'form-control','placeholder' => 'A']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('COLLEGE', 'Colegio') !!}
                            {{ Form::select('college_id', $colleges,null,['class' => 'form-control']) }}
                        </div>
                        {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection