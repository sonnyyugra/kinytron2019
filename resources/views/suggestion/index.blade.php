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
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Colegio</th>
                                    <th>Descripción</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>

                                @foreach($suggestions as $suggestion)
                                    <tr>
                                        <td>{{ $suggestion->user->name." ".$suggestion->user->lastname }}</td>
                                        <td>{{ $suggestion->user->college->name }}</td>
                                        <td>{{ str_limit($suggestion->description, $limit = 150, $end = '...') }} </td>
                                        <td width="40px"><a href="{{ route('suggestion.show',['suggestion' => $suggestion]) }}" class="btn btn-info pull-right">Ver</a></td>

                                        <td width="40px">
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['suggestion.destroy', $suggestion],'class' => 'form-delete']) }}
                                            {{ Form::submit('Eliminar', ['class' => 'btn btn-danger', 'name' => 'delete_modal']) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- modal -->
                        <div class="modal modal-danger fade" id="confirm">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection