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
                                    @if( $usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->isNotEmpty() )
                                        @if( $loop->index+1 == 1 || $loop->index+1 == 2 || $loop->index+1 == 4 || $loop->index+1 == 6 || $loop->index+1 == 7 || $loop->index+1 == 8 || $loop->index+1 == 9 || $loop->index+1 == 13 || $loop->index+1 == 15 || $loop->index+1 == 17 || $loop->index+1 == 20)
                                            @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 1)
                                                <td bgcolor="red">
                                                    Desacuerdo
                                                </td>
                                            @endif
                                            @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 2)
                                                <td bgcolor="yellow">
                                                    No sé
                                                </td>
                                            @endif
                                            @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 3)
                                                <td bgcolor="green">
                                                    De acuerdo
                                                </td>
                                            @endif
                                        @endif
                                        @if( $loop->index+1 == 3 || $loop->index+1 == 5 || $loop->index+1 == 10 || $loop->index+1 == 11 || $loop->index+1 == 12 || $loop->index+1 == 14 || $loop->index+1 == 16 || $loop->index+1 == 18 || $loop->index+1 == 19)
                                            @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 1)
                                                <td bgcolor="red">
                                                    Acuerdo
                                                </td>
                                            @endif
                                            @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 2)
                                                <td bgcolor="yellow">
                                                    No sé
                                                </td>
                                            @endif
                                            @if($usuario->answers->where('measurement_id',$medicion->id)->where('question_number',$loop->index+1)->first()->answer == 3)
                                                <td bgcolor="green">
                                                    Desacuerdo
                                                </td>
                                            @endif
                                        @endif


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