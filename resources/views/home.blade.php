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
                <small class="text-muted text-uppercase font-weight-bold">Mediciones</small>
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

                                        @if($course->e1c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e1c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e1c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e1c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e2c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e2c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e2c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e2c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e3c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e3c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e3c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e3c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e4c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e4c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e4c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e4c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e5c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e5c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e5c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e5c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e6c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e6c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e6c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e6c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e7c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e7c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e7c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e7c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e8c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e8c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e8c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e8c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e9c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e9c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e9c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e9c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e10c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e10c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e10c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e10c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e11c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e11c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e11c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e11c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e12c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e12c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e12c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e12c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e13c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e13c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e13c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e13c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e14c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e14c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e14c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e14c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e15c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e15c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e15c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e15c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e16c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e16c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e16c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e16c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e17c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e17c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e17c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e17c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e18c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e18c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e18c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e18c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e19c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e19c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e19c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e19c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif

                                        @if($course->e20c1 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e20c2 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e20c3 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
                                        @endif
                                        @if($course->e20c4 == 1)
                                            @php($porcentaje = $porcentaje + 1.25)
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