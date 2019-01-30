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
                        Agregar nueva medición
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
                        @if(Session::get('message') == 'error')
                            <div class="alert alert-danger" role="alert">El test escogido se encuentra activo, desactivelo para ingresar uno nuevo </div>
                        @endif
                    @endif

                    <div class="card-body">
                        {!! Form::open(['route' => 'measurement.store']) !!}
                        <div class="form-group">
                            {!! Form::label('curso', 'Curso') !!}
                            {{ Form::select('course_id', $courses,null,['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dm', 'Test') !!}
                            {{ Form::select('exam_id', $exams,null,['class' => 'form-control']) }}
                        </div>
                        {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection