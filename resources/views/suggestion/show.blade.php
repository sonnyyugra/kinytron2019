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

                                <tr>
                                    <td>{{ $suggestion->user->name." ".$suggestion->user->lastname }}</td>
                                    <td>{{ $suggestion->user->college->name }}</td>
                                    <td>{{ $suggestion->description }} </td>

                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection