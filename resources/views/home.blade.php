@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div class="card-group mb-4">
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-people"></i>
                </div>
                <div class="text-value">{{$quantityUsers}}</div>
                <small class="text-muted text-uppercase font-weight-bold">Alumnos</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-event"></i>
                </div>
                <div class="text-value">{{$quantityEvaluations}}</div>
                <small class="text-muted text-uppercase font-weight-bold">Evaluaciones talleres grupales</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-chart"></i>
                </div>
                <div class="text-value">{{$quantityAnswers}}</div>
                <small class="text-muted text-uppercase font-weight-bold">Respuestas de alumnos</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-star"></i>
                </div>
                <div class="text-value">{{$quantityCourses}}</div>
                <small class="text-muted text-uppercase font-weight-bold">Cursos</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="icon-pie-chart"></i>
                </div>
                <div class="text-value">{{$quantityMeasurements}}</div>
                <small class="text-muted text-uppercase font-weight-bold">Mediciones realizadas</small>
                <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cursos disponibles</div>
                    <div class="card-body">
                        <p>Nos gustaría saber tu opinión acerca de la plataforma <a href="{{route('suggestion.create')}}">Aquí</a></p>
                        <table class="table table-bordered text-center">
                            <tbody><tr>
                                <th>Nivel</th>
                                <th>Letra</th>
                                <th>Cantidad de alumnos</th>
                                <th>Mediciones realizadas</th>
                                <th>Grado de avance del método</th>
                                <th>Opciones</th>
                            </tr>
                            @foreach($courses as $course)
                                <tr>
                                    <td>
                                        {{$course->level}}
                                    </td>
                                    <td>
                                        {{$course->letter}}
                                    </td>
                                    <td>
                                        {{$course->users->count()}}
                                    </td>
                                    <td>
                                        {{$course->measurements->count()}}

                                    </td>
                                    <td>
                                        @php(
                                            $porcentaje = 0
                                            )

                                        @if($course->e1 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e2 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e3 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e4 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e5 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e6 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e7 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e8 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e9 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e10 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e11 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e12 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e13 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e14 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e15 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e16 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e17 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e18 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e19 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e20 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e21 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e22 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e23 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        @if($course->e24 == 1)
                                            @php($porcentaje = $porcentaje + 4.1666)
                                        @endif
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:{{$porcentaje}}%">
                                                {{round($porcentaje)}}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href='{{ url('showcourse',$course->id) }}' class="btn btn-warning">
                                            Ver curso
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody></table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection