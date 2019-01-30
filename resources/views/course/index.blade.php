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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cursos</div>
                    <div class="card-body">
                        <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Nivel</th>
                                <th>Letra</th>
                                <th>Colegio</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>

                            @foreach($courses as $course)
                                <tr>
                                    <th>{!! $course->level !!}</th>
                                    <th>{!! $course->letter !!}</th>
                                    <th>{!! $course->college->name !!}</th>
                                    <th width="40px"><a href="{{ route('course.edit',['id' => $course->id]) }}" class="btn btn-warning pull-right">Editar</a></th>
                                    <th width="40px">
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['course.destroy', $course],'class' => 'form-delete']) }}
                                        {{ Form::submit('Eliminar', ['class' => 'btn btn-danger', 'name' => 'delete_modal']) }}
                                        {{ Form::close() }}
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $courses->links() }}

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
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Opciones</div>
                    <div class="card-body">
                        <a href="{{ route('college.create') }}" class="btn btn-primary">Agregar nuevo colegio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection