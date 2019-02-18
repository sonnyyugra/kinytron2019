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
                    <div class="card-header" align="center">Gráfico Individual de {{$usuario->name}}</div>
                    <div class="card-body">
                        {!! $individual->container() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" align="center">{{$usuario->name}}</div>

                    <div class="card-body">
                        <table class="table table-hover table-striped" data-toggle="dataTable" data-form="deleteForm">
                            <thead>
                            <tr>&nbsp;</tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                            </tr>
                            @foreach($preguntas as $pregunta)
                                <tr>
                                    <td>
                                        {{$pregunta}}
                                    </td>
                                    @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 1)
                                        <td>
                                            Muy de acuerdo
                                        </td>
                                    @endif
                                    @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 2)
                                        <td>
                                            De acuerdo
                                        </td>
                                    @endif
                                    @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 3)
                                        <td>
                                            Ni de acuerdo ni en desacuerdo
                                        </td>
                                    @endif
                                    @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 4)
                                        <td>
                                            En desacuerdo
                                        </td>
                                    @endif
                                    @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 5)
                                        <td>
                                            Muy en desacuerdo
                                        </td>
                                    @endif
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
{!! $individual->script() !!}
