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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">
                        Alumnos del curso {{$course->level." ".$course->letter}}
                    </div>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div align="right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-whatever="" data-target="#agregarAlumno"><i class="fa fa-user"></i> Agregar alumno</button>

                        </div>

                        <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <th>{!! $user->name." ".$user->lastname !!}</th>
                                    <th>{!! $user->email !!}</th>
                                    <th width="40px"><a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-warning pull-right">Editar</a></th>
                                    <th width="40px">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user],'class' => 'form-delete']) }}
                                        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger', 'name' => 'delete_modal']) }}
                                        {{ Form::close() }}
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        <!-- modal -->
                        <div class="modal modal-danger fade" id="confirm">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmación</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Estas seguro de eliminar este registro?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline" id="delete-btn">Eliminar</button>
                                        <button type="button" class="btn btn-outline" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- EVALUCION MODAL -->
                        <div id="agregarAlumno" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Agregar alumno para el curso {{$course->level." ".$course->letter}} </h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['route' => 'user.add']) !!}
                                        <div class="form-group">
                                            {!! Form::label('Nombre', 'Nombre') !!}
                                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Apellido', 'Apellido') !!}
                                            {!! Form::text('lastname',null,['class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('Email', 'Email') !!}
                                            {{ Form::email('email',null,['class' => 'form-control']) }}
                                        </div>
                                        <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                                        <input type="hidden" name="college_id" id="college_id" value="{{$course->college->id}}">

                                        {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- TERMINO MODAL EVALUATION -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection