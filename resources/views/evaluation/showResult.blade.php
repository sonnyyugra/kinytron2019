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
                                <th>Nota</th>

                            </tr>
                            @foreach($users as $user)
                                <tr align="center">
                                    @php($nota = 0)
                                    <td>{!! $user->name." ".$user->lastname !!}</td>
                                    <td>{!! $user->course->level." ".$user->course->letter !!}</td>
                                    @foreach ($user->evaluations->where('workshop',$workshop_number)->sortBy('criterio') as $evaluation)
                                        @if($evaluation->score == 1)
                                            @php($nota = $nota +1)
                                            <td bgcolor="red" style="color: white" align="center">Deficiente</td>
                                        @elseif($evaluation->score == 2)
                                            @php($nota = $nota +2)
                                            <td bgcolor="yellow" style="color: black" align="center">Regular</td>
                                        @elseif($evaluation->score == 3)
                                            @php($nota = $nota +3)
                                            <td bgcolor="green" style="color: white" align="center">Muy Bueno</td>
                                        @elseif($evaluation->score == 0)
                                            <td bgcolor="orange" style="color: white" align="center">Ausente</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        @if($nota < 7.19)
                                            @php($nota = 3*$nota/7.19999999999999+1)
                                        @else
                                            @php($nota = 3*($nota-7.19999999999999)/4.8+4)
                                        @endif
                                        {!! round($nota,1) !!}                                    
                                    
                                    </td>

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

