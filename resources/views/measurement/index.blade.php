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
                    <div class="card-header" align="center">Mediciones</div>
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
                        <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Nombre del Test</th>
                                <th>Curso</th>
                                <th>Creador</th>
                                <th>Fecha de creación</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>

                            @foreach($measurements as $measurement)
                                <tr>
                                    <td>{{ $measurement->exam->name }}</td>
                                    <td>{{ $measurement->course->level." ".$measurement->course->letter }}</td>
                                    <td>{{ $measurement->user->name }}</td>
                                    <td>{{ $measurement->created_at->format('d-m-Y')  }}</td>
                                    <td>
                                        @if($measurement->active == 1)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Finalizado</span>
                                        @endif
                                    </td>
                                    <td width="40px"><a href="{{ route('measurement.show',['measurement' => $measurement]) }}" class="btn btn-info pull-right">Estadísticas</a></td>
                                    <td width="40px">
                                        @if($measurement->active == 1)
                                            {{ Form::open(['method' => 'POST', 'route' => ['measurement.inactive', $measurement],'class' => 'form-delete']) }}
                                            {{ Form::submit('Finalizar', ['class' => 'btn btn-danger', 'name' => 'delete_modal']) }}
                                            {{ Form::close() }}
                                        @else
                                            <a href="" class="btn btn-danger pull-right" disabled="true">Finalizar</a>
                                        @endif

                                    </td>
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
                                        <p>Estas seguro de finalizar la medición?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline" id="delete-btn">Eliminar</button>
                                        <button type="button" class="btn btn-outline" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Opciones</div>
                    <div class="card-body">
                        <a href="{{ route('measurement.create') }}" class="btn btn-primary">Nueva Medición</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection