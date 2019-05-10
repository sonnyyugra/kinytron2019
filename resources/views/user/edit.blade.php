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
                        Editar a {{$user->name}}
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
                        {!! Form::open(array('route' => array('user.update', $user->id),'method' => 'PUT')) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name',$user->name,['class' => 'form-control']) !!}
                        </div>                        
                        <div class="form-group">
                            {!! Form::label('correo', 'Correo') !!}
                            {!! Form::email('email',$user->email,['class' => 'form-control','readonly' => 'readonly']) !!}
                        </div>
                        {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection