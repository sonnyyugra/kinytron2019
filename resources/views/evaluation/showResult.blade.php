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
                    <div class="card-header" align="center">Atención</div>
                    <div class="card-body">
                        {!! $chart_c1->container() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" align="center">Participación</div>
                    <div class="card-body">
                        {!! $chart_c2->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6" >
                <div class="card" >
                    <div class="card-header" align="center">Expresión</div>
                    <div class="card-body">
                        {!! $chart_c3->container() !!}

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" align="center">Aplicación</div>
                    <div class="card-body">
                        {!! $chart_c4->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">Mediciones</div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr align="center">
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Atención</th>
                                <th>Participación</th>
                                <th>Expresión</th>
                                <th>Aplicación</th>

                            </tr>
                            @foreach($users as $user)
                                <tr align="center">
                                    <td>{!! $user->name." ".$user->lastname !!}</td>
                                    <td>{!! $user->course->level." ".$user->course->letter !!}</td>
                                    @foreach ($user->evaluations->where('workshop',$workshop_number)->sortBy('criterio') as $evaluation)
                                        @if($evaluation->score == 1)
                                            <td bgcolor="red" style="color: white" align="center">Deficiente</td>
                                        @elseif($evaluation->score == 2)
                                            <td bgcolor="yellow" style="color: black" align="center">Regular</td>
                                        @elseif($evaluation->score == 3)
                                            <td bgcolor="green" style="color: white" align="center">Muy Bueno</td>
                                        @endif
                                    @endforeach

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{!! $chart_c1->script() !!}
{!! $chart_c2->script() !!}
{!! $chart_c3->script() !!}
{!! $chart_c4->script() !!}

