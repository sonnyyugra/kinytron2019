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
                    <div class="card-header">Administradores</div>
                    <div class="card-body">
                        <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>

                                <th colspan="3">&nbsp;</th>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <th>{!! $user->name." ".$user->lastname!!}</th>
                                    <th>{!! $user->email !!}</th>
                                    <th width="40px"><a href="{{ route('edittutor',['id' => $user->id]) }}" class="btn btn-warning pull-right disabled">Editar</a></th>
                                    <th width="40px">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['deleteadm', $user],'class' => 'form-delete']) }}
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
                        <!--  MODAL -->
                        <div id="agregarAdm" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Agregar Administrador </h4>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['route' => 'storeadm']) !!}
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
                                        <div class="form-group">
                                            {!! Form::label('Contraseña', 'Contraseña') !!}
                                            {!! Form::password('password',['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::submit('Agregar',['class' => 'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- TERMINO MODAL -->
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Opciones</div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-whatever="" data-target="#agregarAdm"><i class="fa fa-user"></i> Agregar Adm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection